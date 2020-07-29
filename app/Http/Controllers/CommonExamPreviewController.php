<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommonExamPreviewController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'exam-preview';
        $this->data['path'] = 'exam-preview';
        $this->data['title'] = 'Exam Preview';
    }

    public function generateExamPreview(Request $request)
    {
        $this->validate($request, [
            'exam_id' => 'required'
        ]);

        try {
            $data = $this->data;
            $data['exam_test_id'] = $request->exam_id;
            if (!$request->wantsJson()) {
                return view('common.exam-preview', $data);
            }

            $exam = ExamTest::findOrFail($request->exam_id);
            $questions = $exam->questions()->where('status', 1)
                ->with('activeAnswers')->get();

            // Generate AnswerList -- Format --> list['question_id' => correctAnswerId]
            $answerList = [];
            foreach ($questions as $question) {
                $correctAnswer = $question->activeAnswers->where('is_correct', 1)->first();
                $answerList[$question->id] = $correctAnswer->id;
            }
            Log::info("exam answer list : " . json_encode($answerList));

            $totalMark = count($questions);

            // Generate preview of exam paper
            $examPaperReview = [];
            $examPaperReview['examInfo'] = array(
                'title' => $exam->title,
                'duration_sec' => $exam->duration_minutes * 60,
                'mark_per_question' => $exam->mark_per_question,
                'question_count' => $totalMark,
                'total_mark' => $totalMark,
            );

            foreach ($questions as $question) {
                $optionList = [];
                foreach ($question->activeAnswers as $option) {
                    $optionList[] = array(
                        'option' => $option->answer,
                        'option_id' => $option->id
                    );
                }

                $examPaperReview['questionList'][] = array(
                    'question' => $question->title,
                    'question_id' => $question->id,
                    'mark' => $question->mark,
                    'description' => $question->description,
                    'correct_option_id' => $answerList[$question->id],

                    'options' => $optionList
                );
            }

            Log::info("Exam Paper Preview : " . json_encode($examPaperReview));

            return $this->successResponse('Exam Paper Preview', $examPaperReview);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    public function getExamRanking(Request $request)
    {
        $this->validate($request, [
            'exam_id' => 'required'
        ]);

        try{
            $exam = ExamTest::findOrFail($request->exam_id);
            $examUsersRank = $exam->user()->orderBy('exam_test_user.score', 'desc')->paginate(50);

            $data['examInfo'] = $exam;
            $data['userRank'] = $examUsersRank;

            return view('common.user-rank.rank_index', $data);
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            abort(500);
        }
    }
}
