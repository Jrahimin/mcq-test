<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ExamPack extends Model
{
    protected $guarded=['id'];

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
