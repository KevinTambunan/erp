<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\ErpRespon;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ErpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $erp = Erp::where('id', $id)->get()->last();
        $erps = Erp::all();
        return view('pages.erp', compact(['erp', 'erps']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function erp_history()
    {
        $erps = User::find(Auth::user()->id)->result;
        $odoo = 0;
        $dolibar = 0;
        $sap = 0;
        foreach($erps as $erp){
            if($erp->erp_id == 1){
                $odoo += 1;
            }else if($erp->erp_id == 2){
                $dolibar += 1;
            }else if($erp->erp_id == 3){
                $sap += 1;
            }
        }

        return view('pages.erp-history', compact(['erps', 'odoo', 'dolibar', 'sap']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function erp_recomendation()
    {
        return view('pages.erp-recomendation');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function respon(Request $request)
    {
        $odoo = 0;
        $dolibar = 0;
        $sap = 0;
        for($i=1; $i<=count($request->request); $i++){
            if($request->$i == 'odoo'){
                $odoo += 1;
            }else if($request->$i == 'dolibar'){
                $dolibar += 1;
            }else if($request->$i == 'sap'){
                $sap += 1;
            }
        }

        $erp_odoo = Erp::find(1);
        $erp_dolibar = Erp::find(2);
        $erp_sap = Erp::find(3);

        return view('pages.result', compact(['odoo', 'dolibar', 'sap', 'erp_odoo', 'erp_dolibar', 'erp_sap']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function erp_usage()
    {
        $erps = ErpRespon::all();
        $odoo = 0;
        $dolibar = 0;
        $sap = 0;
        foreach($erps as $erp){
            if($erp->erp_id == 1){
                $odoo += 1;
            }else if($erp->erp_id == 2){
                $dolibar += 1;
            }else if($erp->erp_id == 3){
                $sap += 1;
            }
        }

        $erp_odoo = Erp::find(1);
        $erp_dolibar = Erp::find(2);
        $erp_sap = Erp::find(3);

        return view('pages.erp-usage', compact(['odoo', 'dolibar', 'sap', 'erp_odoo', 'erp_dolibar', 'erp_sap']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result($id, $odoo, $dolibar, $sap)
    {
        $link = Erp::where('id', $id)->get()->last();
        $date = Carbon::now()->format('Y-m-d');
        ErpRespon::insert([
            'user_id' => Auth::user()->id,
            'erp_id' => $id,
            'odoo' => $odoo,
            'dolibar' => $dolibar,
            'sap' => $sap,
            'created_at' => $date
        ]);

        return redirect($link->link);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function show(Erp $erp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function edit(Erp $erp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Erp $erp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Erp $erp)
    {
        //
    }
}
