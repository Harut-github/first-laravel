<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	//comentin kpcnumem users table vor comment idov tablici mejic qtni beri es user id ovin
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
