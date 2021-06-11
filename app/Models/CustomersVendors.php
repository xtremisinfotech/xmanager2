<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersVendors extends Model
{
    use HasFactory;

    protected $fillable = [
        'CVName',
        'CVEmail',
        'CVMobile',
        'CVAddress',
        'CVCity',
        'CVState',
        'CVPin',
        'CVGSTN',
        'CVPAN',
        'CVType',
    ];
}
