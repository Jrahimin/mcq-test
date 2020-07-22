<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ExamTestResource;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $this->validate($request,[
            'exam_id' => 'required'
        ]);

        try{
            $exam = ExamTest::find($request->exam_id);
            $data = $this->data;
            $data['exam_test_id'] = $request->exam_id;

            if(!$request->wantsJson()){
                return view('frontend.mcq-test', $data);
            }
            $query = $exam->questions()->with('activeAnswers')->where('status', 1);
            if($request->subject_id){
                $query = $query->where('subject_id', $request->subject_id);
            }

            $questionList = $query->get();

            $questionPaper = [];
            $questionPaper['examInfo'] = array(
                'title' => $exam->title,
                'duration_sec' => $exam->duration_minutes*60,
                'mark_per_question' => $exam->mark_per_question,
                'question_count' => count($questionList)
            );
            foreach ($questionList as $question)
            {
                $optionList = [];
                foreach ($question->activeAnswers as $option)
                {
                    $optionList[] = array(
                        'option'     => $option->answer,
                        'option_id'  => $option->id
                    );
                }

                $questionPaper['questionList'][] = array(
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

    public function submit(Request $request)
    {
        try{
            $exam = ExamTest::findOrFail($request->exam_id);

            $questions = $exam->questions()->where('status', 1)
                ->with('activeAnswers')->get();

            // Generate AnswerList -- Format --> list['question_id' => correctAnswerId]
            $answerList = [];
            foreach ($questions as $question)
            {
                $correctAnswer = $question->activeAnswers->where('is_correct', 1)->first();
                $answerList[$question->id] = $correctAnswer->id;
            }

            Log::info("exam answer list : ".json_encode($answerList));

            // Generate User provided AnswerList -- Format --> list['question_id' => userGivenAnswerId]
            $userAnswerList = [];
            $totalMark = count($questions);
            $attainedMark = 0;
            $noOfCorrectAnswer = 0;
            $noOfWrongAnswer = 0;
            foreach ($request->answers as $answer)
            {
                $userAnswerList[$answer['question_id']] = $answer['option_id'];

                if($answerList[$answer['question_id']] == $answer['option_id']){    //if answerList correctAns matches user provided option_id -- mark++
                    $attainedMark++;
                    $noOfCorrectAnswer++;
                } else{
                    $attainedMark -= $exam->negative_mark_per_question;
                    $noOfWrongAnswer++;
                }
            }

            Log::info("user provided answer list : ".json_encode($userAnswerList));

            // Generate preview of exam paper
            $examPaperReview = [];
            $examPaperReview['examInfo'] = array(
                'title' => $exam->title,
                'duration_sec' => $exam->duration_minutes*60,
                'mark_per_question' => $exam->mark_per_question,
                'question_count' => $totalMark,
                'total_mark' => $totalMark,
                'user_mark'  => $attainedMark,
                'correct_answer_count' => $noOfCorrectAnswer,
                'wrong_answer_count' => $noOfWrongAnswer
            );

            foreach ($questions as $question)
            {
                $optionList = [];
                foreach ($question->activeAnswers as $option)
                {
                    $optionList[] = array(
                        'option'     => $option->answer,
                        'option_id'  => $option->id
                    );
                }

                $examPaperReview['questionList'][] = array(
                    'question'          => $question->title,
                    'question_id'       => $question->id,
                    'mark'              => $question->mark,
                    'description'       => $question->description,
                    'user_option_id'    => array_key_exists($question->id, $userAnswerList) ? $userAnswerList[$question->id] : null,
                    'correct_option_id' => $answerList[$question->id],

                    'options' => $optionList
                );
            }

            Log::info("Exam paper review : ".json_encode($examPaperReview));

            DB::table('exam_test_user')->where('user_id', $request->user()->id)->where('exam_test_id', $exam->id)
                ->update(['score' => $attainedMark, 'total_correct' => $attainedMark, 'total_wrong' => $totalMark - $attainedMark]);

            return $this->successResponse('Exam result preview', $examPaperReview);
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            abort(500);
        }
    }
}
