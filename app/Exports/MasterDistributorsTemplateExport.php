<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterDistributorsTemplateExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Empty collection → no data rows
        return collect([]);
    }

    public function headings(): array
    {
        return [
            'Distributor Code',
            'Legal Name',
            'Trade Name',
            'Category',
            'Business Status', // Active / Inactive
            'Business Start Date', // YYYY-MM-DD format
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
            'Monthly Sales',
            'Product Categories',
            'Secondary Sales Required', // Y/N
            'Last 12 Months Sales',
            'Sales Executive IDs', // comma separated like: 5,8,12
            'Supervisor ID',
            'Customer Segment',
            'Weekly TAI Alert', // Y/N
            'Target vs Achievement', // Y/N
            'Schemes Updates', // Y/N
            'New Launch Update', // Y/N
            'Payment Alert', // Y/N
            'Pending Orders', // Y/N
            'Inventory Status', // Y/N
            'Turnover',
            'Staff Strength',
            'Vehicles Capacity',
            'Area Coverage',
            'Other Brands Handled',
            'Warehouse Size',
        ];
    }
}