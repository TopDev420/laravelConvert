<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RealEstateAgentdata extends Model
{
    use SoftDeletes;

    protected $table = 'realestateagentdatas';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
