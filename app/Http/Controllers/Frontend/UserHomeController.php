<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamCategory;
use App\Models\ExamPack;
use App\Models\ExamTest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today()->format('Y-m-d');

        $data['slider_enable'] = true;
        $data['title'] = 'Home';
        $data['packages'] = ExamPack::where('status', 1)->latest()->limit(3)->get();
        $data['exams'] = ExamTest::where('status', 1)->whereDate('exam_schedule', '>=', $today)->latest()->limit(5)->get();
        $data['categories'] = ExamCategory::where('status', 1)->get();

        return view('frontend.home', $data);
    }
}
