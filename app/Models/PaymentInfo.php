<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function approvedBy(){
        return $this->belongsTo(User::class);
    }
}
