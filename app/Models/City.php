<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use SoftDeletes;

    protected $table = 'cities';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
