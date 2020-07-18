<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserExamScheduleController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'exam-schedule';
        $this->data['path'] = 'Exam-Schedule';
        $this->data['title'] = 'Exam Schedule';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            //dd($request->all());
            $data = $this->data;
            $data['examPackTitle'] = null;

            $query = ExamTest::where('status', 1);
            if($request->filled('exam_pack_id')){
                $query = $query->where('exam_pack_id', $request->exam_pack_id);
                $data['examPackTitle'] = ExamPack::findOrFail($request->exam_pack_id)->title;
            }

            $data['examList'] = $query->when($request->search, function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('price', $request->search)
                    ->orWhereDate('exam_schedule', $request->search);
            })->paginate(10);

            return view('frontend.exam-schedule.index', $data);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buyExam(Request $request)
    {
        $this->validate($request,[
            'exam_id' => 'required|integer'
        ]);

        try {
            $exam = ExamTest::findOrFail($request->exam_id);
            $user = $request->user();

            $isTaken = DB::table('exam_test_user')->where(['user_id' => $user->id, 'exam_test_id' => $request->exam_id])->first();
            if($isTaken){
                return redirect()->back()->with('error_message', 'You have already bought this exam');
            }

            if($user->balance < $exam->price){
                return redirect()->back()->with('error_message', 'Your balance is low! Please try again after recharge');
            }

            DB::beginTransaction();

            $user->decrement('balance', $exam->price);

            $user->examTest()->attach($request->exam_id, [
                'enrolment_price' => $exam->price,
                'enrolment_date' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::commit();

            return redirect()->back()->with('success_message', 'Your request successfully processed');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return abort(500);
        }
    }
}
