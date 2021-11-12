<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use SoftDeletes;

    protected $table = 'industries';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
