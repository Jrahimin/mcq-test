<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
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
        $this->data['path']  = 'User-Profile';
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
        try{
            $user = $request->user();

            if($request->is_participated){
                $examForAllUsers = DB::table('exam_test_user')->where('status', 1)->get();

                $userExams = $user->examTest()->where('exam_test_user.status', 1)->get()->map(function ($exam) use ($user, $examForAllUsers){
                    $userExam = $examForAllUsers->where('exam_test_id', $exam->id)->where('user_id', $user->id)->first();
                    $scoreAboveCount = $examForAllUsers->where('exam_test_id', $exam->id)->where('score', '>', $userExam->score)->count();
                    $exam->position = ++$scoreAboveCount;

                    return $exam;
                });
            } else{
                $userExams = $user->examTest;
            }

            return $this->successResponse('User exams fetched', $userExams);
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return $this->exceptionResponse($this->exceptionMessage);
        }
    }
}
