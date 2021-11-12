<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use SoftDeletes;

    protected $table = 'organizations';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
