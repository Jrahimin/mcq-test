<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ExamTestResource;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserMcqTestController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'user-exam';
        $this->data['path'] = 'user-exam';
        $this->data['title'] = 'MCQ Test';
    }

    public function generateExamQuestion(Request $request)
    {
        try{
            $exam = ExamTest::findOrFail($request->exam_id);
            $data = $this->data;
            $data['exam_test_id'] = $request->exam_id;
            if($request->wantsJson()){
                return view('frontend.mcq-test', $data);
            }

            $query = $exam->questions()->with('answers')->where('status', 1);
            if($request->subject_id){
                $query = $query->where('subject_id', $request->subject_id);
            }

            $questionList = $query->get();

            $questionPaper = [];
            foreach ($questionList as $question)
            {
                $optionList = [];
                foreach ($question->activeAnswers as $option)
                {
                    $optionList[] = array(
                        'option'     => $option->answer,
                        'option_id'  => $option->id,
                        'is_correct' => $option->is_correct
                    );
                }

                $questionPaper[] = array(
                    'question'    => $question->title,
                    'question_id' => $question->id,
                    'mark'        => $question->mark,
                    'description' => $question->description,

                    'options' => $optionList
                );
            }

            return $this->successResponse('Question paper fetched', $questionPaper);
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }
}
