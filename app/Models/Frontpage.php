<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Frontpage extends Model
{
    use SoftDeletes;

    protected $table = 'frontpages';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
