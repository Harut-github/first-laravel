<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;  //Sluggable plagin
use Illuminate\Support\Facades\Storage; //kpcraca storage jnjelu hishelu hmar
class Product extends Model
{
    use Sluggable; //Sluggable plagin

    protected $guarded = [];

    public function sluggable() //Sluggable plagin
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }




    
}
