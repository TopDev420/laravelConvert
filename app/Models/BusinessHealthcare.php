<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BusinessHealthcare extends Model
{
    use SoftDeletes;

    protected $table = 'businesshealthcares';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
