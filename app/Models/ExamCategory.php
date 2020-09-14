<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{
    protected $guarded=['id'];

    public function examTests(){
        return $this->hasMany(ExamTest::class,'category_id');
    }
}
