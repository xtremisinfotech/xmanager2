<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'CategoryName',
    ];
}
