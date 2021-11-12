<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class HealthProfessional extends Model
{
    use SoftDeletes;

    protected $table = 'healthprofessionals';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
