<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use SoftDeletes;

    protected $table = 'departments';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
