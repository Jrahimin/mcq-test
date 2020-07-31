<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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
            $data = $this->data;
            $data['examPackTitle'] = null;

            $query = ExamTest::where('status', 1);
            if($request->filled('exam_pack_id')){
                $query = $query->where('exam_pack_id', $request->exam_pack_id);
                $data['examPackTitle'] = ExamPack::findOrFail($request->exam_pack_id)->title;
            }

            $query = $query->when($request->search, function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('price', $request->search)
                    ->orWhereDate('exam_schedule', $request->search);
            });

            if($request->category_id)
                $query = $query->where('category_id', $request->category_id);
            if($request->type)
                $query = $query->where('type', $request->type);
            if($request->keyword)
                $query = $query->where('title', 'like', "%{$request->keyword}%");

            $examList = $query->orderBy(DB::raw('ABS(DATEDIFF(exam_schedule, NOW()))'))->get()->map(function ($item){
                $item->is_bought = false;
                if(auth()->check()){
                    if(auth()->user()->examTest->where('id')->first()){
                        $item->is_bought = true;
                    }
                }

                $item->is_running = false;
                $item->is_expired = false;
                $examEndTime = Carbon::parse($item->exam_schedule)->addMinutes($item->duration_minutes)->format('Y-m-d H:i').':59';
                $now = Carbon::now()->setTimezone('asia/dhaka')->format('Y-m-d H:i:s');
                if($now >= $item->exam_schedule && $now <= $examEndTime){
                    $item->is_running = true;
                }
                if($now >= $item->exam_schedule){
                    $item->is_expired = true;
                }

                return $item;
            });

            $data['examList'] = $this->paginate($examList);

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
                'enrolment_date' => $exam->exam_schedule,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::commit();

            return redirect()->back()->with('success_message', 'Your request successfully processed');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return abort(500);
        }
    }

    protected function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
