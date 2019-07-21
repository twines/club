<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $fillable = [
        'title',
        'av',
        'img',
        'description',
        'duration',
        'category_id',
        'p',
    ];
}
