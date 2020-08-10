<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'adresse',
        'superficie',
        'prix',
        'capacite',
        'wifi',
        'lavage_ligne',
        'climatisation',
        'cordx',
        'cordy',
        'user_id'
    ];

    public function images(){
        return $this->hasMany('App\ImageOffre', 'offre_id');
    }
}
