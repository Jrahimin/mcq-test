<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestQuestionRequest;
use App\Http\Resources\Admin\TestQuestionResource;
use App\Imports\QuestionImport;
use App\Models\Answer;
use App\Models\ExamTest;
use App\Models\Subject;
use App\Models\TestQuestion;
use App\Traits\ApiResponseTrait;
use App\Traits\QueryTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
        try {

            if ($request->ajax()) {
                $testQuestions = TestQuestion::with('answers')->get();
                return Datatables::of(TestQuestionResource::collection($testQuestions))->make(true);
            }
            $examTests = ExamTest::select('title', 'id')->where('status', 1)->get();
            $subjects = Subject::select('name', 'id')->where('status', 1)->get();
            return view('admin.test-question', ['subjects' => $subjects, 'examTests' => $examTests, 'title' => 'Exam Test', 'path' => ['Test-Question'], 'route' => 'test-question']);

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
    public function store(TestQuestionRequest $request)
    {
        try {
            DB::beginTransaction();
            $testQuestion = TestQuestion::create([
                'exam_test_id' => $request->exam_test_id,
                'subject_id' => $request->subject_id,
                'title' => $request->title,
                'mark' => $request->mark,
                'status' => !!$request->status,
            ]);
            $answers = [];
            foreach ($request->answers as $answer) {
                $answers[] = new Answer([
                    'question_id' => $testQuestion->id,
                    'answer' => $answer['answer'],
                    'is_correct' => !!$answer['is_correct'],
                    'status' => !!$answer['status'],
                ]);
            }
            $testQuestion->answers()->saveMany($answers);
            DB::commit();
            return $this->successResponse('Exam test updated successfully', collect(new TestQuestionResource($testQuestion)));
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    public function importQuestionFromExcel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_test_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error_message', $validator->errors()->first());
        }

        try {
            $questionImport = new QuestionImport($request);
            Excel::import($questionImport, $request->file('question'));
            $excelStatus = $questionImport->excelStatus();
            return redirect()->back()->with($excelStatus['message_type'], $excelStatus['message']);
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->back()->with('error_message', 'Something went wrong! please provide a valid file format');
        }
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
            DB::beginTransaction();
            $testQuestion->update([
                'exam_test_id' => $request->exam_test_id,
                'subject_id' => $request->subject_id,
                'title' => $request->title,
                'mark' => $request->mark,
                'status' => !!$request->status,
            ]);
            $testQuestion->answers()->delete();
            $answers = [];
            foreach ($request->answers as $answer) {
                $answers[] = new Answer([
                    'question_id' => $testQuestion->id,
                    'answer' => $answer['answer'],
                    'is_correct' => !!$answer['is_correct'],
                    'status' => !!$answer['status'],
                ]);
            }
            $testQuestion->answers()->saveMany($answers);
            DB::commit();
            return $this->successResponse('Exam test updated successfully', collect(new TestQuestionResource($testQuestion)));
        } catch (\Exception $ex) {
            DB::rollBack();
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
            DB::beginTransaction();

            $testQuestion = TestQuestion::findOrFail($id);
            $testQuestion->answers()->delete();
            $testQuestion->delete();

            DB::commit();

            return $this->successResponse('Exam test deleted successfully', null);
        } catch (\Exception $ex) {
            DB::rollBack();
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
