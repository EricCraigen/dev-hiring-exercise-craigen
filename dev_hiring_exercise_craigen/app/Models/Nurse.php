<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blood_pressure_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function blood_pressure()
    {
        return $this->hasMany(BloodPressure::class);
    }
}
