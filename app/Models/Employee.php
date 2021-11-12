<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'employees';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
