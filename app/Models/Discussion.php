<?php

namespace App\Models;

use App\Models\Reply;
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

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class , 'reply_id');
    }


    public function markAsBestReply(Reply $reply)
    {

        $this->update([

            'reply_id' => $reply->id

        ]);
    }

}
