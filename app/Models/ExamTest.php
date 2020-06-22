<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ExamTest extends Model
{
    protected $guarded=['id'];

    public function questions(){
        return $this->hasMany(TestQuestion::class);
    }

    public function examPack(){
        return $this->belongsTo(ExamPack::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
