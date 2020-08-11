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
                $query = $this->filterData($request, PaymentInfo::query());
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
            $paymentInfo = PaymentInfo::findOrFail($id);
            $user = User::findOrFail($paymentInfo->user_id);

            if($paymentInfo->status)
                return $this->invalidResponse('Already updated this transaction');

            $amount = $request->amount ?? $paymentInfo->amount;

            DB::beginTransaction();

            $paymentInfo->update([
                'status' => true,
                'approved_by_id' => auth()->user()->id,
                'amount' => $amount
            ]);

            $user->increment('balance', $amount);

            DB::commit();

            return $this->successResponse('Payment Status updated successfully', collect(new PaymentInfoResource($paymentInfo)));
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
