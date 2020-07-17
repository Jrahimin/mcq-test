<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExamPack extends Model
{
    protected $guarded=['id'];

    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function getDateFormAttribute(){
        return Carbon::parse($this->from_date)->format('M d, Y');
    }
    public function getDateToAttribute(){

        return Carbon::parse($this->to_date)->format('M d, Y');
    }
}
