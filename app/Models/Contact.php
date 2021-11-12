<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contacts';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
