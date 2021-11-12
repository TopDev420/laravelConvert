<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class International extends Model
{
    use SoftDeletes;

    protected $table = 'internationals';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
