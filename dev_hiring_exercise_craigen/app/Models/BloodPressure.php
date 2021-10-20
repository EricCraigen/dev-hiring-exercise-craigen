<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'bp_systolic',
        'bp_diastolic',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
 