<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PaymentInfoResource;
use App\Models\ExamPack;
use App\Models\PaymentInfo;
use App\Traits\ApiResponseTrait;
use App\Traits\QueryTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class PaymentInfoController extends Controller
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
                $query = $this->filterData($request, PaymentInfo::query()); //@todo need to pass the value => user_name also user_id
                $paymentInfos = $query->with(['approvedBy', 'user'])->latest()->get();
                return Datatables::of(PaymentInfoResource::collection($paymentInfos))->make(true);
            }
            $packages = ExamPack::select('title', 'id')->where('status', 1)->get();
            return view('admin.payment-info', ['packages' => $packages, 'title' => 'Payment Info', 'path' => ['Payment-Info'], 'route' => 'payment-info']);
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
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $paymentInfo = PaymentInfo::findOrFail($id);
            $paymentInfoUpdate = $paymentInfo->update([
                'status' => true,
                'approved_by_id' => auth()->user()->id
            ]);
            $user = User::findOrFail($paymentInfo->user_id);
            $balance = isset($user->balance) ? $user->balance + $paymentInfo->amount : $paymentInfo->amount;
            $user = $user->update(['balance' => $balance]);
            if ($paymentInfoUpdate && $user) {
                DB::commit();
                return $this->successResponse('Payment Status updated successfully', collect(new PaymentInfoResource($paymentInfo)));
            }
            DB::rollBack();
            return $this->invalidResponse($this->exceptionMessage);
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
