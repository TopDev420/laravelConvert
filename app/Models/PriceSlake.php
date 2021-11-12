<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PriceSlake extends Model
{
    use SoftDeletes;

    protected $table = 'priceslakes';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
