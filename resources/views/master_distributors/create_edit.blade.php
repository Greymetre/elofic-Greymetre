<x-app-layout>
    <style>
    /* ============== IMAGE PREVIEW STYLE FOR BOTH UPLOAD BOXES ============== */
    /* Default: Warning icon hide, badge gray */

    #cancelled_cheque {
    pointer-events: none;  /* Yeh add kar do */
}
    .clickable-upload-text {
    color: #007bff;                /* blue color jaise link dikhe */
    cursor: pointer;
    text-decoration: underline;    /* underline daal do taaki clear lage clickable */
    font-weight: 500;
}

.clickable-upload-text:hover {
    color: #0056b3;
    text-decoration: underline;
}


.documents-preview {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.preview-item {
    position: relative;
    width: 140px;
    height: 140px;
    border: 1px solid #ddd;
    border-radius: 6px;
    overflow: hidden;
    background: #f8f9fa;
}

.preview-item img,
.preview-item .pdf-placeholder {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.preview-item .pdf-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    color: #6c757d;
    background: #e9ecef;
}

.remove-btn {
    position: absolute;
    top: -8px;
    right: -8px;
    width: 24px;
    height: 24px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    border: none;
    font-size: 14px;
    line-height: 1;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.file-name {
    font-size: 0.75rem;
    text-align: center;
    margin-top: 4px;
    color: #555;
    word-break: break-all;
}


    /* -------- */
     #business_start_date { z-index: 20 !important;  }

    #selection3{
      z-index: 10 !important; 
    }
    .accordion-header .material-icons.fs-4.text-danger {
        display: none !important;
    }

    .accordion-header .badge {
        background: transparent !important;
        color: #000 !important;
        border: none !important;
        box-shadow: none !important;
        font-weight: 600;
    }

    .accordion-item .badge {
        background: transparent !important;
        color: #000 !important;
    }

    /* Jab section invalid ho tab warning dikhao */
    .accordion-item.invalid-section .material-icons.fs-4.text-danger {
        display: inline-block !important;
    }

    /* .accordion-item.invalid-section .badge {
        background-color: #dc3545 !important;
        color: #fff !important;
    } */

    /* Jab valid ho tab green */
    /* .accordion-item.valid-section .badge {
        background-color: #28a745 !important;
        color: #fff !important;
    } */

    .custom-preview-container {
        position: relative;
        width: 100%;
        min-height: 180px;
        border: 2px dashed #bfbfbf;
        border-radius: 12px;
        overflow: hidden;
        background: #fafafa;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .custom-preview-container:hover {
        border-color: #007bff;
        background: #f0f8ff;
    }

    .custom-preview-container input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 10;
    }

    .custom-placeholder {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #777;
        pointer-events: none;
        z-index: 1;
    }

    .custom-placeholder i {
        font-size: 60px;
        margin-bottom: 10px;
        color: #aaa;
    }

    .custom-preview-img {
        width: 100%;
        height: 140px;
        object-fit: contain;
        background: #fff;
        display: none;
    }

    .custom-file-name {
        height: 40px;
        padding: 8px;
        text-align: center;
        background: #f1f1f1;
        border-top: 1px solid #ddd;
        font-size: 13px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: none;
    }

    /* Multiple files ke liye list style (KYC Documents) */
    .custom-files-list {
        padding: 10px;
        max-height: 300px;
        overflow-y: auto;
    }

    .custom-files-list>div {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        background: #f8f9fa;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 8px;
    }

    .custom-files-list img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .custom-file-upload-box {
        border: 3px dashed #ddd;
        border-radius: 15px;
        color: black padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .custom-file-upload-box:hover {
        border-color: gray;

    }

    .custom-file-upload-box.dragover {
        border-color: #007bff;
        background-color: #e3f2fd;
    }

    .selected-files-list {
        text-align: left;
        max-height: 150px;
        overflow-y: auto;
    }

    .selected-files-list p {
        margin: 8px 0;
        padding: 10px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-weight: 500;
        color: #000;
    }

    .text_name {
        color: black;
        background-color: white
    }

    .accordion-item {
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 6px;
        background: #fff;
    }

    /* hide checkbox */
    .accordion-toggle {
        display: none;
    }

    .accordion-header {
        padding: 14px 18px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
    }

    /* arrow */
    .accordion-header .arrow {
        width: 10px;
        height: 10px;
        border-right: 2px solid #333;
        border-bottom: 2px solid #333;
        transform: rotate(45deg);
        transition: transform 0.3s ease;
    }

    /* body */
    .accordion-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        padding: 0 18px;
    }

    /* when checked */
    .accordion-toggle:checked+.accordion-header .arrow {
        transform: rotate(-135deg);
    }

    .accordion-toggle:checked+.accordion-header+.accordion-body {
        max-height: 2000px;
        /* large enough */
        padding: 18px;
    }

    /* Static Light Gray Color for Count Badges */
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                {{-- ================= HEADER ================= --}}
                <div class="card-header card-header-icon card-header-theme">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>

                    <h4 class="card-title">
                        {!! trans('panel.master_distributor.create_title') !!}
                        <span class="pull-right">
                            <a href="{{ route('master-distributors.index') }}" class="btn btn-just-icon btn-theme">
                                <i class="material-icons">next_plan</i>
                            </a>
                        </span>
                    </h4>
                </div>

                <div class="card-body">

                    {{-- ================= ERRORS ================= --}}
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="material-icons">close</i>
                        </button>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {!! Form::model($distributor,[
                    'route' => $distributor->exists
                    ? ['master-distributors.update',$distributor->id]
                    : 'master-distributors.store',
                    'method' => $distributor->exists ? 'PUT' : 'POST',
                    'files' => true,
                    'id' => 'storeMasterDistributor'
                    ]) !!}

                    <input type="hidden" name="id" value="{{ $distributor->id }}">

                    {{-- ================= IMAGES ================= --}}
                    <div class="first-box">
                        <div class="row">

                            {{-- SHOP IMAGE --}}
                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ $distributor->shop_image ? asset('storage/' . $distributor->shop_image) : asset('assets/img/placeholder.jpg') }}"
                                            class="imagepreview1">
                                        <div class="selectThumbnail">
                                            <span class="btn btn-just-icon btn-round btn-file">
                                                <span class="fileinput-new"><i class="fa fa-pencil"></i></span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="shop_image" class="getimage1" accept="image/*">
                                            </span>
                                            <br>
                                            <a href="#" class="btn btn-danger btn-round fileinput-exists"
                                                data-dismiss="fileinput">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                    <label class="bmd-label-floating">
                                        {!! trans('panel.master_distributor.fields.shop_image') !!}
                                    </label>
                                </div>
                            </div>

                            {{-- PROFILE IMAGE --}}
                            <div class="col-md-3 ml-auto mr-auto">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">


                                        <img src="{{ $distributor->profile_image ? asset('storage/' . $distributor->profile_image) : asset('assets/img/placeholder.jpg') }}"
                                            class="imagepreview2">
                                        <div class="selectThumbnail">
                                            <span class="btn btn-just-icon btn-round btn-file">
                                                <span class="fileinput-new"><i class="fa fa-pencil"></i></span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="profile_image" class="getimage2"
                                                    accept="image/*">
                                            </span>
                                            <br>
                                            <a href="#" class="btn btn-danger btn-round fileinput-exists"
                                                data-dismiss="fileinput">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                    <label class="bmd-label-floating">
                                        {!! trans('panel.master_distributor.fields.profile_image') !!}
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- ================= ACCORDION WRAPPER ================= --}}
                    <div class="accordion">

                        {{-- ================= BASIC INFO ================= --}}
                        <div class="accordion-item">

                            {{-- Toggle --}}
                            <input type="checkbox" id="basicInfo" class="accordion-toggle"
                                {{ old('open_section', 'basic') == 'basic' ? 'checked' : '' }}>

                            {{-- Header with Total Filled Count & Status Icon --}}
                            <label for="basicInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Basic Distributor Information</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    <span id="basic-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="basic-info-counter" class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 7
                                    </span>

                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Distributor Legal Name <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('legal_name', old('legal_name', $distributor->legal_name ?? ''),
                                        ['class'=>'form-control fillable-field mandatory-field']) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Trade / Business Name</label>
                                        {!! Form::text('trade_name', old('trade_name', $distributor->trade_name ?? ''),
                                        ['class'=>'form-control fillable-field']) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Distributor Code <span
                                                class="text-danger">*</span></label>
                                        {!! Form::text('distributor_code', old('distributor_code',
                                        $distributor->distributor_code ?? ''), ['class'=>'form-control fillable-field
                                        mandatory-field']) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Distributor Category <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group" >
                                            {!! Form::select(
                                            'category',
                                            ['' => 'Select Category', 'Diamond'=>'Diamond', 'Platinum'=>'Platinum',
                                            'Gold'=>'Gold', 'Silver'=>'Silver', 'Bronze'=>'Bronze'],
                                            old('category', $distributor->category ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field']
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Business Status <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'business_status',
                                            ['' => 'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive', 'On
                                            Hold'=>'On Hold'],
                                            old('business_status', $distributor->business_status ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field'
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Business Start Date <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group" id="selection3">

                                            <input type="text" name="business_start_date"
                                                class="form-control datepicker fillable-field mandatory-field"
                                                value="{{ old('business_start_date', $distributor->business_start_date ?? '') }}"
                                                id="business_start_date"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- ================= CONTACT INFO ================= --}}
                        <div class="accordion-item">

                            {{-- Toggle --}}
                            <input type="checkbox" id="contactInfo" class="accordion-toggle"
                                {{ old('open_section') == 'contact' ? 'checked' : '' }}>

                            {{-- Header with Counter & Material Icon --}}
                            <label for="contactInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Contact & Communication</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">

                                    <span id="contact-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="contact-info-counter"
                                        class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 6
                                    </span>

                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Primary Contact Person <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('contact_person', old('contact_person',
                                        $distributor->contact_person ?? ''), ['class'=>'form-control fillable-field
                                        mandatory-field']) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Designation</label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::text('designation', old('designation', $distributor->designation
                                            ?? ''), ['class'=>'form-control fillable-field']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Primary Mobile <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('mobile', old('mobile', $distributor->mobile ?? ''),
                                        ['class'=>'form-control fillable-field mandatory-field']) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Alternate Mobile</label>
                                        {!! Form::text('alternate_mobile', old('alternate_mobile',
                                        $distributor->alternate_mobile ?? ''), ['class'=>'form-control fillable-field'])
                                        !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Primary Email <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::email('email', old('email', $distributor->email ?? ''),
                                        ['class'=>'form-control fillable-field mandatory-field']) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Secondary Email</label>
                                        {!! Form::email('secondary_email', old('secondary_email',
                                        $distributor->secondary_email ?? ''), ['class'=>'form-control fillable-field'])
                                        !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- ================= ADDRESS & LOCATION ================= --}}
                        <div class="accordion-item">
                            <input type="checkbox" id="addressInfo" class="accordion-toggle"
                                {{ old('open_section') == 'address' ? 'checked' : '' }}>
                            <label for="addressInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Address & Location Information</span>
                                </div>
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    <span id="address-info-status"
                                        class="material-icons fs-4 text-danger">warning</span>
                                    <span id="address-info-counter"
                                        class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 12
                                    </span>
                                    <span class="arrow"></span>
                                </div>
                            </label>

                            <div class="accordion-body">
                                @php
                                $countries = \Cache::remember('active_countries_list', 1440, function () {
                                return \App\Models\Country::where('active', 'Y')
                                ->orderBy('country_name', 'asc')
                                ->get(['id', 'country_name']);
                                });
                                @endphp

                                {{-- ==================== BILLING ADDRESS ==================== --}}
                                <div class="card mt-3 billing-fields">
                                    <div
                                        class="card-header text-white d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Billing Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="col-form-label">Address Line 1 <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="address1" class="form-control mandatory-field"
                                                    value="{{ old('address1', $distributor->billing_address ?? '') }}"
                                                    maxlength="200" required>
                                            </div>

                                            <!-- Country -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">Country <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 country mandatory-field"
                                                    name="country_id" id="country_id">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('country_id', $distributor->country_id) == $country->id ? 'selected' : '' }}>
                                                        {{ $country->country_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- State -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">State <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field" name="state_id"
                                                    id="state_id">
                                                    <option value="">Select State</option>
                                                    @if(old('country_id') || ($distributor->country_id ?? null))
                                                    @php
                                                    $states = \App\Models\State::where('country_id', old('country_id',
                                                    $distributor->country_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('state_name')
                                                    ->get();
                                                    @endphp
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('state_id', $distributor->state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->state_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- District -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">District <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field" name="district_id"
                                                    id="district_id">
                                                    <option value="">Select District</option>
                                                    @if(old('state_id') || ($distributor->state_id ?? null))
                                                    @php
                                                    $districts = \App\Models\District::where('state_id', old('state_id',
                                                    $distributor->state_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('district_name')
                                                    ->get();
                                                    @endphp
                                                    @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ old('district_id', $distributor->district_id) == $district->id ? 'selected' : '' }}>
                                                        {{ $district->district_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- City -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">City <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field" name="city_id"
                                                    id="city_id">
                                                    <option value="">Select City</option>
                                                    @if(old('district_id') || ($distributor->district_id ?? null))
                                                    @php
                                                    $cities = \App\Models\City::where('district_id', old('district_id',
                                                    $distributor->district_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('city_name')
                                                    ->get();
                                                    @endphp
                                                    @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('city_id', $distributor->city_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- Pincode -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">Pincode <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field" name="pincode_id"
                                                    id="pincode_id">
                                                    <option value="">Select Pincode</option>
                                                    @if(old('city_id') || ($distributor->city_id ?? null))
                                                    @php
                                                    $pincodes = \App\Models\Pincode::where('city_id', old('city_id',
                                                    $distributor->city_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('pincode')
                                                    ->get();
                                                    @endphp
                                                    @foreach($pincodes as $pincode)
                                                    <option value="{{ $pincode->id }}"
                                                        {{ old('pincode_id', $distributor->pincode_id) == $pincode->id ? 'selected' : '' }}>
                                                        {{ $pincode->pincode }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Same as Billing Checkbox --}}
                                <div class="mt-4">
<div class="mt-4">
    <div class="form-check">
        <input type="checkbox" 
               name="same_as_billing" 
               id="same_as_billing" 
               value="1"
             
               {{ old('same_as_billing') !== null 
                   ? (old('same_as_billing') ? 'checked' : '') 
                   : ($distributor->same_as_billing ? 'checked' : '') }}>
        <label class="form-check-label text-theme2 font-weight-bold" for="same_as_billing">
            Same as Billing Address
        </label>
    </div>
</div>

                                {{-- ==================== SHIPPING ADDRESS ==================== --}}
                                <div class="card mt-4 shipping-fields" id="shipping-panel">
                                    <div
                                        class="card-header text-white d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Shipping Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="col-form-label">Address Line 1 <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="shipping_address1"
                                                    class="form-control mandatory-field"
                                                    value="{{ old('shipping_address1', $distributor->shipping_address ?? '') }}"
                                                    maxlength="200">
                                            </div>

                                            <!-- Shipping Country -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">Country <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 country mandatory-field"
                                                    name="shipping_country_id" id="shipping_country_id">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('shipping_country_id', $distributor->shipping_country_id) == $country->id ? 'selected' : '' }}>
                                                        {{ $country->country_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Shipping State -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">State <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field"
                                                    name="shipping_state_id" id="shipping_state_id">
                                                    <option value="">Select State</option>
                                                    @if(old('shipping_country_id') || ($distributor->shipping_country_id
                                                    ?? null))
                                                    @php
                                                    $states = \App\Models\State::where('country_id',
                                                    old('shipping_country_id', $distributor->shipping_country_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('state_name')
                                                    ->get();
                                                    @endphp
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('shipping_state_id', $distributor->shipping_state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->state_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- Shipping District -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">District <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field"
                                                    name="shipping_district_id" id="shipping_district_id">
                                                    <option value="">Select District</option>
                                                    @if(old('shipping_state_id') || ($distributor->shipping_state_id ??
                                                    null))
                                                    @php
                                                    $districts = \App\Models\District::where('state_id',
                                                    old('shipping_state_id', $distributor->shipping_state_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('district_name')
                                                    ->get();
                                                    @endphp
                                                    @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ old('shipping_district_id', $distributor->shipping_district_id) == $district->id ? 'selected' : '' }}>
                                                        {{ $district->district_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- Shipping City -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">City <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field"
                                                    name="shipping_city_id" id="shipping_city_id">
                                                    <option value="">Select City</option>
                                                    @if(old('shipping_district_id') ||
                                                    ($distributor->shipping_district_id ?? null))
                                                    @php
                                                    $cities = \App\Models\City::where('district_id',
                                                    old('shipping_district_id', $distributor->shipping_district_id ??
                                                    ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('city_name')
                                                    ->get();
                                                    @endphp
                                                    @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('shipping_city_id', $distributor->shipping_city_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- Shipping Pincode -->
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">Pincode <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 mandatory-field"
                                                    name="shipping_pincode_id" id="shipping_pincode_id">
                                                    <option value="">Select Pincode</option>
                                                    @if(old('shipping_city_id') || ($distributor->shipping_city_id ??
                                                    null))
                                                    @php
                                                    $pincodes = \App\Models\Pincode::where('city_id',
                                                    old('shipping_city_id', $distributor->shipping_city_id ?? ''))
                                                    ->where('active', 'Y')
                                                    ->orderBy('pincode')
                                                    ->get();
                                                    @endphp
                                                    @foreach($pincodes as $pincode)
                                                    <option value="{{ $pincode->id }}"
                                                        {{ old('shipping_pincode_id', $distributor->shipping_pincode_id) == $pincode->id ? 'selected' : '' }}>
                                                        {{ $pincode->pincode }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                {{-- Hidden fields jo controller mein use ho rahe hain --}}
                                <input type="hidden" name="billing_address"
                                    value="{{ old('billing_address', $distributor->billing_address ?? '') }}">
                                <input type="hidden" name="billing_country"
                                    value="{{ old('billing_country', $distributor->billing_country ?? '') }}">
                                <input type="hidden" name="billing_state"
                                    value="{{ old('billing_state', $distributor->billing_state ?? '') }}">
                                <input type="hidden" name="billing_district"
                                    value="{{ old('billing_district', $distributor->billing_district ?? '') }}">
                                <input type="hidden" name="billing_city"
                                    value="{{ old('billing_city', $distributor->billing_city ?? '') }}">
                                <input type="hidden" name="billing_pincode"
                                    value="{{ old('billing_pincode', $distributor->billing_pincode ?? '') }}">
                                <input type="hidden" name="shipping_address"
                                    value="{{ old('shipping_address', $distributor->shipping_address ?? '') }}">
                                <input type="hidden" name="shipping_country"
                                    value="{{ old('shipping_country', $distributor->shipping_country ?? '') }}">
                                <input type="hidden" name="shipping_state"
                                    value="{{ old('shipping_state', $distributor->shipping_state ?? '') }}">
                                <input type="hidden" name="shipping_district"
                                    value="{{ old('shipping_district', $distributor->shipping_district ?? '') }}">
                                <input type="hidden" name="shipping_city"
                                    value="{{ old('shipping_city', $distributor->shipping_city ?? '') }}">
                                <input type="hidden" name="shipping_pincode"
                                    value="{{ old('shipping_pincode', $distributor->shipping_pincode ?? '') }}">
                            </div>
                        </div>
                        {{-- ================= BUSINESS & OPERATIONAL INFO ================= --}}
                        <div class="accordion-item">
                            {{-- Toggle --}}
                            <input type="checkbox" id="businessInfo" class="accordion-toggle"
                                {{ old('open_section') == 'business' ? 'checked' : '' }}>

                            {{-- Header --}}
                            <label for="businessInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Business & Operational Information</span>
                                </div>
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    <span id="business-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="business-info-counter"
                                        class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 5
                                    </span>

                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Sales Zone / Region<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'sales_zone',
                                            ['' => 'Select Sales Zone'] + ['East'=>'East', 'West'=>'West',
                                            'North'=>'North', 'South'=>'South'],
                                            old('sales_zone', $distributor->sales_zone ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field']
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Area / Territory<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'area_territory',
                                            ['' => 'Select Area/Territory'] + ['District'=>'District', 'City'=>'City'],
                                            old('area_territory', $distributor->area_territory ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field']
                                            ) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
    <div class="form-group">
        <label for="beat_route">Beat Route <span class="text-danger">*</span></label>
        <select name="beat_route" id="beat_route" class="form-control select2" required>
            <option value="">Select Beat</option>
            @foreach($beats as $id => $beat_name)
                <option value="{{ $beat_name }}"
                    {{ old('beat_route', $distributor->beat_route) == $beat_name ? 'selected' : '' }}>
                    {{ $beat_name }}
                </option>
            @endforeach
        </select>
        <small class="text-muted">Select the primary beat/route for this distributor</small>
    </div>
</div>

                                    <!-- <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Beat / Route Mapping<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'beat_route',
                                            ['' => 'Select Beat/Route'] + ['District'=>'District', 'City'=>'City'],
                                            old('beat_route', $distributor->beat_route ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field']
                                            ) !!}

                                            {!! Form::select('beat_id',
        ['' => 'Select Beat'] + $beats->toArray(),
        null,
        [
        'class' => 'form-control select2',

        ]
        ) !!}
                                        </div>
                                    </div> -->
                                    

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Market Classification<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'market_classification',
                                            ['' => 'Select Market Classification'] + ['Urban'=>'Urban',
                                            'Rural'=>'Rural', 'Semi-Urban'=>'Semi-Urban'],
                                            old('market_classification', $distributor->market_classification ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field']
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="col-form-label">Competitor Brands Handled<span
                                                class="text-danger">*</span></label>
                                        {!! Form::textarea(
                                        'competitor_brands',
                                        old('competitor_brands', $distributor->competitor_brands ?? null),
                                        ['class' => 'form-control fillable-field mandatory-field', 'rows' => 3,
                                        'placeholder' => 'Enter Competitor Brands Handled']
                                        ) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ================= COMPLIANCE & LEGAL (KYC) ================= --}}
                        <div class="accordion-item">

                            {{-- Toggle --}}
                            <input type="checkbox" id="kycInfo" class="accordion-toggle"
                                {{ old('open_section') == 'kyc' ? 'checked' : '' }}>

                            <!-- {{-- Header --}}
                            <label for="kycInfo" class="accordion-header">
                                <span>Compliance & Legal</span>
                                <span class="arrow"></span>
                            </label> -->



                            {{-- Header with Total Filled Count & Status Icon --}}
                            <label for="kycInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Compliance & Legal</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">

                                    <span id="kyc-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="kyc-info-counter" class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 7
                                    </span>
                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">GST Number <span
                                                class="text-danger">*</span></label>

                                        {!! Form::text('gst_number', null, [
                                        'class' => 'form-control mandatory-field',
                                        'id' => 'gst_number',
                                        'maxlength' => 15,
                                        'style' => 'text-transform: uppercase'
                                        ]) !!}

                                        <small class="text-danger d-none" id="gst_error">
                                            Please enter valid GST Number
                                        </small>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">PAN Number <span
                                                class="text-danger">*</span></label>

                                        {!! Form::text('pan_number', null, [
                                        'class' => 'form-control mandatory-field',
                                        'id' => 'pan_number',
                                        'maxlength' => 10,
                                        'style' => 'text-transform: uppercase'
                                        ]) !!}

                                        <small class="text-danger d-none" id="pan_error">
                                            Please enter valid PAN Number
                                        </small>
                                    </div>



                                    <div class="col-md-6 mb-3">
                                        <label class=" col-form-label">Business Registration Type<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group has-default bmd-form-group">

                                            {!! Form::select(
                                            'registration_type',
                                            ['Proprietorship' =>'Proprietorship',
                                            'Partnership'=>'Partnership', 'Pvt Ltd'=>'Pvt Ltd', 'LLP'=>'LLP'],
                                            null,
                                            ['class'=>'form-control select2
                                            mandatory-field','placeholder'=>'Registration Type ']
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input_section">
                                            <!-- <label class="col-form-label">Upload Documents (Soft Copy)</label> -->

                                            <!-- Pure Custom Upload Box (No Browser Default Input Visible) -->
                                            <!-- <div class="custom-file-upload-box" id="upload-box">
                                                <input type="file" name="documents[]" id="documents" multiple
                                                    accept=".pdf,.jpg,.jpeg,.png" style="display: none;">

                                                <div class="upload-placeholder text-center ">
                                                    <i class="material-icons  mb-3"
                                                        style="font-size: 60px; color: gray;">cloud_upload</i>
                                                    <p class=" font-weight-bold mb-1" style='color:gray;'>Click here to
                                                        upload documents</p>
                                                    <p class="text-sm" style="color:gray;">PDF, JPG, JPEG, PNG </p>
                                                </div> -->

                                            <!-- Selected File Names Inside Box -->
                                            <!-- <div id="selected-files-display" class="selected-files-list mt-1 px-3">
                                                </div>
                                            </div> -->


                                            <!-- <div class="custom-preview-container" id="upload-box">
                                                <input type="file" name="documents[]" id="documents" multiple
                                                    accept=".pdf,.jpg,.jpeg,.png">
                                                <div class="custom-placeholder">
                                                    <i class="material-icons">cloud_upload</i>
                                                    <strong>Click to Upload Documents</strong>
                                                    <span>PDF, JPG, PNG</span>
                                                </div>
                                                <div id="selected-files-display" class="custom-files-list"></div>
                                            </div> -->


                                            <!-- In your form – around the documents field -->

                                            <div class="form-group">
                                                <label for="documents">Upload Additional Documents (multiple allowed)</label>
                                                
                                                <div class="custom-file-upload" style="border: 2px dashed #ccc; padding: 5px; text-align: center; margin-top: 5px; border-radius: 5px">
                                                    <input type="file" 
                                                        name="documents[]" 
                                                        id="documents" 
                                                        multiple 
                                                        accept="image/*,.pdf" 
                                                        style="display: none;">

                                                    <div class="upload-instruction">
                                                        <!-- <p>Click the line below to select files</p> -->
                                                        <small class="form-text text-muted" 
                                                            id="trigger-upload" 
                                                            style="cursor: pointer; color: #007bff; text-decoration: underline;">
                                                            Allowed: jpg, jpeg, png, pdf | Max 5 files | Total size ≤ 5MB
                                                        </small>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <!-- Existing Documents -->
                                            @if($distributor->exists && $distributor->documents)
                                            <div class="mt-2 p-4 bg-light border rounded">
                                                <p class="font-weight-bold text-primary mb-3">Existing Documents:</p>

                                                @foreach(json_decode($distributor->documents, true) as $doc)
                                                <a href="{{ asset('storage/' . $doc) }}" target="_blank"
                                                    class="btn btn-sm btn-info">
                                                    <!-- {{ basename($doc) }} -->
                                                    <i class="material-icons" style="font-size: 16px;">visibility</i>
                                                    View Current Document
                                                </a>
                                                @endforeach

                                            </div>
                                            @endif

                                            @error('documents')
                                            <p class="text-danger mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                            <div class="col-md-6">
                               <div class="input_section">
                                    <div class="form-group">
                                        <label for="mou_file">Upload MOU (Memorandum of Understanding)</label>
    
                                             <div class="custom-file-upload" 
                                             >
                                                <input type="file" 
                                                    name="mou_file" 
                                                    id="mou_file" 
                                                    accept=".pdf,.jpg,.jpeg,.png" 
                                                    style="display: none;">

                                                <div class="upload-instruction">
                                                    <!-- <p>Click below to upload MOU (single file only)</p> -->
                                                    <small class="form-text text-muted" 
                                                        id="trigger-mou-upload" 
                                             style="border: 2px dashed #ccc; padding: 5px; text-align: center; border-radius: 5px;">
                                                        Allowed: PDF, JPG, JPEG, PNG | Max size 5MB | Single file only
                                                    </small>
                                                </div>

                                        <!-- Preview area -->
                                        <div id="mou-preview" class="mt-3" style="min-height: 120px;"></div>
                                    </div>

                                    <!-- Existing MOU (edit mode ke liye) -->
                                    @if($distributor->exists && $distributor->mou_file)
                                    <div class="mt-2">
                                        <p class="text-muted">Current MOU:</p>
                                        <a href="{{ asset('storage/' . $distributor->mou_file) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="material-icons">visibility</i> View Current MOU
                                        </a>
                                    </div>
                                    @endif

                                    @error('mou_file')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                                        
                                                            
                            <div id="documents-preview" class="documents-preview mt-3 ml-1 row"></div>
                                                                

                            </div>


                                </div>

                            </div>
                        </div>

                        {{-- ================= BANKING & FINANCIAL INFO ================= --}}
                        <div class="accordion-item">

                            {{-- Toggle --}}
                            <input type="checkbox" id="bankInfo" class="accordion-toggle"
                                {{ old('open_section') == 'bank' ? 'checked' : '' }}>

                            <!-- {{-- Header --}}
                            <label for="bankInfo" class="accordion-header">
                                <span>Banking & Financial Information</span>
                                <span class="arrow"></span>
                            </label> -->


                            {{-- Header with Total Filled Count & Status Icon --}}
                            <label for="bankInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Banking & Financial Information</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">

                                    <span id="bank-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="bank-info-counter" class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 7
                                    </span>
                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">

                                <div class="row">

                                    {{-- Bank Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Bank Name <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('bank_name', null, ['class'=>'form-control mandatory-field']) !!}
                                    </div>

                                    {{-- Account Holder --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Account Holder Name <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('account_holder', null, ['class'=>'form-control
                                        mandatory-field']) !!}
                                    </div>

                                    {{-- Account Number --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Account Number <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('account_number', null, ['class'=>'form-control
                                        mandatory-field']) !!}
                                    </div>

                                    {{-- IFSC --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            IFSC / SWIFT Code <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('ifsc', null, ['class'=>'form-control mandatory-field']) !!}
                                    </div>

                                    {{-- Branch Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Branch Name</label>
                                        {!! Form::text('branch_name', null, ['class'=>'form-control mandatory-field'])
                                        !!}
                                    </div>

                                    {{-- Credit Limit --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Credit Limit Assigned <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::number('credit_limit', null, ['class'=>'form-control
                                        mandatory-field']) !!}
                                    </div>

                                    {{-- Credit Days --}}
                                   <div class="col-md-6 mb-3">
    <label class="col-form-label">
        Credit Limit Assigned (Days) <span class="text-danger">*</span>
    </label>
    {!! Form::number('credit_limit', old('credit_limit', 7), [
        'class'          => 'form-control mandatory-field',
        'min'            => '0',     // optional but recommended
        'step'           => '1',     // optional – whole numbers only
        'placeholder'    => '7',     // optional visual hint (shows when empty)
    ]) !!}
</div>

                                    {{-- Average Monthly Purchase --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Average Monthly Purchase</label>
                                        {!! Form::number('avg_monthly_purchase', null, ['class'=>'form-control']) !!}
                                    </div>

                                    {{-- Outstanding Balance --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Outstanding Balance</label>
                                        {!! Form::number('outstanding_balance', null, ['class'=>'form-control']) !!}
                                    </div>

                                    {{-- Preferred Payment --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Preferred Payment Method</label>
                                        <div class="form-group has-default bmd-form-group">

                                            {!! Form::select(
                                            'preferred_payment_method',
                                            [
                                            'NEFT'=>'NEFT',
                                            'RTGS'=>'RTGS',
                                            'Cheque'=>'Cheque',
                                            'Online'=>'Online'
                                            ],
                                            null,
                                            ['class'=>'form-control select2']
                                            ) !!}
                                        </div>
                                    </div>


                                    {{-- Cancelled Cheque --}}
                                    <div class="col-md-6">
    <div class="input_section">
        <label class="col-form-label">
            Image of Cancelled Cheque <span class="text-danger">*</span>
        </label>

        <div class="custom-preview-container" id="cheque-upload-box">
            <input type="file" 
                   name="cancelled_cheque" 
                   id="cancelled_cheque" 
                   accept=".jpg,.jpeg,.png,.pdf"
                   class="mandatory-field">

            <div class="custom-placeholder" id="cheque-placeholder">
                <i class="material-icons">cloud_upload</i>
                <strong>Click here to upload Cancelled Cheque</strong>
                <span>JPG, PNG, PDF • Max 5MB</span>
            </div>

            <div id="cheque-preview-area" class="mt-2 text-center"></div>
        </div>

        <!-- Existing file (edit mode) -->
        @if($distributor->exists && $distributor->cancelled_cheque)
        <div class="mt-3 p-3 bg-light border rounded">
            <p class="font-weight-bold text-primary mb-2">Current File:</p>
            <a href="{{ asset('storage/' . $distributor->cancelled_cheque) }}" target="_blank" class="btn btn-sm btn-info">
                <i class="material-icons">visibility</i> View Current Cheque
            </a>
        </div>
        @endif

        @error('cancelled_cheque')
        <small class="text-danger d-block mt-2">{{ $message }}</small>
        @enderror
    </div>
</div>





                                </div>

                            </div>
                        </div>
                        {{-- ================= SALES & PERFORMANCE INFO ================= --}}
                        <div class="accordion-item">
                            {{-- Toggle --}}
                            <input type="checkbox" id="salesInfo" class="accordion-toggle"
                                {{ old('open_section') == 'sales' ? 'checked' : '' }}>

                            {{-- Header with Count Badge + Status Icon + Arrow --}}
                            <label for="salesInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Sales & Performance Information</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">

                                    <span id="sales-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="sales-info-counter" class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 7
                                    </span>
                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">
                                <div class="row">

                                    {{-- Monthly Sales Volume (Mandatory) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Monthly Sales Volume (Approx.) <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::number('monthly_sales', old('monthly_sales',
                                        $distributor->monthly_sales ?? null), [
                                        'class' => 'form-control fillable-field mandatory-field',
                                        'min' => 0
                                        ]) !!}
                                    </div>

                                    {{-- Product Categories (Mandatory) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Product Categories Handled <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('product_categories', old('product_categories',
                                        $distributor->product_categories ?? null), [
                                        'class' => 'form-control fillable-field mandatory-field',
                                        'placeholder' => 'e.g. Batteries, Lubricants, Tyres'
                                        ]) !!}
                                    </div>

                                    {{-- Secondary Sales Reporting (Optional) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Secondary Sales Reporting Required
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'secondary_sales_required',
                                            ['' => 'Select Option', 'Yes' => 'Yes', 'No' => 'No'],
                                            old('secondary_sales_required', $distributor->secondary_sales_required ??
                                            null),
                                            ['class' => 'form-control select2 fillable-field']
                                            ) !!}
                                        </div>
                                    </div>

                                    {{-- Last 12 Months Sales (Optional) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Last 12 Months Sales History
                                        </label>
                                        {!! Form::text('last_12_months_sales', old('last_12_months_sales',
                                        $distributor->last_12_months_sales ?? null), [
                                        'class' => 'form-control fillable-field',
                                        'placeholder' => 'e.g. Jan: 50L, Feb: 55L...'
                                        ]) !!}
                                    </div>

                                    {{-- Assigned Sales Executive (Mandatory - Multiple) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Assigned Sales Executive <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'sales_executive_id[]',
                                            $users ?? [] ,
                                            old('sales_executive_id', $distributor->sales_executive_ids),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            'multiple' => 'multiple',

                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    {{-- Assigned Supervisor (Mandatory) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Assigned Supervisor / ASM / RSM <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'supervisor_id',
                                            $users ?? [],
                                            old('supervisor_id', $distributor->supervisor_id ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field',
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    {{-- Customer Segment (Mandatory) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Customer Segment <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select(
                                            'customer_segment',
                                            ['' => 'Select Segment'] + [
                                            '2W' => '2W',
                                            '3W' => '3W',
                                            'LCV' => 'LCV',
                                            'HCV' => 'HCV',
                                            'Tractor' => 'Tractor'
                                            ],
                                            old('customer_segment', $distributor->customer_segment ?? null),
                                            ['class' => 'form-control select2 fillable-field mandatory-field']
                                            ) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- ================= ADDITIONAL INFORMATION ================= --}}
                        <div class="accordion-item">
                            {{-- Toggle --}}
                            <input type="checkbox" id="additionalInfo" class="accordion-toggle"
                                {{ old('open_section') == 'additional' ? 'checked' : '' }}>

                            {{-- Header with Count Badge + Status Icon + Arrow --}}
                            <label for="additionalInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Additional Information</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">

                                    <span id="additional-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="additional-info-counter"
                                        class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 7
                                    </span>
                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Weekly TAI Alert <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select('weekly_tai_alert',
                                            ['' => 'Select Option', 'A' => 'A', 'B' => 'B'],
                                            old('weekly_tai_alert', $distributor->weekly_tai_alert ?? null),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Target V/s Achievement Annually <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text('target_vs_achievement',
                                        old('target_vs_achievement', $distributor->target_vs_achievement ?? null),
                                        [
                                        'class' => 'form-control fillable-field mandatory-field',
                                        'placeholder' => 'Enter annual target vs achievement'
                                        ]
                                        ) !!}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Schemes Updates <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select('schemes_updates',
                                            ['' => 'Select Option', 'A' => 'A', 'B' => 'B'],
                                            old('schemes_updates', $distributor->schemes_updates ?? null),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            New Launch Update <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select('new_launch_update',
                                            ['' => 'Select Option', 'A' => 'A', 'B' => 'B'],
                                            old('new_launch_update', $distributor->new_launch_update ?? null),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Alert for Payment <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select('payment_alert',
                                            ['' => 'Select Option', 'A' => 'A', 'B' => 'B'],
                                            old('payment_alert', $distributor->payment_alert ?? null),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Pending Order List <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select('pending_orders',
                                            ['' => 'Select Option', 'A' => 'A', 'B' => 'B'],
                                            old('pending_orders', $distributor->pending_orders ?? null),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            Inventory Status <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group has-default bmd-form-group">
                                            {!! Form::select('inventory_status',
                                            ['' => 'Select Option', 'A' => 'A', 'B' => 'B'],
                                            old('inventory_status', $distributor->inventory_status ?? null),
                                            [
                                            'class' => 'form-control select2 fillable-field mandatory-field',
                                            
                                            ]
                                            ) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        {{-- ================= OPERATIONAL & BUSINESS CAPACITY ================= --}}
                        <div class="accordion-item">
                            {{-- Toggle --}}
                            <input type="checkbox" id="capacityInfo" class="accordion-toggle"
                                {{ old('open_section') == 'capacity' ? 'checked' : '' }}>

                            {{-- Header with Count Badge + Status Icon + Arrow --}}
                            <label for="capacityInfo"
                                class="accordion-header d-flex align-items-center justify-content-between w-100">
                                <!-- Left: Title only -->
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fw-600">Operational & Business Capacity</span>
                                </div>

                                <!-- Right: Count Badge + Status Icon + Arrow with 10px gaps -->
                                <div class="d-flex align-items-center" style="gap: 10px;">

                                    <span id="capacity-info-status" class="material-icons fs-4 text-danger">
                                        warning
                                    </span>
                                    <span id="capacity-info-counter"
                                        class="badge bg-secondary text-white fs-6 px-3 py-2">
                                        0 / 6
                                    </span>
                                    <span class="arrow"></span>
                                </div>
                            </label>

                            {{-- Body --}}
                            <div class="accordion-body">
                                <div class="row">

                                    @php
                                    $capacityFields = [
                                    'turnover' => 'Turnover',
                                    'staff_strength' => 'Staff Strength',
                                    'vehicles_capacity' => 'Vehicles & Logistics Capacity',
                                    'area_coverage' => 'Area Coverage',
                                    'other_brands_handled' => 'Other Manufacturers / Brands Handled',
                                    'warehouse_size' => 'Warehouse Size'
                                    ];
                                    @endphp

                                    @foreach($capacityFields as $name => $label)
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">
                                            {{ $label }} <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::text(
                                        $name,
                                        old($name, $distributor->{$name} ?? null),
                                        [
                                        'class' => 'form-control fillable-field mandatory-field',
                                        'placeholder' => 'Enter ' . strtolower($label)
                                        ]
                                        ) !!}
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer pull-right">
                        <button class="btn btn-theme">Save</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {

            const fileInput = document.getElementById('documents');
    const previewContainer = document.getElementById('documents-preview');

    if (!fileInput || !previewContainer) return;

    const MAX_FILES = 5;
    const MAX_TOTAL_SIZE_BYTES = 5 * 1024 * 1024; // 5MB

    let allFiles = [];  // saari files yahan store honge

    function renderPreviews() {
        previewContainer.innerHTML = '';

        allFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const item = document.createElement('div');
                item.className = 'preview-item';
                item.dataset.index = index;

                let content = '';
                if (file.type.startsWith('image/')) {
                    content = `<img src="${e.target.result}" alt="Preview">`;
                } else {
                    content = `
                        <div class="pdf-placeholder">
                            PDF<br><small>${file.name.slice(0,15)}${file.name.length > 15 ? '...' : ''}</small>
                        </div>
                    `;
                }

                item.innerHTML = `
                    ${content}
                    <button type="button" class="remove-btn" data-index="${index}">×</button>
                    <div class="file-name">${file.name}</div>
                `;

                previewContainer.appendChild(item);
            };
            reader.readAsDataURL(file);
        });
    }

    function showError(message) {
        alert(message);
        // ya better UX ke liye: ek red message div bana sakte ho
    }

    function checkLimits(newFiles) {
        // 1. File count check
        if (allFiles.length + newFiles.length > MAX_FILES) {
            showError(`Maximum ${MAX_FILES} files allowed. You already have ${allFiles.length} file(s).`);
            return false;
        }

        // 2. Total size check
        let currentTotalSize = allFiles.reduce((sum, f) => sum + f.size, 0);
        let newFilesSize = newFiles.reduce((sum, f) => sum + f.size, 0);
        let wouldBeTotal = currentTotalSize + newFilesSize;

        if (wouldBeTotal > MAX_TOTAL_SIZE_BYTES) {
            showError(`Total size would exceed 5MB limit.\nCurrent: ${(currentTotalSize / 1024 / 1024).toFixed(2)}MB\nNew files: ${(newFilesSize / 1024 / 1024).toFixed(2)}MB`);
            return false;
        }

        return true;
    }

    fileInput.addEventListener('change', function(e) {
        const newFiles = Array.from(e.target.files || []);

        if (newFiles.length === 0) return;

        // Limits check
        if (!checkLimits(newFiles)) {
            e.target.value = ''; // selection clear kar do
            return;
        }

        // Add new files to collection
        allFiles = [...allFiles, ...newFiles];

        // Update actual <input> files (form submit ke liye zaroori)
        const dt = new DataTransfer();
        allFiles.forEach(file => dt.items.add(file));
        fileInput.files = dt.files;

        // Previews refresh
        renderPreviews();
    });

    // Remove file on click
    previewContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-btn')) {
            const index = parseInt(e.target.dataset.index);
            allFiles.splice(index, 1);

            // Update input files
            const dt = new DataTransfer();
            allFiles.forEach(file => dt.items.add(file));
            fileInput.files = dt.files;

            renderPreviews();
        }
    });





        // -----------------------------

            // Prevent multiple attachments
            
            document.getElementById('trigger-upload').addEventListener('click', function(e) {
    e.preventDefault();           // unnecessary propagation rokne ke liye
    document.getElementById('documents').click();
});

            // ===================== KYC DOCUMENTS UPLOAD (Multiple Files) =====================
            // ===== KYC DOCUMENTS UPLOAD (Multiple Files with Preview) =====
            // const kycBox = document.getElementById('upload-box');
            // const kycInput = document.getElementById('documents');
            // const kycDisplay = document.getElementById('selected-files-display');
            // const kycPlaceholder = kycBox.querySelector('.custom-placeholder');

            // if (kycBox && kycInput && kycDisplay && kycPlaceholder) {
                
            //     kycBox.addEventListener('click', function(e) {
            //         if (!e.target.closest('.custom-files-list')) {
            //             kycInput.click();
            //         }
            //     });

            //     kycInput.addEventListener('change', function() {
            //         const files = this.files;
            //         if (files.length === 0) return;

                   
            //         kycPlaceholder.style.display = 'none';
            //         kycDisplay.innerHTML = '';

            //         Array.from(files).forEach(file => {
            //             const div = document.createElement('div');

                        
            //             if (file.type.startsWith('image/')) {
            //                 const img = document.createElement('img');
            //                 img.src = URL.createObjectURL(file);
            //                 img.alt = file.name;
            //                 div.appendChild(img);
            //             } else {
                            
            //                 const icon = document.createElement('i');
            //                 icon.className = 'material-icons';
            //                 icon.textContent = file.type === 'application/pdf' ?
            //                     'picture_as_pdf' : 'insert_drive_file';
            //                 icon.style.fontSize = '48px';
            //                 icon.style.color = file.type === 'application/pdf' ? '#e74c3c' :
            //                     '#95a5a6';
            //                 div.appendChild(icon);
            //             }

                       
            //             const info = document.createElement('div');
            //             const sizeKB = (file.size / 1024).toFixed(1);
            //             info.innerHTML =
            //                 `<strong>${file.name}</strong><br><span style="color:#666;font-size:12px;">${sizeKB} KB</span>`;
            //             div.appendChild(info);

            //             kycDisplay.appendChild(div);
            //         });

                    
            //         document.getElementById('kycInfo').checked = true;

                   
            //         if (typeof updateAllCounters === 'function') updateAllCounters();
            //     });
            // }

// -----------------------------------


const mouInput     = document.getElementById('mou_file');
    const mouPreview   = document.getElementById('mou-preview');
    const mouTrigger   = document.getElementById('trigger-mou-upload');

    if (!mouInput || !mouPreview || !mouTrigger) return;

    const MAX_SIZE_BYTES = 5 * 1024 * 1024; // 5MB

    // Click on instruction text → open file picker
    mouTrigger.addEventListener('click', () => {
        mouInput.click();
    });

    mouInput.addEventListener('change', function(e) {
        const file = this.files[0];
        if (!file) return;

        // Size check
        if (file.size > MAX_SIZE_BYTES) {
            alert(`File size exceeds 5MB limit.\nSelected file: ${(file.size / 1024 / 1024).toFixed(2)}MB`);
            this.value = ''; // clear input
            mouPreview.innerHTML = '';
            return;
        }

        // Clear previous preview
        mouPreview.innerHTML = '';

        const reader = new FileReader();
        reader.onload = function(event) {
            let content = '';

            if (file.type.startsWith('image/')) {
                content = `<img src="${event.target.result}" alt="MOU Preview" style="max-width:100%; max-height:200px; object-fit:contain; border:1px solid #ddd; border-radius:6px;">`;
            } else {
                // PDF or others
                content = `
                    <div class="pdf-placeholder" style="width:140px; height:180px; margin:0 auto; background:#f8f9fa; border:1px solid #ddd; border-radius:6px; display:flex; align-items:center; justify-content:center; flex-direction:column;">
                        <i class="material-icons" style="font-size:60px; color:#e74c3c;">picture_as_pdf</i>
                        <small style="margin-top:8px; text-align:center;">${file.name.slice(0,20)}${file.name.length > 20 ? '...' : ''}</small>
                    </div>
                `;
            }

            const item = document.createElement('div');
            item.style.position = 'relative';
            item.style.display = 'inline-block';

            item.innerHTML = `
                ${content}
                <button type="button" class="remove-btn" style="position:absolute; top:-8px; right:-8px; width:24px; height:24px; background:#dc3545; color:white; border:none; border-radius:50%; cursor:pointer; font-size:14px; line-height:1; box-shadow:0 2px 4px rgba(0,0,0,0.2);">×</button>
                <div class="file-name" style="font-size:0.8rem; text-align:center; margin-top:4px; color:#555; word-break:break-all;">${file.name}</div>
            `;

            mouPreview.appendChild(item);
        };

        reader.readAsDataURL(file);
    });

    // Remove button click
    mouPreview.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-btn')) {
            mouInput.value = '';           // clear input
            mouPreview.innerHTML = '';     // remove preview
        }
    });


// -----------------------------------


// ── Cancelled Cheque Upload Logic ───────────────────────────────────────
   // ============================================================================
// CANCELLED CHEQUE UPLOAD – ISOLATED SCRIPT (double open fix)
// ============================================================================
(function() {
    if (window.cancelledChequeScriptInitialized) return;
    window.cancelledChequeScriptInitialized = true;

    const box         = document.getElementById('cheque-upload-box');
    const input       = document.getElementById('cancelled_cheque');
    const placeholder = document.getElementById('cheque-placeholder');
    const previewArea = document.getElementById('cheque-preview-area');

    if (!box || !input || !placeholder || !previewArea) return;

    function triggerFileInput() {
        input.click();
    }

    placeholder.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        // triggerFileInput();
    });

    box.addEventListener('click', function(e) {
        if (e.target.closest('#cheque-preview-area') || e.target.classList.contains('remove-btn')) {
            return;
        }
        triggerFileInput();
    });

    input.addEventListener('change', function() {
        const file = this.files[0];
        if (!file) return;

        if (file.size > 5 * 1024 * 1024) {
            alert("File size zyada hai (max 5MB allowed)");
            this.value = '';
            return;
        }

        previewArea.innerHTML = '';

        const wrapper = document.createElement('div');
        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';
        wrapper.style.maxWidth = '220px';

        let contentHTML = '';
        if (file.type.startsWith('image/')) {
            contentHTML = `<img src="${URL.createObjectURL(file)}" alt="${file.name}" style="max-width:100%; max-height:180px; object-fit:contain; border:1px solid #ccc; border-radius:6px;">`;
        } else {
            contentHTML = `
                <div style="width:140px; height:160px; margin:0 auto; background:#f8f9fa; border:1px solid #ddd; border-radius:6px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <i class="material-icons" style="font-size:64px; color:#e74c3c;">picture_as_pdf</i>
                    <small style="margin-top:10px; color:#555; text-align:center;">${file.name.length > 20 ? file.name.substring(0,17)+'...' : file.name}</small>
                </div>
            `;
        }

        wrapper.innerHTML = `
            ${contentHTML}
            <button type="button" class="remove-btn" style="position:absolute; top:-12px; right:-12px; width:28px; height:28px; background:#dc3545; color:white; border:none; border-radius:50%; font-size:18px; line-height:1; cursor:pointer; box-shadow:0 3px 6px rgba(0,0,0,0.25);">×</button>
            <div style="font-size:0.9rem; margin-top:8px; color:#444; word-break:break-all;">${file.name}</div>
        `;

        previewArea.appendChild(wrapper);
        placeholder.style.display = 'none';

        const toggle = document.getElementById('bankInfo');
        if (toggle) toggle.checked = true;
    });

    previewArea.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-btn')) {
            input.value = '';
            previewArea.innerHTML = '';
            placeholder.style.display = 'flex';
        }
    });

    console.log("Cancelled Cheque upload initialized (single instance)");
})();



 



           


            

        });
        </script>
        <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2();

            $('.getimage1, .getimage2').on('change', function() {
                const input = this;
                const imgClass = input.classList.contains('getimage1') ? '.imagepreview1' :
                    '.imagepreview2';
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $(imgClass).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });



            // Optional: Remove karne par placeholder wapas lao
            $('a[data-dismiss="fileinput"]').on('click', function() {
                $('.imagepreview1, .imagepreview2').attr('src', '{{ asset('assets/img/placeholder.jpg') }}');
            });

            // Same as Billing Checkbox - Hide/Show Shipping Panel
            function toggleShippingPanel() {
                $('#same_as_billing').is(':checked') ? $('#shipping-panel').hide() : $(
                        '#shipping-panel')
                    .show();
            }
            toggleShippingPanel();
            $('#same_as_billing').on('change', toggleShippingPanel);



            // ==================== ACCORDION FILLED COUNT & STATUS ICONS ====================
            const accordions = [{
                    toggleId: 'basicInfo',
                    counterId: 'basic-info-counter',
                    statusId: 'basic-info-status',
                    container: '#basicInfo ~ .accordion-body',
                    total: 6
                },
                {
                    toggleId: 'contactInfo',
                    counterId: 'contact-info-counter',
                    statusId: 'contact-info-status',
                    container: '#contactInfo ~ .accordion-body',
                    total: 6
                },

                {
                    toggleId: 'businessInfo',
                    counterId: 'business-info-counter',
                    statusId: 'business-info-status',
                    container: '#businessInfo ~ .accordion-body',
                    total: 5
                },
                {
                    toggleId: 'kycInfo',
                    counterId: 'kyc-info-counter',
                    statusId: 'kyc-info-status',
                    container: '#kycInfo ~ .accordion-body',
                    total: 4
                },
                {
                    toggleId: 'bankInfo',
                    counterId: 'bank-info-counter',
                    statusId: 'bank-info-status',
                    container: '#bankInfo ~ .accordion-body',
                    total: 11
                },
                {
                    toggleId: 'salesInfo',
                    counterId: 'sales-info-counter',
                    statusId: 'sales-info-status',
                    container: '#salesInfo ~ .accordion-body',
                    total: 7
                },
                {
                    toggleId: 'additionalInfo',
                    counterId: 'additional-info-counter',
                    statusId: 'additional-info-status',
                    container: '#additionalInfo ~ .accordion-body',
                    total: 7
                },
                {
                    toggleId: 'capacityInfo',
                    counterId: 'capacity-info-counter',
                    statusId: 'capacity-info-status',
                    container: '#capacityInfo ~ .accordion-body',
                    total: 6
                }
            ];


            function updateAccordion(config) {



                const container = document.querySelector(config.container);
                if (!container) return;

                const allFields = container.querySelectorAll(
                    'input:not([type="checkbox"]):not([type="file"]), select, textarea');
                const mandatoryFields = container.querySelectorAll(
                    '.mandatory-field, input[required], select[required]');

                let filledCount = 0;
                allFields.forEach(field => {
                    if (field.value && field.value.trim() !== '' && field.value !== null)
                        filledCount++;
                });

                // File fields count as filled if any file selected
                container.querySelectorAll('input[type="file"]').forEach(fileInput => {
                    if (fileInput.files.length > 0) filledCount++;
                });

                let allMandatoryFilled = true;
                mandatoryFields.forEach(field => {
                    let hasValue = (field.value && field.value.trim() !== '' && field
                        .value !== null);
                    if (field.type === 'file') hasValue = field.files.length > 0;
                    if (!hasValue) allMandatoryFilled = false;
                });

                $(`#${config.counterId}`).text(filledCount + ' / ' + config.total);

                const statusEl = $(`#${config.statusId}`);
                const counterEl = $(`#${config.counterId}`);

                if (allMandatoryFilled) {
                    statusEl.text('check_circle').removeClass('text-danger').addClass(
                        'text-success');
                    counterEl.removeClass('bg-danger bg-secondary').addClass('bg-success');
                } else {
                    statusEl.text('warning').removeClass('text-success').addClass('text-danger');
                    counterEl.removeClass('bg-success').addClass('bg-danger');
                }
            }

            accordions.forEach(config => {
                updateAccordion(config);
                const container = document.querySelector(config.container);
                if (container) {
                    container.querySelectorAll('input, select, textarea').forEach(el => {
                        el.addEventListener('input', () => updateAccordion(config));
                        el.addEventListener('change', () => updateAccordion(config));
                    });
                }
                $(`#${config.toggleId}`).on('change', () => setTimeout(() => updateAccordion(config),
                    200));
            });



            // ==================== GST & PAN VALIDATION ====================
            function validateGST() {
                let gst = $('#gst_number').val().trim().toUpperCase();
                let gstRegex = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
                if (gst === '') {
                    $('#gst_error').text('GST Number is required').removeClass('d-none');
                    return false;
                } else if (!gstRegex.test(gst)) {
                    $('#gst_error').text('Please enter a valid GST Number (e.g., 27ABCDE1234F1Z5)')
                        .removeClass(
                            'd-none');
                    return false;
                } else {
                    $('#gst_error').addClass('d-none');
                    return true;
                }
            }

            function validatePAN() {
                let pan = $('#pan_number').val().trim().toUpperCase();
                let panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
                if (pan === '') {
                    $('#pan_error').text('PAN Number is required').removeClass('d-none');
                    return false;
                } else if (!panRegex.test(pan)) {
                    $('#pan_error').text('Please enter a valid PAN Number (e.g., ABCDE1234F)')
                        .removeClass(
                            'd-none');
                    return false;
                } else {
                    $('#pan_error').addClass('d-none');
                    return true;
                }
            }

            $('#gst_number').on('input blur', function() {
                $(this).val($(this).val().toUpperCase());
                validateGST();
            });

            $('#pan_number').on('input blur', function() {
                $(this).val($(this).val().toUpperCase());
                validatePAN();
            });

            // Optional form submit validation
            $('#storeMasterDistributor').on('submit', function(e) {
                if (!validateGST() || !validatePAN()) {
                    e.preventDefault();
                    alert('Please correct the errors in GST or PAN number.');
                }
            });

            // Initial validation on page load
            validateGST();
            validatePAN();


            // ==================== ADDRESS AJAX CHAINING (BILLING) ====================


            function refreshSelect2(element) {
                $(element).trigger('change'); // Select2 refresh
            }

            $('#country_id').on('change', function() {
                var country_id = $(this).val();
                $('#state_id, #district_id, #city_id, #pincode_id').html(
                    '<option value="">Select State</option><option value="">Select District</option><option value="">Select City</option><option value="">Select Pincode</option>'
                );
                if (country_id) {
                    $('#state_id').html('<option value="">Loading states...</option>');
                    $.ajax({
                        url: '{{ route("get.states", "") }}/' + country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
    var options = '<option value="">Select State</option>';
    if (Array.isArray(data)) {
        data.forEach(function(item) {
            options += `<option value="${item.id}">${item.state_name}</option>`;
        });
    }
    $('#state_id').html(options).trigger('change');
}
                    });
                }
            });

            $('#state_id').on('change', function() {
                var state_id = $(this).val();
                $('#district_id, #city_id, #pincode_id').html(
                    '<option value="">Select District</option><option value="">Select City</option><option value="">Select Pincode</option>'
                );
                if (state_id) {
                    $('#district_id').html(
                        '<option value="">Loading districts...</option>');
                    $.ajax({
                        url: '{{ route("get.districts", "") }}/' + state_id,
                        success: function(data) {
    var options = '<option value="">Select District</option>';
    if (Array.isArray(data)) {
        data.forEach(function(item) {
            options += `<option value="${item.id}">${item.district_name}</option>`;
        });
    }
    $('#district_id').html(options).trigger('change');
}
                    });
                }
            });

            $('#district_id').on('change', function() {
                var district_id = $(this).val();
                $('#city_id, #pincode_id').html(
                    '<option value="">Select City</option><option value="">Select Pincode</option>'
                );
                if (district_id) {
                    $('#city_id').html('<option value="">Loading cities...</option>');
                    $.ajax({
                        url: '{{ route("get.cities", "") }}/' + district_id,
                        success: function(data) {
    var options = '<option value="">Select City</option>';
    if (Array.isArray(data)) {
        data.forEach(function(item) {
            options += `<option value="${item.id}">${item.city_name}</option>`;
        });
    }
    $('#city_id').html(options).trigger('change');
}
                    });
                }
            });

            $('#city_id').on('change', function() {
                var city_id = $(this).val();
                $('#pincode_id').html('<option value="">Select Pincode</option>');
                if (city_id) {
                    $('#pincode_id').html('<option value="">Loading pincodes...</option>');
                    $.ajax({
                        url: '{{ route("get.pincodes", "") }}/' + city_id,
                        success: function(data) {
    var options = '<option value="">Select Pincode</option>';
    if (Array.isArray(data)) {
        data.forEach(function(item) {
            options += `<option value="${item.id}">${item.pincode}</option>`;
        });
    }
    $('#pincode_id').html(options).trigger('change');
}
                    });
                }
            });

            // ==================== SHIPPING ADDRESS AJAX CHAINING ====================
            $('#shipping_country_id').on('change', function() {
                var country_id = $(this).val();
                $('#shipping_state_id, #shipping_district_id, #shipping_city_id, #shipping_pincode_id')
                    .html(
                        '<option value="">Select State</option><option value="">Select District</option><option value="">Select City</option><option value="">Select Pincode</option>'
                    );
                if (country_id) {
                    $('#shipping_state_id').html(
                        '<option value="">Loading states...</option>');
                    $.ajax({
                        url: '{{ route("get.states", "") }}/' + country_id,
                        success: function(data) {
                            var options =
                                '<option value="">Select State</option>';
                            $.each(data, function(i, state) {
                                options +=
                                    `<option value="${state.id}">${state.state_name}</option>`;
                            });
                            $('#shipping_state_id').html(options).trigger('change');
                        }
                    });
                }
            });

            $('#shipping_state_id').on('change', function() {
                var state_id = $(this).val();
                $('#shipping_district_id, #shipping_city_id, #shipping_pincode_id').html(
                    '<option value="">Select District</option><option value="">Select City</option><option value="">Select Pincode</option>'
                );
                if (state_id) {
                    $('#shipping_district_id').html(
                        '<option value="">Loading districts...</option>');
                    $.ajax({
                        url: '{{ route("get.districts", "") }}/' + state_id,
                        success: function(data) {
                            var options =
                                '<option value="">Select District</option>';
                            $.each(data, function(i, d) {
                                options +=
                                    `<option value="${d.id}">${d.district_name}</option>`;
                            });
                            $('#shipping_district_id').html(options).trigger('change');
                        }
                    });
                }
            });

            $('#shipping_district_id').on('change', function() {
                var district_id = $(this).val();
                $('#shipping_city_id, #shipping_pincode_id').html(
                    '<option value="">Select City</option><option value="">Select Pincode</option>'
                );
                if (district_id) {
                    $('#shipping_city_id').html(
                        '<option value="">Loading cities...</option>');
                    $.ajax({
                        url: '{{ route("get.cities", "") }}/' + district_id,
                        success: function(data) {
                            var options =
                                '<option value="">Select City</option>';
                            $.each(data, function(i, c) {
                                options +=
                                    `<option value="${c.id}">${c.city_name}</option>`;
                            });
                            $('#shipping_city_id').html(options).trigger('change');
                        }
                    });
                }
            });

            $('#shipping_city_id').on('change', function() {
                var city_id = $(this).val();
                $('#shipping_pincode_id').html('<option value="">Select Pincode</option>');
                if (city_id) {
                    $('#shipping_pincode_id').html(
                        '<option value="">Loading pincodes...</option>');
                    $.ajax({
                        url: '{{ route("get.pincodes", "") }}/' + city_id,
                        success: function(data) {
                            var options =
                                '<option value="">Select Pincode</option>';
                            $.each(data, function(i, p) {
                                options +=
                                    `<option value="${p.id}">${p.pincode}</option>`;
                            });
                            $('#shipping_pincode_id').html(options).trigger('change');
                        }
                    });
                }
            });


         


   // EDIT MODE MEIN SELECTED VALUES DIKHANE KA SAFE FIX
setTimeout(function() {
    $('.select2').each(function() {
        const $this = $(this);
        const currentValue = $this.val();
        if (currentValue) {
            // Sirf value set karo, change event mat trigger karo
            $this.val(currentValue);
            // Select2 ko manually refresh karo (without triggering change)
            if ($this.data('select2')) {
                $this.trigger('change.select2');
            }
        }
    });
}, 1000);
            // ==================== ADDRESS COUNTER FOR ACCORDION HEADER (0/12 Logic) ====================
            function updateAddressAccordionCounter() {
                // Billing fields (6)
                const billingFields = [
                    'input[name="address1"]',
                    '#country_id',
                    '#state_id',
                    '#district_id',
                    '#city_id',
                    '#pincode_id'
                ];

                // Shipping fields (6)
                const shippingFields = [
                    'input[name="shipping_address1"]',
                    '#shipping_country_id',
                    '#shipping_state_id',
                    '#shipping_district_id',
                    '#shipping_city_id',
                    '#shipping_pincode_id'
                ];

                let billingFilled = 0;
                billingFields.forEach(selector => {
                    const $field = $(selector);
                    if ($field.length && $field.val() && $field.val().toString().trim() !== '') {
                        billingFilled++;
                    }
                });

                let shippingFilled = 0;
                const isSameAsBilling = $('#same_as_billing').is(':checked');

                if (isSameAsBilling) {
                    // Agar same checked hai → shipping ko billing ke barabar mana jata hai
                    shippingFilled = billingFilled;
                } else {
                    // Alag fill kar rahe hain → shipping fields manually count karo
                    shippingFields.forEach(selector => {
                        const $field = $(selector);
                        if ($field.length && $field.val() && $field.val().toString().trim() !== '') {
                            shippingFilled++;
                        }
                    });
                }

                const totalFilled = billingFilled + shippingFilled;
                const maxTotal = 12;

                // Update badge
                $('#address-info-counter').text(totalFilled + ' / ' + maxTotal);

                const $badge = $('#address-info-counter');
                const $icon = $('#address-info-status');

                if (totalFilled === 12) {
                    $badge.removeClass('bg-secondary bg-danger').addClass('bg-success');
                    $icon.text('check_circle').removeClass('text-danger').addClass('text-success');
                } else if (totalFilled === 0) {
                    $badge.removeClass('bg-success bg-danger').addClass('bg-secondary');
                    $icon.text('warning').removeClass('text-success').addClass('text-danger');
                } else {
                    $badge.removeClass('bg-success bg-secondary').addClass('bg-danger');
                    $icon.text('warning').removeClass('text-success').addClass('text-danger');
                }
            }

          
            $(document).on('change input',
                '.billing-fields input, .billing-fields select, .shipping-fields input, .shipping-fields select',
                updateAddressAccordionCounter);
            $('#same_as_billing').on('change', updateAddressAccordionCounter);
          

            // Initial call
            updateAddressAccordionCounter()
            function loadStates(country_id, targetSelect, selectedStateId = null) {
        if (!country_id) return;
        $.ajax({
            url: '{{ route("get.states", "") }}/' + country_id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let options = '<option value="">Select State</option>';
                $.each(data, function(i, item) {
                    let selected = (selectedStateId && selectedStateId == item.id) ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.state_name}</option>`;
                });
                $(targetSelect).html(options).trigger('change.select2');
            }
        });
    }

    function loadDistricts(state_id, targetSelect, selectedDistrictId = null) {
        if (!state_id) return;
        $.ajax({
            url: '{{ route("get.districts", "") }}/' + state_id,
            type: 'GET',
            success: function(data) {
                let options = '<option value="">Select District</option>';
                $.each(data, function(i, item) {
                    let selected = (selectedDistrictId && selectedDistrictId == item.id) ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.district_name}</option>`;
                });
                $(targetSelect).html(options).trigger('change.select2');
            }
        });
    }

    function loadCities(district_id, targetSelect, selectedCityId = null) {
        if (!district_id) return;
        $.ajax({
            url: '{{ route("get.cities", "") }}/' + district_id,
            type: 'GET',
            success: function(data) {
                let options = '<option value="">Select City</option>';
                $.each(data, function(i, item) {
                    let selected = (selectedCityId && selectedCityId == item.id) ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.city_name}</option>`;
                });
                $(targetSelect).html(options).trigger('change.select2');
            }
        });
    }

    function loadPincodes(city_id, targetSelect, selectedPincodeId = null) {
        if (!city_id) return;
        $.ajax({
            url: '{{ route("get.pincodes", "") }}/' + city_id,
            type: 'GET',
            success: function(data) {
                let options = '<option value="">Select Pincode</option>';
                $.each(data, function(i, item) {
                    let selected = (selectedPincodeId && selectedPincodeId == item.id) ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.pincode}</option>`;
                });
                $(targetSelect).html(options).trigger('change.select2');
            }
        });
    }


           
            $('#country_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="billing_country"]').val(selectedText.trim() === 'Select Country' ? '' :
                    selectedText);
            });

            $('#state_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="billing_state"]').val(selectedText.trim() === 'Select State' ? '' :
                    selectedText);
            });

            $('#district_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="billing_district"]').val(selectedText.trim() === 'Select District' ? '' :
                    selectedText);
            });

            $('#city_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="billing_city"]').val(selectedText.trim() === 'Select City' ? '' :
                    selectedText);
            });

            $('#pincode_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="billing_pincode"]').val(selectedText.trim() === 'Select Pincode' ? '' :
                    selectedText);
            });

            // Shipping Address - Same logic
            $('#shipping_country_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="shipping_country"]').val(selectedText.trim() === 'Select Country' ? '' :
                    selectedText);
            });

            $('#shipping_state_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="shipping_state"]').val(selectedText.trim() === 'Select State' ? '' :
                    selectedText);
            });

            $('#shipping_district_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="shipping_district"]').val(selectedText.trim() === 'Select District' ?
                    '' :
                    selectedText);
            });

            $('#shipping_city_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="shipping_city"]').val(selectedText.trim() === 'Select City' ? '' :
                    selectedText);
            });

            $('#shipping_pincode_id').on('change', function() {
                const selectedText = $(this).find('option:selected').text();
                $('input[name="shipping_pincode"]').val(selectedText.trim() === 'Select Pincode' ? '' :
                    selectedText);
            });

            // Address Line 1 (manual text input) ko hidden field mein copy karo
            $('input[name="address1"]').on('input', function() {
                $('input[name="billing_address"]').val($(this).val());
            });

            $('input[name="shipping_address1"]').on('input', function() {
                $('input[name="shipping_address"]').val($(this).val());
            });


            // ==================== ON CHANGE HANDLERS (NORMAL USER INTERACTION) ====================
    $('#country_id').on('change', function() {
        loadStates($(this).val(), '#state_id');
        $('#district_id, #city_id, #pincode_id').html('<option value="">--</option>').trigger('change.select2');
    });

    $('#state_id').on('change', function() {
        loadDistricts($(this).val(), '#district_id');
        $('#city_id, #pincode_id').html('<option value="">--</option>').trigger('change.select2');
    });

    $('#district_id').on('change', function() {
        loadCities($(this).val(), '#city_id');
        $('#pincode_id').html('<option value="">--</option>').trigger('change.select2');
    });

    $('#city_id').on('change', function() {
        loadPincodes($(this).val(), '#pincode_id');
    });

    // Shipping same
    $('#shipping_country_id').on('change', function() {
        loadStates($(this).val(), '#shipping_state_id');
        $('#shipping_district_id, #shipping_city_id, #shipping_pincode_id').html('<option value="">--</option>').trigger('change.select2');
    });

    $('#shipping_state_id').on('change', function() {
        loadDistricts($(this).val(), '#shipping_district_id');
        $('#shipping_city_id, #shipping_pincode_id').html('<option value="">--</option>').trigger('change.select2');
    });

    $('#shipping_district_id').on('change', function() {
        loadCities($(this).val(), '#shipping_city_id');
        $('#shipping_pincode_id').html('<option value="">--</option>').trigger('change.select2');
    });

    $('#shipping_city_id').on('change', function() {
        loadPincodes($(this).val(), '#shipping_pincode_id');
    });

    // ==================== EDIT MODE: LOAD EXISTING DATA WITHOUT TRIGGERING CHANGE ====================
    @if($distributor->exists)
        // Billing Address Chain
        @if($distributor->country_id)
            loadStates({{ $distributor->country_id }}, '#state_id', {{ $distributor->state_id ?? 'null' }});
            @if($distributor->state_id)
                loadDistricts({{ $distributor->state_id }}, '#district_id', {{ $distributor->district_id ?? 'null' }});
                @if($distributor->district_id)
                    loadCities({{ $distributor->district_id }}, '#city_id', {{ $distributor->city_id ?? 'null' }});
                    @if($distributor->city_id)
                        loadPincodes({{ $distributor->city_id }}, '#pincode_id', {{ $distributor->pincode_id ?? 'null' }});
                    @endif
                @endif
            @endif
        @endif

        // Shipping Address Chain (only if different from billing)
        @if($distributor->shipping_country_id || $distributor->shipping_state_id)
            loadStates({{ $distributor->shipping_country_id ?? $distributor->country_id }}, '#shipping_state_id', {{ $distributor->shipping_state_id ?? 'null' }});
            @if($distributor->shipping_state_id || $distributor->state_id)
                loadDistricts({{ $distributor->shipping_state_id ?? $distributor->state_id }}, '#shipping_district_id', {{ $distributor->shipping_district_id ?? 'null' }});
                @if($distributor->shipping_district_id || $distributor->district_id)
                    loadCities({{ $distributor->shipping_district_id ?? $distributor->district_id }}, '#shipping_city_id', {{ $distributor->shipping_city_id ?? 'null' }});
                    @if($distributor->shipping_city_id || $distributor->city_id)
                        loadPincodes({{ $distributor->shipping_city_id ?? $distributor->city_id }}, '#shipping_pincode_id', {{ $distributor->shipping_pincode_id ?? 'null' }});
                    @endif
                @endif
            @endif
        @endif
    @endif

    // ==================== TEXT FIELDS UPDATE (Country, State, etc. name fields) ====================
    function updateHiddenTextFields() {
        // Billing
        $('input[name="billing_country"]').val($('#country_id option:selected').text() || '');
        $('input[name="billing_state"]').val($('#state_id option:selected').text() || '');
        $('input[name="billing_district"]').val($('#district_id option:selected').text() || '');
        $('input[name="billing_city"]').val($('#city_id option:selected').text() || '');
        $('input[name="billing_pincode"]').val($('#pincode_id option:selected').text() || '');

        // Shipping
        $('input[name="shipping_country"]').val($('#shipping_country_id option:selected').text() || '');
        $('input[name="shipping_state"]').val($('#shipping_state_id option:selected').text() || '');
        $('input[name="shipping_district"]').val($('#shipping_district_id option:selected').text() || '');
        $('input[name="shipping_city"]').val($('#shipping_city_id option:selected').text() || '');
        $('input[name="shipping_pincode"]').val($('#shipping_pincode_id option:selected').text() || '');
    }

    // Run on change of any dropdown
    $(document).on('change', '#country_id, #state_id, #district_id, #city_id, #pincode_id, ' +
        '#shipping_country_id, #shipping_state_id, #shipping_district_id, #shipping_city_id, #shipping_pincode_id', updateHiddenTextFields);

    // Initial run after load
    setTimeout(updateHiddenTextFields, 1500);


            // Same as Billing Checkbox - Shipping fields copy kar do
            $('#same_as_billing').on('change', function() {
                if ($(this).is(':checked')) {
                    $('input[name="shipping_address"]').val($('input[name="billing_address"]').val());
                    $('input[name="shipping_country"]').val($('input[name="billing_country"]').val());
                    $('input[name="shipping_state"]').val($('input[name="billing_state"]').val());
                    $('input[name="shipping_district"]').val($('input[name="billing_district"]').val());
                    $('input[name="shipping_city"]').val($('input[name="billing_city"]').val());
                    $('input[name="shipping_pincode"]').val($('input[name="billing_pincode"]').val());
                }
            });


           


            @if($errors->any())
            // List of accordions with their field names that can have errors
            const errorMapping = {
                'basicInfo': ['legal_name', 'trade_name', 'distributor_code', 'category', 'business_status',
                    'business_start_date'
                ],
                'contactInfo': ['contact_person', 'designation', 'mobile', 'alternate_mobile', 'email',
                    'secondary_email'
                ],
                'addressInfo': ['address1', 'country_id', 'state_id', 'district_id', 'city_id',
                    'pincode_id',
                    'shipping_address1', 'shipping_country_id', 'shipping_state_id',
                    'shipping_district_id',
                    'shipping_city_id', 'shipping_pincode_id'
                ],
                'businessInfo': ['sales_zone', 'area_territory', 'beat_route', 'market_classification',
                    'competitor_brands'
                ],
                'kycInfo': ['gst_number', 'pan_number', 'registration_type', 'documents'],
                'bankInfo': ['bank_name', 'account_holder', 'account_number', 'ifsc', 'branch_name',
                    'credit_limit', 'credit_days', 'cancelled_cheque'
                ],
                'salesInfo': ['monthly_sales', 'product_categories', 'secondary_sales_required',
                    'last_12_months_sales', 'sales_executive_id', 'supervisor_id', 'customer_segment'
                ],
                'additionalInfo': ['weekly_tai_alert', 'target_vs_achievement', 'schemes_updates',
                    'new_launch_update', 'payment_alert', 'pending_orders', 'inventory_status'
                ],
                'capacityInfo': ['turnover', 'staff_strength', 'vehicles_capacity', 'area_coverage',
                    'other_brands_handled', 'warehouse_size'
                ]
            };

            const errorFields = @json(array_keys($errors->messages()));

            // Loop through each accordion
            Object.keys(errorMapping).forEach(accordionId => {
                const fields = errorMapping[accordionId];
                const hasError = fields.some(field => errorFields.includes(field));

                if (hasError) {
                    // 1. Open the accordion
                    $(`#${accordionId}`).prop('checked', true);

                    // 2. Show red warning icon
                    $(`#${accordionId}-status`)
                        .text('warning')
                        .removeClass('text-success')
                        .addClass('text-danger');

                    // 3. Make badge red
                    $(`#${accordionId}-counter`)
                        .removeClass('bg-success bg-secondary')
                        .addClass('bg-danger');
                }
            });
            @endif

        });

        
        </script>







</x-app-layout>