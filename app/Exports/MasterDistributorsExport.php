<?php

namespace App\Exports;

use App\Models\MasterDistributor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MasterDistributorsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $distributors;
   

    public function __construct($distributors, $isTemplate = false)
    {
        $this->distributors = $distributors;
       
    }

    public function collection()
    {
       

        return $this->distributors;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Distributor Code',
            'Legal Name',
            'Trade Name',
            'Category',
            'Business Status',
            'Business Start Date',
            'Shop Image',
            'Profile Image',
            'Contact Person',
            'Designation',
            'Mobile',
            'Alternate Mobile',
            'Email',
            'Secondary Email',
            'Billing Address',
            'Billing City',
            'Billing District',
            'Billing State',
            'Billing Country',
            'Billing Pincode',
            'Shipping Address',
            'Shipping City',
            'Shipping District',
            'Shipping State',
            'Shipping Country',
            'Shipping Pincode',
            'Sales Zone',
            'Area Territory',
            'Beat Route',
            'Market Classification',
            'Competitor Brands',
            'GST Number',
            'PAN Number',
            'Registration Type',
            'Documents',
            'Bank Name',
            'Account Holder',
            'Account Number',
            'IFSC',
            'Branch Name',
            'Credit Limit',
            'Credit Days',
            'Avg Monthly Purchase',
            'Outstanding Balance',
            'Preferred Payment Method',
            'Cancelled Cheque',
            'Monthly Sales',
            'Product Categories',
            'Secondary Sales Required',
            'Last 12 Months Sales',
            'Sales Executive ID (JSON)',
            'Supervisor ID',
            'Customer Segment',
            'Weekly TAI Alert',
            'Target vs Achievement',
            'Schemes Updates',
            'New Launch Update',
            'Payment Alert',
            'Pending Orders',
            'Inventory Status',
            'Turnover',
            'Staff Strength',
            'Vehicles Capacity',
            'Area Coverage',
            'Other Brands Handled',
            'Warehouse Size',
            'Created At',
            'Updated At',
        ];
    }

    public function map($distributor): array
    {
        return [
            $distributor->id,
            $distributor->distributor_code,
            $distributor->legal_name,
            $distributor->trade_name,
            $distributor->category,
            $distributor->business_status,
            $distributor->business_start_date,
            $distributor->shop_image ? 'Yes' : 'No',
            $distributor->profile_image ? 'Yes' : 'No',
            $distributor->contact_person,
            $distributor->designation,
            $distributor->mobile,
            $distributor->alternate_mobile,
            $distributor->email,
            $distributor->secondary_email,
            $distributor->billing_address,
            $distributor->billing_city,
            $distributor->billing_district,
            $distributor->billing_state,
            $distributor->billing_country,
            $distributor->billing_pincode,
            $distributor->shipping_address,
            $distributor->shipping_city,
            $distributor->shipping_district,
            $distributor->shipping_state,
            $distributor->shipping_country,
            $distributor->shipping_pincode,
            $distributor->sales_zone,
            $distributor->area_territory,
            $distributor->beat_route,
            $distributor->market_classification,
            $distributor->competitor_brands,
            $distributor->gst_number,
            $distributor->pan_number,
            $distributor->registration_type,
            $distributor->documents ? 'Yes (Multiple)' : 'No',
            $distributor->bank_name,
            $distributor->account_holder,
            $distributor->account_number,
            $distributor->ifsc,
            $distributor->branch_name,
            $distributor->credit_limit,
            $distributor->credit_days,
            $distributor->avg_monthly_purchase,
            $distributor->outstanding_balance,
            $distributor->preferred_payment_method,
            $distributor->cancelled_cheque ? 'Yes' : 'No',
            $distributor->monthly_sales,
            $distributor->product_categories,
            $distributor->secondary_sales_required,
            $distributor->last_12_months_sales,
            $distributor->sales_executive_id, // JSON stored hai
            $distributor->supervisor_id,
            $distributor->customer_segment,
            $distributor->weekly_tai_alert,
            $distributor->target_vs_achievement,
            $distributor->schemes_updates,
            $distributor->new_launch_update,
            $distributor->payment_alert,
            $distributor->pending_orders,
            $distributor->inventory_status,
            $distributor->turnover,
            $distributor->staff_strength,
            $distributor->vehicles_capacity,
            $distributor->area_coverage,
            $distributor->other_brands_handled,
            $distributor->warehouse_size,
            $distributor->created_at?->format('d-m-Y H:i'),
            $distributor->updated_at?->format('d-m-Y H:i'),
        ];
    }
}