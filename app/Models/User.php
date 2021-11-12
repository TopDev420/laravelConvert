<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
