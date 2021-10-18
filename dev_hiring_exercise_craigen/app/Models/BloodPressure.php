<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'bp_stats',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
}
