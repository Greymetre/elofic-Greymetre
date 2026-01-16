<?php

namespace App\Http\Controllers;

use App\Models\SecondaryCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Models\Beat;
use App\Models\MasterDistributor;
use App\Models\City;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SecondaryCustomersExport;
use App\Exports\SecondaryCustomersTemplateExport;


class SecondaryCustomerController extends Controller
{
    


    public function index(Request $request)
{
    
    $type = $this->getTypeFromRoute();

    $ownerNames = SecondaryCustomer::where('type', $type)
        ->distinct()
        ->orderBy('owner_name')
        ->pluck('owner_name')
        ->filter()
        ->values();

        $ownerNamesArray = $ownerNames->mapWithKeys(fn($item) => [$item => $item])->toArray();
    $shopNames = SecondaryCustomer::where('type', $type)
        ->distinct()
        ->orderBy('shop_name')
        ->pluck('shop_name')
        ->filter()
        ->values();

        $shopNamesArray = $shopNames->mapWithKeys(fn($item) => [$item => $item])->toArray();

    $mobiles = SecondaryCustomer::where('type', $type)
        ->distinct()
        ->orderBy('mobile_number')
        ->pluck('mobile_number')
        ->filter()
        ->values();

        $mobilesArray = $mobiles->mapWithKeys(fn($item) => [$item => $item])->toArray();
                

        $beats = \App\Models\Beat::where('active', 'Y')
        ->orderBy('beat_name')
        ->get(['id', 'beat_name']);

    $beatsArray = $beats->pluck('beat_name', 'id')->toArray();
        
    $states = \App\Models\State::orderBy('state_name')->get(['id', 'state_name']);


    $query = SecondaryCustomer::with(['state', 'district', 'city', 'pincode', 'beat', 'country'])
        ->select('secondary_customers.*'); // Important: select table with alias or all

    $query->where('type', $type);


    if ($request->ajax()) {
        $query = SecondaryCustomer::select(
            'id',
            'owner_name',
            'shop_name',
            'mobile_number',
            'type',
            'state_id',
            'city_id',
            'opportunity_status',
            'saathi_awareness_status',
            'nistha_awareness_status',
            'created_at',
            'beat_id'

        );
        
       
        $query->where('type', $type);

        // Global Search
    if ($request->filled('global_search')) {
        $search = $request->global_search;
        $query->where(function ($q) use ($search) {
            $q->where('owner_name', 'like', "%{$search}%")
              ->orWhere('shop_name', 'like', "%{$search}%")
              ->orWhere('mobile_number', 'like', "%{$search}%");
        });
    }

    // Individual Filters
    if ($request->filled('owner_name')) {
        $query->where('owner_name', 'like', "%{$request->owner_name}%");
    }

    if ($request->filled('shop_name')) {
        $query->where('shop_name', 'like', "%{$request->shop_name}%");
    }

    if ($request->filled('mobile')) {
        $query->where('mobile_number', 'like', "%{$request->mobile}%");
    }

    if ($request->filled('beat_id') && $request->beat_id != '') {
        $query->where('beat_id', $request->beat_id);
    }

    if ($request->filled('state_id') && $request->state_id != '') {
        $query->where('state_id', $request->state_id);
    }

    if ($request->filled('city_id') && $request->city_id != '') {
        $query->where('city_id', $request->city_id);
    }

    if ($request->filled('opportunity_status') && $request->opportunity_status != '') {
        $query->where('opportunity_status', $request->opportunity_status);
    }

    // Awareness Status Filter - Dynamic based on type
    if ($request->filled('awareness_status') && $request->awareness_status != '') {
        $status = $request->awareness_status === 'Done' ? 'Done' : 'Not Done';
        if (in_array($type, ['RETAILER', 'WORKSHOP'])) {
            $query->where('nistha_awareness_status', $status);
        } else {
            $query->where('saathi_awareness_status', $status);
        }
    }

    return DataTables::of($query)
        ->addColumn('action', function ($row) use ($type) {
            $routePrefix = strtolower($type) . 's';
            $encryptedId = encrypt($row->id);

            $btn = '<a href="' . route($routePrefix . '.edit', $encryptedId) . '" class="btn btn-info btn-just-icon btn-sm" title="Edit">
                        <i class="material-icons">edit</i>
                    </a>';
            $btn .= '<a href="' . route($routePrefix . '.show', $encryptedId) . '" class="btn btn-theme btn-just-icon btn-sm" title="View">
                        <i class="material-icons">visibility</i>
                    </a>';

            return '<div class="btn-group">' . $btn . '</div>';
        })

        ->addColumn('awareness_status', function ($row) use ($type) {
            if (in_array($type, ['RETAILER', 'WORKSHOP'])) {
                $status = $row->nistha_awareness_status ?? 'Not Done';
                $label = 'NISTHA';
            } else {
                $status = $row->saathi_awareness_status ?? 'Not Done';
                $label = 'SAATHI';
            }

            $badge = $status === 'Done' ? 'badge-success' : 'badge-danger';
            $text = $status === 'Done' ? 'DONE' : 'NOT DONE';

            return '<span class="badge ' . $badge . '">' . $label . ': ' . $text . '</span>';
        })

        ->editColumn('opportunity_status', function ($row) {
            $status = $row->opportunity_status ?? '-';
            $badge = match ($status) {
                'HOT'   => 'badge-danger',
                'WARM'  => 'badge-warning',
                'COLD'  => 'badge-info',
                'LOST'  => 'badge-secondary',
                default => 'badge-dark',
            };
            return '<span class="badge ' . $badge . '">' . $status . '</span>';
        })

        ->editColumn('beat_id', function ($row) {
            return $row->beat?->beat_name ?? '-';
        })

        ->editColumn('state_id', function ($row) {
            return $row->state?->state_name ?? '-';
        })

        ->editColumn('city_id', function ($row) {
            return $row->city?->city_name ?? '-';
        })

        ->editColumn('created_at', function ($row) {
            return showdatetimeformat($row->created_at);
        })

        ->rawColumns(['action', 'awareness_status', 'opportunity_status'])
        ->make(true);
    }

    
    $folder = strtolower($type) . 's'; // MECHANIC → mechanics
    $typeTitle = $this->getTypeTitle($type);

    $downloadRoute = route(strtolower($type) . 's.download');
    $templateRoute = route(strtolower($type) . 's.template');

   
    return view($folder . '.index', compact('type',
        'typeTitle',
        'ownerNames',
        'shopNames',
        'mobiles',
        'beats',
        'ownerNamesArray',
        'shopNamesArray',
        'mobilesArray',
        'beatsArray',
        'states',
    'downloadRoute',
'templateRoute'));
}

private function getTypeFromRoute()
{
    $routeName = request()->route()->getName();

    if (str_contains($routeName, 'retailers')) return 'RETAILER';
    if (str_contains($routeName, 'mechanics')) return 'MECHANIC';
    if (str_contains($routeName, 'workshops')) return 'WORKSHOP';
    if (str_contains($routeName, 'garages')) return 'GARAGE';

    // Fallback
    $segment = request()->segment(1);
    return strtoupper($segment) === 'RETAILERS' ? 'RETAILER' : 'MECHANIC';
}

private function getTypeTitle($type)
{
    return match($type) {
        'MECHANIC' => 'Mechanics List',
        'GARAGE' => 'Garages List',
        'RETAILER' => 'Retailers List',
        'WORKSHOP' => 'Workshops List',
        default => 'Customers List'
    };
}
    



public function create(Request $request)
{
    $type = $this->getTypeFromRoute(); // MECHANIC, GARAGE, etc.

    $customer = new SecondaryCustomer();
    $customer->type = $type; // Pre-fill type

    $beats = Beat::where('active', 'Y')
                  ->orderBy('beat_name')
                  ->pluck('beat_name', 'id');

                                   $distributors = MasterDistributor::orderBy('legal_name')
    ->get(['id', 'distributor_code', 'legal_name']);

$distributorOptions = ['' => 'Select Distributor'];

foreach ($distributors as $dist) {
    $distributorOptions[$dist->id] = $dist->distributor_code . ' - ' . $dist->legal_name;
}

    $folder = strtolower($type) . 's'; // MECHANIC → mechanics

    
    return view("{$folder}.create", compact('customer', 'beats', 'type', 'distributorOptions'));
}

public function edit($id)
{
    $customer = SecondaryCustomer::findOrFail(decrypt($id));

    
    $type = $customer->type;

    $beats = Beat::where('active', 'Y')
                  ->orderBy('beat_name')
                  ->pluck('beat_name', 'id');
                  $distributors = MasterDistributor::orderBy('legal_name')
    ->get(['id', 'distributor_code', 'legal_name']);

$distributorOptions = ['' => 'Select Distributor'];

foreach ($distributors as $dist) {
    $distributorOptions[$dist->id] = $dist->distributor_code . ' - ' . $dist->legal_name;
}
    

    $folder = strtolower($type) . 's'; 

    return view("{$folder}.edit", compact('customer', 'beats', 'type', 'distributorOptions'));
}

    /* ================= STORE ================= */
    // public function store(Request $request)
    // {
    //     $validated = $this->validateData($request);

    //     DB::beginTransaction();
    //     try {

    //         foreach (['owner_photo', 'shop_photo'] as $file) {
    //             $validated[$file] = $this->uploadFile($request, $file);
    //         }

    //         SecondaryCustomer::create($validated);

    //         DB::commit();
    //         return redirect()
    //             ->route('secondary-customers.index')
    //             ->with('success', 'Secondary Customer created successfully');

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->withErrors($e->getMessage())->withInput();
    //     }
    // }
    public function store(Request $request)
{
    $type = $this->getTypeFromRoute(); // MECHANIC, GARAGE etc.

    $validated = $this->validateData($request);

    DB::beginTransaction();
    try {
        foreach (['owner_photo', 'shop_photo'] as $file) {
            if ($request->hasFile($file)) {
                $validated[$file] = $this->uploadFile($request, $file);
            }
        }

        SecondaryCustomer::create($validated);

        DB::commit();

        $routePrefix = strtolower($type) . 's'; // mechanics, garages etc.

        return redirect()
            ->route($routePrefix . '.index')
            ->with('success', 'Customer created successfully');

    } catch (\Exception $e) {
        DB::rollBack();

        
        return back()
            ->withErrors(['error' => $e->getMessage()])
            ->withInput();
    }
}

    /* ================= EDIT ================= */
    // public function edit($id)
    // {
    //     $customer = SecondaryCustomer::findOrFail(decrypt($id));
    //     return view('secondary_customers.create_edit', compact('customer'));
    // }

    /* ================= UPDATE ================= */
   public function update(Request $request, $id)
{
    $customer = SecondaryCustomer::findOrFail($id);

    // Actual type customer ke record se lo (safe)
    $type = $customer->type;
    $routePrefix = strtolower($type) . 's'; // MECHANIC → mechanics, GARAGE → garages etc.

    $validated = $this->validateData($request, $id);

    DB::beginTransaction();
    try {
        foreach (['owner_photo', 'shop_photo'] as $file) {
            if ($request->hasFile($file)) {
                if ($customer->$file) {
                    Storage::delete($customer->$file);
                }
                $validated[$file] = $this->uploadFile($request, $file);
            }
        }

        $customer->update($validated);

        DB::commit();

        return redirect()
            ->route($routePrefix . '.index')  // ← YEH CHANGE KARO
            ->with('success', 'Customer updated successfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors($e->getMessage())->withInput();
    }
}

    /* ================= SHOW ================= */
public function show($id)
{
    $customer = SecondaryCustomer::with([
        'country', 'state', 'district', 'city', 'pincode', 'beat'
    ])->findOrFail(decrypt($id));

    $type = $customer->type;
    $folder = strtolower($type) . 's';

    return view("{$folder}.show", compact('customer'));
}

    /* ================= DELETE ================= */
    public function destroy($id)
{
    $customer = SecondaryCustomer::findOrFail($id);
    $type = $customer->type;
    $routePrefix = strtolower($type) . 's';

    // delete photos...

    $customer->delete();

    return redirect()
        ->route($routePrefix . '.index')
        ->with('success', 'Customer deleted successfully');
}

    /* ================= VALIDATION ================= */
    private function validateData(Request $request, $id = null)
{
    $rules = [
        'type' => 'required|string|in:RETAILER,WORKSHOP,MECHANIC,GARAGE',
        'sub_type' => 'nullable|string|max:255', // Mechanic ke liye required hai, baaki ke liye optional
        'owner_name' => 'required|string|max:255',
        'shop_name' => 'required|string|max:255',
        'mobile_number' => 'required|digits:10|unique:secondary_customers,mobile_number,' . $id,
        'whatsapp_number' => 'nullable|digits:10',
        'owner_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'shop_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'vehicle_segment' => 'nullable|string|max:255',
        'address_line' => 'required|string',
        'belt_area_market_name' => 'nullable|string|max:255',
        'saathi_awareness_status' => 'nullable|in:Done,Not Done',
        'distributor_name' => 'nullable|exists:master_distributors,id',
        'opportunity_status' => 'required|in:HOT,WARM,COLD,LOST',
        'gps_location' => 'nullable|string|max:255',

        // ====== YE RULES ADD KARO ======
        'country_id' => 'required|exists:countries,id',
        'state_id' => 'required|exists:states,id',
        'district_id' => 'required|exists:districts,id',
        'city_id' => 'required|exists:cities,id',
        'pincode_id' => 'required|exists:pincodes,id',
        'beat_id' => 'nullable|exists:beats,id',
        // ================================
    ];

    // Agar Mechanic hai to sub_type required
    if ($request->type === 'MECHANIC') {
        $rules['sub_type'] = 'required|string|max:255';
    }

    // Retailer & Workshop ke liye distributor (agar abhi bhi hai)
    if (in_array($request->type, ['RETAILER', 'WORKSHOP'])) {
        $rules['distributor_name'] = 'required|string';
    }
    if (in_array($request->type, ['RETAILER', 'WORKSHOP'])) {
        $rules['distributor_name'] = 'required|exists:master_distributors,id';
        $rules['nistha_awareness_status'] = 'required|in:Done,Not Done'; // NAYA REQUIRED
        // saathi_awareness_status optional ho gaya
    } else {
        // Mechanic & Garage ke liye saathi required rahe
        $rules['saathi_awareness_status'] = 'required|in:Done,Not Done';
    }

    return $request->validate($rules);
}

    /* ================= FILE UPLOADER ================= */
    private function uploadFile(Request $request, $field)
    {
        if ($request->hasFile($field)) {
            return $request->file($field)->store('secondary_customers', 'public');
        }
        return null;
    }

    public function country()
{
    return $this->belongsTo(\App\Models\Country::class);
}

public function state()
{
    return $this->belongsTo(\App\Models\State::class);
}

public function district()
{
    return $this->belongsTo(\App\Models\District::class);
}
public function city()
{
    return $this->belongsTo(\App\Models\City::class);
}
public function getCities(Request $request)
{
    $state_id = $request->state_id;

    if (!$state_id) {
        return response()->json([]);
    }

    $cities = \App\Models\City::where('state_id', $state_id)
        ->orderBy('city_name')
        ->get(['id', 'city_name']);

    return response()->json($cities);
}

public function downloadExcel(Request $request)
{
    $type = $this->getTypeFromRoute();

   
    $filename = strtolower($type) . 's_' . now()->format('Y-m-d') . '.xlsx';
    // Example: retailers_2026-01-05.xlsx

    return Excel::download(
        new SecondaryCustomersExport($request->all(), $type),
        $filename
    );
}
public function downloadTemplate(Request $request)
{
    $type = $this->getTypeFromRoute(); // MECHANIC, GARAGE etc.

    $filename = 'template_' . strtolower($type) . 's_upload.xlsx';

    return Excel::download(new SecondaryCustomersTemplateExport($type), $filename);
}
}
