<?php

/**
 * USER MODEL CLASS
 *
 * @author      Mahiman Parmar
 * @copyright	Copyright (c) 2021, Xtremis Infotech.
 * @link        http://xtremis.in
 * @version     1.0
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table    = 'users';

    protected $guarded  = ['id'];
    const ST_INACTIVE   = 0;                            // User status INACTIVE value.
    const ST_ACTIVE     = 1;                            // User status ACTIVE value.
    const ST_DELETED    = 2;                            // User status DELETED value.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
