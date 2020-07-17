<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaymentInfo;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserPaymentController extends Controller
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
            $data = $this->data;
            $data['payment_types'] = ['bkash' => 'bKash', 'rocket' => 'Rocket', 'nagad' => 'Nagad'];
            return view('frontend.make-payment', $data);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void | \Illuminate\Http\RedirectResponse
     */
    public function paymentSubmit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'payment_channel' => 'required|in:bkash,rocket,nagad',
                    'amount' => 'required|integer',
                    'transaction_code' => 'required|string',
                ]
            );
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }
            $paymentInfo = PaymentInfo::create([
                'user_id' => auth()->user()->id,
                'transaction_code' => $request->transaction_code,
                'amount' => $request->amount,
                'payment_channel' => $request->payment_channel,
            ]);
            if ($paymentInfo)
                return redirect()->back()->with('success_message', 'Your Payment Request Received');
                return redirect()->back()->with('error_message', 'Your payment request fail!, Please try again');

        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return abort(500);
        }
    }
}
