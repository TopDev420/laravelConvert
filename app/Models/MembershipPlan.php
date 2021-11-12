<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use SoftDeletes;

    protected $table = 'membershipplans';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
