<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firms extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirmName',
        'FirmAddress',
        'FirmCity',
        'FirmPinCode',
        'FirmState',
        'FirmCountry',
        'FirmPhoneNo',
        'FirmGSTN',
    ];
}
