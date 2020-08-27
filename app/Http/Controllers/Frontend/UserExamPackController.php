<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamPackStoreRequest;
use App\Models\ExamPack;
use App\Traits\ApiResponseTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserExamPackController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'exam-pack';
        $this->data['path'] = 'Exam-Pack';
        $this->data['title'] = 'Exam Pack';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            if ($request->wantsJson()) {
                $examPacks = ExamPack::latest()->get();
                return Datatables::of($examPacks)->make(true);
            }
            $data = $this->data;
            $data['examPacks'] = ExamPack::where('status', 1)->when($request->search, function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('price', 'like', "%{$request->search}%")
                    ->orWhere('from_date', 'like', "%{$request->search}%")
                    ->orWhere('to_date', 'like', "%{$request->search}%");
            })->latest()->paginate(10);

            return view('frontend.packages', $data);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void | \Illuminate\Http\RedirectResponse
     */
    public function buyPackage(Request $request)
    {
        $this->validate($request, [
            'exam_pack_id' => 'required|integer'
        ]);
        try {
            $examPack = ExamPack::findOrFail($request->exam_pack_id);
            $user = $request->user();

            $isTaken = DB::table('exam_pack_user')->where(['user_id' => $user->id, 'exam_pack_id' => $request->exam_pack_id])->first();
            if ($isTaken) {
                return redirect()->back()->with('error_message', 'You have already bought this pack');
            }

            if ($user->balance < $examPack->price) {
                return redirect()->back()->with('error_message', 'Your balance is low! Please try again after recharge');
            }

            DB::beginTransaction();

            $user->decrement('balance', $examPack->price);

            $user->examPack()->attach($request->exam_pack_id, [
                'enrolment_price' => $examPack->price,
                'enrolment_date' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $user->examTest()->saveMany($examPack->examTests);
            $exam_test_ids = $examPack->examTests->pluck('id')->toArray();
            DB::table('exam_test_user')
                ->whereIn('exam_test_id', $exam_test_ids)
                ->where('user_id', $user->id)
                ->update([
                    'enrolment_price' => $examPack->price,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function detail(Request $request, int $id)
    {
        try {
            $examPack = ExamPack::findOrFail($id);
            return view('frontend.package', ['exam_pack' => $examPack]);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            abort(404);
        }
    }
}
