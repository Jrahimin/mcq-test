<?php

namespace App\Models;

use App\Enums\ExamTypes;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExamTest extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['totalMark', 'examTimeFrom', 'examTimeTo', 'typeName', 'examScheduleDateFrom', 'examScheduleDateTo'];

    public function questions()
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function examPack()
    {
        return $this->belongsTo(ExamPack::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('score', 'total_correct', 'total_wrong');
    }

    public function category(){
        return $this->belongsTo(ExamCategory::class);
    }

    public function getExamTimeFromAttribute()
    {
        return Carbon::parse($this->exam_schedule)->format('h:i A');
    }

    public function getExamScheduleDateFromAttribute()
    {
        if (!$this->exam_schedule)
            return "";

        return Carbon::parse($this->exam_schedule)->format('M d, Y');
    }

    public function getExamScheduleDateToAttribute()
    {
        if (!$this->exam_schedule_to)
            return "";

        return Carbon::parse($this->exam_schedule_to)->format('M d, Y');
    }

    public function getExamTimeToAttribute()
    {
        if (!$this->duration_minutes)
            return "";

        return Carbon::parse($this->exam_schedule_to)->format('h:i A');
    }

    public function getTotalMarkAttribute()
    {
        $noOfQuestions = $this->questions()->count();
        $markPerQuestion = $this->mark_per_question;

        $totalMark = $noOfQuestions * $markPerQuestion;

        return $totalMark;
    }

    public function getTypeNameAttribute()
    {
        $exam_type_name = [ExamTypes::MODELTEST => 'Model Test', ExamTypes::MOCKTEST => 'Mock Test', ExamTypes::MINITEST => 'Mini Test'];
        return $exam_type_name[$this->type];
    }
}
