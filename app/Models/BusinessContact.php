<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BusinessContact extends Model
{
    use SoftDeletes;

    protected $table = 'businesscontacts';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
