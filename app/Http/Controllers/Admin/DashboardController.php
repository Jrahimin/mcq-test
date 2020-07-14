<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Models\PaymentInfo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $sevenDaysBefore = Carbon::now()->subDays(7)->format('Y-m-d');

        $data['userCountTotal'] = User::where('type', UserTypes::USER)->where('status', 1)->count();
        $data['userCountToday'] = User::whereDate('created_at', $today)->where('type', UserTypes::USER)->where('status', 1)->count();
        $data['waitingUserCountTotal'] = User::where('type', UserTypes::USER)->where('status', 0)->count();

        $data['examPackCount'] = ExamPack::where('status', 1)->count(); //bankAccounts
        $data['examCount']     = ExamTest::where('status', 1)->count(); //cardAccounts

        $data['totalPayment'] = PaymentInfo::where('status', 1)->sum('amount'); //trxCountTotal
        $data['waitPaymentApproval'] = PaymentInfo::where('status', 0)->count(); //trxAmountTotal


        return view('admin.dashboard', $data);
    }
}
