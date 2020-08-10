<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageOffre extends Model
{
    protected $fillable = [
        'image',
        'offre_id'
    ];
}
