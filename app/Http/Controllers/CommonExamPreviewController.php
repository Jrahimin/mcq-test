<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommonExamPreviewController extends Controller
{
    public function generateExamPreview(Request $request)
    {
        try {
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
            abort(500);
        }
    }
}