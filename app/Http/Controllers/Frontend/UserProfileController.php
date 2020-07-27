<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserProfileController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'user-profile';
        $this->data['path'] = 'User-Profile';
        $this->data['title'] = 'User Profile';
    }

    public function getUserInfo(Request $request)
    {
        $data = $this->data;
        $user = $request->user();
        $user->totalPaid = $user->payments()->where('status', 1)->sum('amount');
        $user->userTotalExam = $user->examTest()->count();
        $user->userTotalExamPack = $user->examPack()->count();

        $data['userInfo'] = $user;

        return view('frontend.user-profile', $data);
    }

    public function getUserExams(Request $request)
    {
        try {
            $user = $request->user();
            if ($request->is_participated) {
                $examForAllUsers = DB::table('exam_test_user')->where('status', 1)->get();
                $userExams = $user->examTest()->where('exam_test_user.status', 1)->get()->map(function ($exam) use ($user, $examForAllUsers) {
                    $userExam = $examForAllUsers->where('exam_test_id', $exam->id)->where('user_id', $user->id)->first();
                    $scoreAboveCount = $examForAllUsers->where('exam_test_id', $exam->id)->where('score', '>', $userExam->score)->count();
                    $exam->position = ++$scoreAboveCount;
                    $exam->totalExminee = $examForAllUsers->count();
                    $exam->userScore = $exam->pivot->score;
                    $exam->exam_schedule = Carbon::parse($exam->exam_schedule)->format('Y-m-d');

                    return $exam;
                });
            } else {
                $userExams = $user->examTest()->where('exam_schedule','>=',Carbon::now()->format('Y-m-d H:i:s'))->get();
            }

            return $this->successResponse('User exams fetched', $userExams);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    public function getUserExamPack(Request $request)
    {
        try {
            $user = $request->user();

            $userExamPacks = $user->examPack;
            return $this->successResponse('User exam packs fetched', $userExamPacks);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    public function getUserScoreChartData(Request $request)
    {
        try {
            $user = $request->user();

            $userLastExams = $user->examTest()->where('exam_test_user.status', 1)->latest('exam_schedule')->limit(10)->get();

            $examTitles = [];
            $scores = [];
            $colors = [];
            foreach ($userLastExams as $exam) {
                $examTitles[] = $exam->title;
                $scores[] = $exam->pivot->score;
                $colors[] = sprintf('#%06X', mt_rand(0x000000A0, 0xFFFFFFA0));
            }

            $chartData['examTitles'] = $examTitles ? $examTitles : ['No Exam'];
            $chartData['scores'] = $scores ? $scores : [0];
            $chartData['colors'] = $colors ? $colors : [sprintf('#%06X', mt_rand(0x000000A0, 0xFFFFFFA0))];

            return $this->successResponse('chart data', $chartData);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return $this->exceptionResponse($this->exceptionMessage);
        }
    }
}
