<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'price',
        'path_img',
        'category',
        'status',
    ];
}
