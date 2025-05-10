<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
       protected $fillable = ['first_name', 'middle_name', 'last_name','address','household_id','barangay_id','reservation_id'];

    public function Reservation(){
        return $this->belongsTo(Reservation::class);
    }
}

