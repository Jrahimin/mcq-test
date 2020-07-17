<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
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
            $data = $this->data;
            $data['examList'] = ExamTest::where('status', 1)->when($request->search, function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('price', $request->search)
                    ->orWhereDate('from_date', 'like', $request->search)
                    ->orWhereDate('to_date', $request->search);
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

        try {
            $examPack = ExamTest::findOrFail($request->id);
            if(!$examPack)
                if(auth()->user()->balance && auth()->user()->balance >= $examPack->price){
                    return redirect()->back()->withError('');
                }else{
                    return redirect()->back()->withSuccess('');
                }
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return abort(403);
        }
    }
}
