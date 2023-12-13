<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPhoto extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function room(){
        return $this->belongsTo(Room::class,'room_id', 'id');
    }

 
}
