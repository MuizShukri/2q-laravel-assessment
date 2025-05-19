<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    // use SoftDeletes;

    protected $table = 'companies';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo',
    ];

}
