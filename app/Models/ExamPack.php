<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExamPack extends Model
{
    protected $guarded=['id'];
    protected $appends = ['dateFrom', 'dateTo'];

    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function examTests(){
        return $this->hasMany(ExamTest::class);
    }
    public function getDateFromAttribute(){
        return Carbon::parse($this->from_date)->format('M d, Y');
    }
    public function getDateToAttribute(){

        return Carbon::parse($this->to_date)->format('M d, Y');
    }
}
