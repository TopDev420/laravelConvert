<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    use SoftDeletes;

    protected $table = 'joblevels';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
