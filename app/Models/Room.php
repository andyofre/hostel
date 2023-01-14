<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    public function getHostel(){

        return $this->belongsTo('App\Models\Hostel', 'hostel_id', 'id');
    }
}
