<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ExamTestResource;
use App\Http\Resources\Admin\FeedbackInfoResource;
use App\Models\ExamPack;
use App\Models\Feedback;
use App\Models\FeedbackInfo;
use App\Traits\ApiResponseTrait;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class FeedbackController extends Controller
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
                $query = $this->filterData($request, Feedback::query());
                $feedbackInfos = $query->latest()->get();
                return Datatables::of($feedbackInfos)->make(true);
            }
            return view('admin.feedback', ['title' => 'Feedback Info', 'path' => ['Feedback-Info'], 'route' => 'feedback-info']);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'title' => 'required|string',
                'message' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error_message', $validator->errors()->first())->withInput();
            }
            Feedback::create([
                'name' => auth()->user()->name ?? $request->name,
                'mobile_no' => auth()->user()->mobile_no ?? $request->mobile_no,
                'email' => auth()->user()->email ?? $request->email,
                'title' => $request->title,
                'message' => $request->message,
            ]);
            return redirect()->route('user-home')->with('success_message', 'Thank you for contact with us');
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->back()->with('error_message', 'Something went wrong. Please provide the valid data')->withInput();
        }
    }

    public function readStatusUpdate(Request $request, int $id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
                $feedback->update([
                'is_read' => true,
            ]);
            return $this->successResponse('Feedback status Updated successfully', $feedback);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->invalidResponse('Something went wrong! Feedback status did not Update');
        }
    }

    protected function filterData(Request $request, $query)
    {
        $query = $this->whereQueryFilter($request, $query, ['title', 'type', 'status']);
        $query = $this->filterDateBetween($request, $query, 'exam_schedule');

        return $query;
    }
}
