<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Models\PaymentInfo;
use App\Traits\ApiResponseTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";
    }

    public function index(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');

        $data['userCountTotal']      = User::where('type', UserTypes::USER)->where('status', 1)->count();
        $data['userCountToday']      = User::whereDate('created_at', $today)->where('type', UserTypes::USER)->where('status', 1)->count();
        $data['waitPaymentApproval'] = PaymentInfo::where('status', 0)->count();

        $data['examPackCount'] = ExamPack::where('status', 1)->count();
        $data['examCount']     = ExamTest::where('status', 1)->count();
        $data['totalPayment']  = PaymentInfo::where('status', 1)->sum('amount');

        return view('admin.dashboard', $data);
    }

    public function getPaymentChartData()
    {
        try{
            $todayInit = Carbon::now()->subDays(6)->format('Y-m-d').' 00:00:00';
            $todayEnd = Carbon::now()->format('Y-m-d').' 23:59:59';

            $paymentData = PaymentInfo::whereBetween('created_at', [$todayInit, $todayEnd])->where('status', 1)->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            });

            $dates = [];
            $amounts = [];
            $colors = [];
            foreach ($paymentData as $date=>$payment)
            {
                $dates[] = $date;
                $amounts[] = $payment->sum('amount');
                $colors[] = sprintf('#%06X', mt_rand(0x000000A0, 0xFFFFFFA0));
            }

            $chartData['dates'] = $dates ? $dates : ['No data'];
            $chartData['amounts'] = $amounts ? $amounts : ['No data'];
            $chartData['colors'] = $colors ? $colors : [sprintf('#%06X', mt_rand(0, 0xFFFFFF))];

            return $this->successResponse('chart data', $chartData);
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return $this->exceptionResponse($this->exceptionMessage);
        }
    }
}
