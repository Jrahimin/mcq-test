<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
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

    public function getExamTimeFromAttribute(){
        return Carbon::parse($this->exam_schedule)->format('H:i A');
    }

    public function getExamTimeToAttribute(){
        if(!$this->duration_minutes)
            return "";

        return Carbon::parse($this->exam_schedule)->addMinutes($this->duration_minutes)->format('H:i A');
    }

    public function getTotalMarkAttribute(){
        $noOfQuestions = $this->questions()->count();
        $markPerQuestion = $this->mark_per_question;

        $totalMark = $noOfQuestions*$markPerQuestion;

        return $totalMark;
    }
}
