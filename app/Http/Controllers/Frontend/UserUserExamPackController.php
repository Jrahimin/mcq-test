<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamPackStoreRequest;
use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            $data['examTests'] = ExamTest::select('title', 'id')->where('status', 1)->get();
            return view('admin.exam-pack', $data);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function store(ExamPackStoreRequest $request)
    {
        try {
            $examPack = ExamPack::create($this->generateData($request));

            return $this->successResponse('Exam pack stored successfully', $examPack);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ExamPack $examPack)
    {
        try {
            $examPack->update($this->generateData($request));

            return $this->successResponse('Exam pack stored successfully', $examPack);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function destroy(ExamPack $examPack)
    {
        try {
            $examPack->delete();
            return $this->successResponse('Exam test deleted successfully', null);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    protected function generateData(Request $request)
    {
        return [
            'title' => $request->title,
            'mini_test_count' => $request->mini_test_count,
            'mock_test_count' => $request->mock_test_count,
            'model_test_count' => $request->model_test_count,
            'price' => $request->price,
            'from_date' => $request->from_date?Carbon::parse($request->from_date)->format('Y-m-d H:i:s'):'',
            'to_date' => $request->to_date?Carbon::parse($request->to_date)->format('Y-m-d H:i:s'):'',
            'status' => $request->status,
        ];
    }
}
