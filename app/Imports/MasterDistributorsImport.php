<?php

namespace App\Imports;

use App\Models\MasterDistributor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Support\Str;

class MasterDistributorsImport implements
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError
{
use SkipsErrors;

    // ────────────────────────────────────────────────
    // Add these three things
    protected $importedCount = 0;

    public function getImportedRowCount(): int
    {
        return $this->importedCount;
    }
    // ────────────────────────────────────────────────

    public function model(array $row)
    {
        // dd($row);
        $distributor = new MasterDistributor([
            'distributor_code'       => $row['distributor_code'] ?? 'MD-' . Str::random(8),
            'legal_name'             => $row['legal_name'] ?? 'Imported Default',   // ← fallback daal do safety ke liye            'trade_name'             => $row['Trade Name'] ?? null,
            'category'               => $row['category'] ?? 'Imported Default',
            'business_status'        => $row['business_status'] ?? 'Active',
            'business_start_date'    => $row['business_start_date'] ?? 'Imported Default',
            'contact_person'         => $row['contact_person'] ?? 'Imported Default',
            'designation'            => $row['designation'] ?? null,
            'mobile'                 => $row['mobile'] ?? 'Imported Default',
            'alternate_mobile'       => $row['alternate_mobile'] ?? null,
            'email'                  => $row['email'] ?? 'Imported Default',
            'secondary_email'        => $row['secondary_email'] ?? null,
            'billing_address'        => $row['billing_address'] ?? 'Imported Default',
            'billing_city'           => $row['billing_city'] ?? 'Imported Default',
            'billing_district'       => $row['billing_district'] ?? 'Imported Default',
            'billing_state'          => $row['billing_state'] ?? 'Imported Default',
            'billing_country'        => $row['billing_country'] ?? 'India',
            'billing_pincode'        => $row['billing_pincode'] ?? 'Imported Default',
            'shipping_address'       => $row['shipping_address'] ?? 'Imported Default',
            'shipping_city'          => $row['shipping_city'] ?? 'Imported Default',
            'shipping_district'      => $row['shipping_district'] ?? 'Imported Default',
            'shipping_state'         => $row['shipping_state'] ?? 'Imported Default',
            'shipping_country'       => $row['shipping_country'] ?? 'India',
            'shipping_pincode'       => $row['shipping_pincode'] ?? 'Imported Default',
            'sales_zone'             => $row['sales_zone'] ?? 'Imported Default',
            'area_territory'         => $row['area_territory'] ?? 'Imported Default',
            'beat_route'             => $row['Beat Route'] ?? 'Imported Default',
            'market_classification'  => $row['market_classification'] ?? 'Imported Default',
            'competitor_brands'      => $row['competitor_brands'] ?? 'Imported Default',
            'gst_number'             => $row['gst_number'] ?? 'Imported Default',
            'pan_number'             => $row['pan_number'] ?? 'Imported Default',
            'registration_type'      => $row['registration_type'] ?? 'Imported Default',
            'bank_name'              => $row['bank_name'] ?? 'Imported Default',
            'account_holder'         => $row['account_holder'] ?? 'Imported Default',
            'account_number'         => $row['account_number'] ?? 'Imported Default',
            'ifsc'                   => $row['ifsc'] ?? 'Imported Default',
            'branch_name'            => $row['branch_name'] ?? null,
            'credit_limit'           => $row['credit_limit'] ?? 0,
            'credit_days'            => $row['credit_days'] ?? 0,
            'avg_monthly_purchase'   => $row['avg_monthly_purchase'] ?? 0,
            'outstanding_balance'    => $row['outstanding_balance'] ?? 0,
            'preferred_payment_method' => $row['preferred_payment_method'] ?? null,
            'monthly_sales'          => $row['monthly_sales'] ?? 0,
            'product_categories'     => $row['product_categories'] ?? 'Imported Default',
            'secondary_sales_required' => $row['secondary_sales_required'] ?? null,
            'last_12_months_sales'   => $row['last_12_months_sales'] ?? null,
            'customer_segment'       => $row['customer_segment'] ?? 'Imported Default',
            'weekly_tai_alert'       => $row['weekly_tai_alert'] ?? 'Imported Default',
            'target_vs_achievement'  => $row['target_vs_achievement'] ?? 'Imported Default',
            'schemes_updates'        => $row['schemes_updates'] ?? 'Imported Default',
            'new_launch_update'      => $row['new_launch_update'] ?? 'Imported Default',
            'payment_alert'          => $row['payment_alert'] ?? 'Imported Default',
            'pending_orders'         => $row['pending_orders'] ?? 'Imported Default',
            'inventory_status'       => $row['inventory_status'] ?? 'Imported Default',
            'turnover'               => $row['turnover'] ?? 0,
            'staff_strength'         => $row['staff_strength'] ?? 'Imported Default',
            'vehicles_capacity'      => $row['vehicles_capacity'] ?? 'Imported Default',
            'area_coverage'          => $row['area_coverage'] ?? 'Imported Default',
            'other_brands_handled'   => $row['other_brands_handled'] ?? 'Imported Default',
            'warehouse_size'         => $row['warehouse_size'] ?? 'Imported Default',
        ]);

        $distributor->save();

        $this->importedCount++;   // ← increment here

        \Log::info('Successfully saved distributor', ['id' => $distributor->id]);

        return $distributor;
    }

    public function rules(): array
    {
        return [
            'distributor_code'   => 'required|string|max:100|unique:master_distributors,distributor_code',
            // 'Legal Name'         => 'required|string|max:255',

            'mobile'             => 'nullable|digits:10|unique:master_distributors,mobile',
            'email'              => 'nullable|email|unique:master_distributors,email',

            // Very important → prevent duplicate codes in same file
            '*.distributor_code' => 'distinct',

            // You can add more important rules here
            'gst_number'         => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            'pan_number'         => 'nullable|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
        ];
    }

    /**
     * Optional - Custom error messages
     */
    public function customValidationMessages()
    {
        return [
            'distributor_code.required' => 'Distributor Code is required.',
            'distributor_code.unique'   => 'Distributor Code :input already exists.',
            // 'Legal Name.required'       => 'Legal Name is required.',
            'Mobile.digits'             => 'Mobile must be 10 digits.',
            'Email.email'               => 'Please enter valid email.',
            'gst_number.regex'          => 'Invalid GST Number format.',
            'pan_number.regex'          => 'Invalid PAN Number format.',
        ];
    }
}