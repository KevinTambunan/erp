<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Question;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function feedback_user(){
        $feedbacks = Feedback::all();
        return view('feedback', compact(['feedbacks']));
    }
    public function faq_user(){
        $questions = Question::all();
        return view('faq', compact(['questions']));
    }
}
