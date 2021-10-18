<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'status',
        'marital_status',
        'race',
        'languange',
        'employment_status',
        'contact_by',
        'soc_sec_no',
        'referred_by',
        'email',
        'street_address_1',
        'street_address_2',
        'city',
        'state',
        'postal_code',
        'primary_phone',
        'secondary_phone',
    ];

    public function blood_pressure()
    {
        return $this->hasOne('App\BloodPressure', 'patient_id');
    }

}
