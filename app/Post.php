<?php

namespace App;

use Carbon\Carbon; // laraveli meji plagina data neri hmara naxatesvac
use Cviebrock\EloquentSluggable\Sluggable;  //Sluggable plagin
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; //kpcraca storage jnjelu hishelu hmar

class Post extends Model
{
	const IS_DRAFT = 0;
	const IS_PUBLIC = 1;

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

   /* public function category($value='')
    {
    	# code...
    }*/
   
   //start  date poxumes nences anum vor bazayum pahi Y-m-d teche chi pahi mysql@ , esel kpcnumes verev ->use Carbon\Carbon; 
   	public function setDateAttribute($value)  
   	{
    	$date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
   		$this->attributes['date'] = $date;
  	}
 	//end
     //start  esi nra hamra vor tpeluc qo uzac dzev tpi edit i mej 
    public function getDateAttribute($value)  
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }
    //end 



   // start  --- esi status hamara vor ete galchken draca urem 1 ete che urem 0
 	public function setDraft()
    {
    	$this->status = Post::IS_DRAFT;
    	$this->save();
    }

    public function setPublic()
    {
    	$this->status = Post::IS_PUBLIC;
    	$this->save();
    }

    public function toggleStatus($value)
    {
    	if($value == null)
    	{
    		return $this->setDraft();
    	}
    	return $this->setPublic();
    }
    // end  --- esi status hamara vor ete galchken draca urem 1 ete che urem 0
	
     public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if($value == null)
        {
            return $this->setStandart();
        }
        
        return $this->setFeatured();
    }
   

    // senc post@ kpcrecinq commentin 
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    
}
