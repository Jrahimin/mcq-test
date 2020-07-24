<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'user-profile';
        $this->data['path']  = 'User-Profile';
        $this->data['title'] = 'User Profile';
    }

    public function getUserInfo(Request $request)
    {
        $user = $request->user();
        $user->totalPaid = $user->payments()->where('status', 1)->sum('amount');
        $user->userTotalExam = $user->examTest()->count();
        $user->userTotalExamPack = $user->examPack()->count();

        $data['userInfo'] = $user;

        return view('frontend.user-profile', $data);
    }
}
