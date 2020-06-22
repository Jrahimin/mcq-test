<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $guarded=['id'];

    public function examTest(){
        return $this->belongsTo(ExamTest::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class,'question_id');
    }
}
