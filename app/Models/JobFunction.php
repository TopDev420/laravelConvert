<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JobFunction extends Model
{
    use SoftDeletes;

    protected $table = 'jobfunctions';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
