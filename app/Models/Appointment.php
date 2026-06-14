<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Review;

class Appointment extends Model
{
   protected $fillable = [
       'user_id',
       'language',
       'date',
       'paymethod',
       'status',
    ];
    public function user(){
        $this->belongsTo(User::class);
    }
}
