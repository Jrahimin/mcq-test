<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamTestRequest;
use App\Http\Resources\Admin\ExamTestResource;
use App\Models\ExamCategory;
use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Traits\ApiResponseTrait;
use App\Traits\QueryTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Collection;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Yajra\DataTables\Facades\DataTables;

class ExamTestController extends Controller
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
                $query = $this->filterData($request, ExamTest::query());
                $examTests = $query->with(['examPack', 'category'])->latest()->get();
                return Datatables::of(ExamTestResource::collection($examTests))->make(true);
            }
            $packages = ExamPack::select('title', 'id')->where('status', 1)->get();
            $categories = ExamCategory::select('name', 'id')->where('status', 1)->get();
            return view('admin.exam-test', ['categories' => $categories, 'packages' => $packages, 'title' => 'Exam Test', 'path' => ['Exam-Test'], 'route' => 'exam-test']);
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
    public function store(ExamTestRequest $request)
    {
        try {
            DB::beginTransaction();

            $examTest = ExamTest::create($this->dataPrepare($request));

            // if exam pack belongs to user. new exam will be assigned to the users.
            if ($request->exam_pack_id) {
                $examPack = ExamPack::findOrFail($request->exam_pack_id);

                foreach ($examPack->user as $user) {
                    $user->examTest()->attach($examTest->id, [
                        'enrolment_price' => $examTest->price,
                        'enrolment_date' => $examTest->exam_schedule,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);
                }
            }

            DB::commit();

            if ($examTest)
                return $this->successResponse('Exam test updated successfully', collect(new ExamTestResource($examTest)));
            return $this->invalidResponse($this->exceptionMessage);
        } catch (\Exception $ex) {
            DB::rollBack();
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
    public function update(ExamTestRequest $request, ExamTest $examTest)
    {
        try {
            $isUpdated = $examTest->update($this->dataPrepare($request));
            if ($isUpdated)
                return $this->successResponse('Exam test updated successfully', collect(new ExamTestResource($examTest)));
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
            $examTest = ExamTest::find($id)->delete();
            if ($examTest) return $this->successResponse('Exam test deleted successfully', null);
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
    public function deleteExamQuestions($id)
    {
        try {
            $examTest = ExamTest::find($id);
            if ($examTest->questions()->count()<=0) return $this->invalidResponse('There is no questions associated with this exam test');
            $examTest->questions()->delete();
            if ($examTest) return $this->successResponse('Exam questions deleted successfully', null);
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

    private function dataPrepare(ExamTestRequest $request)
    {
        return [
            'exam_pack_id' => $request->exam_pack_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'exam_schedule' => Carbon::parse($request->exam_schedule)->format('Y-m-d H:i:s'),
            'exam_schedule_to' => Carbon::parse($request->exam_schedule_to)->format('Y-m-d H:i:s'),
            'duration_minutes' => $request->duration_minutes,
            'price' => $request->price,
            'mark_per_question' => $request->mark_per_question,
            'negative_mark_per_question' => $request->negative_mark_per_question,
            'pass_mark' => $request->pass_mark,
            'type' => $request->type,
            'status' => $request->status
        ];
    }
}
