<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded=['id'];

    public function question(){
        return $this->belongsTo(TestQuestion::class);
    }

    public function scopeCorrectAnswer($query){
        return $query-where('is_correct', 1);
    }
}
