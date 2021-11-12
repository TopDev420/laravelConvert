<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RealEstateAgent extends Model
{
    use SoftDeletes;

    protected $table = 'realestateagents';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
