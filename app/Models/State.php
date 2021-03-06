<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use SoftDeletes;

    protected $table = 'states';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
