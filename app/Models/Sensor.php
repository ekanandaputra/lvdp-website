<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'voltage_r',
        'voltage_s',
        'voltage_t',
        'current_r',
        'current_s',
        'current_t',
        'power_r',
        'power_s',
        'power_t',
        'apparent_power_r',
        'apparent_power_s',
        'apparent_power_t',
        'power_factor_r',
        'power_factor_s',
        'power_factor_t',
        'device_id',
    ];
}
