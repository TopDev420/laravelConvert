<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use SoftDeletes;

    protected $table = 'coupons';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
