<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Slider_Image extends Model
{
    use SoftDeletes;

    protected $table = 'slider_images';

    protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
