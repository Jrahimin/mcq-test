<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded=['id'];

    public function questions(){
        return $this->hasMany(TestQuestion::class);
    }
}
