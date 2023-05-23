<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\ErpRespon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Auth::user()->owner->foto);
        $erps = Erp::all();
        $erps_result = ErpRespon::where('user_id', Auth::user()->id)->take(5)->get();
        // dd($erps_result);
        return view('home', compact(['erps', 'erps_result']));
    }


    public function feedback_user(){
        return view('feedback');
    }
}
