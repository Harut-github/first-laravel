<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;  //Sluggable plagin
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
