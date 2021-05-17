<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    public function author(){

        return $this->belongsTo(User::class,'user_id');

    }



    //bind another key
    public function getRouteKeyName()
    {
        return 'slug';

    }

}
