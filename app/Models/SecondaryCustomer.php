<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryCustomer extends Model
{
    use HasFactory;

    protected $table = 'secondary_customers';

    protected $fillable = [
    'type',
    'sub_type',
    'owner_name',
    'shop_name',
    'mobile_number',
    'whatsapp_number',
    'owner_photo',
    'shop_photo',
    'vehicle_segment',
    'address_line',
    'belt_area_market_name',
    'saathi_awareness_status',
    'nistha_awareness_status',
    'opportunity_status',
    'gps_location',

  
    'country_id',
    'state_id',
    'district_id',
    'city_id',
    'pincode_id',
    'beat_id',
    'distributor_name',

];

public function state()
{
    return $this->belongsTo(\App\Models\State::class);
}

public function city()
{
    return $this->belongsTo(\App\Models\City::class);

}

public function beat()
{
    return $this->belongsTo(\App\Models\Beat::class);
}
public function district()
{
    return $this->belongsTo(\App\Models\District::class, 'district_id');
}

public function pincode()
{
    return $this->belongsTo(\App\Models\Pincode::class, 'pincode_id');
}

public function country()
{
    return $this->belongsTo(\App\Models\Country::class, 'country_id');
}
public function distributor()
{
    return $this->belongsTo(MasterDistributor::class, 'distributor_id');
}
}
