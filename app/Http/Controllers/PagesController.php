<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Erp;
use App\Models\Feedback;
use App\Models\Owner;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function profile()
    {
        $feedback = session('feedback');
        $error = session('error');
        $owner = Owner::where("user_id", Auth::user()->id)->get()->last();
        $company = Company::where("user_id", Auth::user()->id)->get()->last();
        return view('pages.profile', compact(['feedback', 'company', 'owner', 'error']));
    }
    public function feedback_user()
    {
        $feedbacks = Feedback::all();
        return view('feedback', compact(['feedbacks']));
    }
    public function faq_user()
    {
        $questions = Question::all();
        return view('faq', compact(['questions']));
    }
    public function welcome()
    {
        $erps = Erp::all();
        return view('welcome', compact(['erps']));
    }
}
