<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestQuestionRequest;
use App\Http\Resources\Admin\TestQuestionResource;
use App\Imports\QuestionImport;
use App\Models\Answer;
use App\Models\TestQuestion;
use App\Traits\ApiResponseTrait;
use App\Traits\QueryTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class TestQuestionController extends Controller
{
    use ApiResponseTrait, QueryTrait;

    protected $exceptionMessage;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return view('admin.excel', ['title' => 'Exam Test', 'path' => ['Test-Question'], 'route' => 'test-question']);
        try {

            if ($request->ajax()) {
                $testQuestions = TestQuestion::with('answers')->get();
                return Datatables::of(TestQuestionResource::collection($testQuestions))->make(true);
            }
            $testQuestions = TestQuestion::select('title', 'id')->where('status', 1)->get();
            return view('admin.test-question', ['testQuestions' => $testQuestions, 'title' => 'Exam Test', 'path' => ['Test-Question'], 'route' => 'test-question']);

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
    public function store(Request $request)
    {
        try {
            $testQuestion = TestQuestion::create([
                'exam_test_id' => $request->exam_test_id,
                'title' => $request->title,
                'description' => $request->description,
                'attachment_url' => $request->attachment_url,
                'mark' => $request->mark,
                'status' => $request->status,
            ]);
            $testQuestion = $testQuestion->answers->saveMany($request->answers->map(function ($answer) use ($testQuestion) {
                //@todo image process
                return new Answer([
                    'question_id' => $testQuestion->id,
                    'answer' => $answer->answer,
                    'image_url' => $answer->image_url,
                    'description' => $answer->description,
                    'is_correct' => $answer->is_correct,
                    'status' => $answer->status,
                ]);
            }));
            if ($testQuestion)
                return $this->successResponse('Exam test updated successfully', collect(new TestQuestionResource($testQuestion)));
            return $this->invalidResponse($this->exceptionMessage);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    public function importQuestionFromExcel()
    {
        Excel::import(new QuestionImport(), request()->file('image'));
        return view('admin.excel');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function update(TestQuestionRequest $request, TestQuestion $testQuestion)
    {
        try {
            $testQuestion = $testQuestion->update([
                'exam_test_id' => $request->exam_test_id,
                'title' => $request->title,
                'description' => $request->description,
                'attachment_url' => $request->attachment_url,
                'mark' => $request->mark,
                'status' => $request->status,
            ]);
            $isUpdated = $testQuestion->answers->saveMany($request->answers->map(function ($answer) use ($testQuestion) {
                //@todo image process
                return new Answer([
                    'question_id' => $testQuestion->id,
                    'answer' => $answer->answer,
                    'image_url' => $answer->image_url,
                    'description' => $answer->description,
                    'is_correct' => $answer->is_correct,
                    'status' => $answer->status,
                ]);
            }));
            if ($isUpdated)
                return $this->successResponse('Exam test updated successfully', collect(new TestQuestionResource($testQuestion)));
            return $this->invalidResponse($this->exceptionMessage);
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
    public function destroy($id)
    {
        try {
            $testQuestion = TestQuestion::find($id);
            $testQuestion = $testQuestion->delete();
            $testQuestion = $testQuestion->answers->delete();
            if ($testQuestion) return $this->successResponse('Exam test deleted successfully', null);
            return $this->invalidResponse($this->exceptionMessage);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    protected function filterData(Request $request, $query)
    {
        $query = $this->whereQueryFilter($request, $query, ['title', 'type', 'status']);
        $query = $this->filterDateBetween($request, $query, 'exam_schedule');

        return $query;
    }

}
