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
    public function not_found(){
        return view('pages.not-found');
    }
    public function searchPage(Request $request){
        if($request->search == 'home'){
            return redirect('/home');
        }
        else if($request->search == 'profile'){
            return redirect('/profile');
        }
        else if($request->search == 'company'){
            return redirect('/company');
        }
        else if($request->search == 'owner'){
            return redirect('/owner');
        }
        else if($request->search == 'erp'){
            return redirect('/erp/1');
        }
        else if($request->search == 'odoo'){
            return redirect('/erp/1');
        }
        else if($request->search == 'dolibarr'){
            return redirect('/erp/2');
        }
        else if($request->search == 'sap'){
            return redirect('/erp/3');
        }
        else if($request->search == 'history'){
            return redirect('/erp-history');
        }
        else if($request->search == 'report'){
            return redirect('/erp-usage');
        }
        else if($request->search == 'erp recomendation'){
            return redirect('/erp-recomendation');
        }
        else if($request->search == 'faq'){
            return redirect('/faq');
        }
        else if($request->search == 'feedback'){
            return redirect('/feedback');
        }else{
            return redirect('/not-found');
        }
    }
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
