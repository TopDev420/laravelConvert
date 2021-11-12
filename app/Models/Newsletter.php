<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use SoftDeletes;

    protected $table = 'newsletters';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
