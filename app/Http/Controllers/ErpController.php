<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\ErpRespon;
use App\Models\Modul;
use App\Models\Skalabilitas;
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
        foreach ($erps as $erp) {
            if ($erp->erp_id == 1) {
                $odoo += 1;
            } else if ($erp->erp_id == 2) {
                $dolibar += 1;
            } else if ($erp->erp_id == 3) {
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

        // cehckbox pertanyaan 9
        $odooSembilan = 0;
        $dolibarSembilan = 0;
        $sapSembilan = 0;
        $pertanyaan9 = $request->only(['91', '92', '93', '94', '94', '95', '96', '97']);
        $skalabilitas = Skalabilitas::all();
        $sembilan = [];
        $b = 0;
        for ($i = 91; $i < 97; $i++) {
            if (array_key_exists($i, $pertanyaan9)) {
                $sembilan[$b] = $pertanyaan9[$i];
                $b++;
            }
        }
        for ($j = 0; $j < $b; $j++) {
            foreach ($skalabilitas as $item) {
                if ($item->deskripsi == $sembilan[$j]) {
                    if ($item->erp_id == 1) {
                        $odooSembilan++;
                    }

                    if ($item->erp_id == 2) {
                        $dolibarSembilan++;
                    }

                    if ($item->erp_id == 3) {
                        $sapSembilan++;
                    }
                }
            }
        }
        $max = max($dolibarSembilan, $odooSembilan, $sapSembilan);
        if ($max == $dolibarSembilan) {
            $odoo += 1;
        } else if ($max == $odooSembilan) {
            $dolibar += 1;
        } else if ($max == $sapSembilan) {
            $sap += 1;
        }

        $odooSepuluh = 0;
        $dolibarSepuluh = 0;
        $sapSepuluh = 0;


        $pertanyaan10 = $request->only(['101', '102', '103', '104', '104', '105', '106', '107', '108', '109', '110', '111']);
        $sepuluh = [];
        $a = 0;
        for ($i = 101; $i < 111; $i++) {
            if (array_key_exists($i, $pertanyaan10)) {
                $sepuluh[$a] = $pertanyaan10[$i];
                $a++;
            }
        }
        $modul = Modul::all();
        for ($j = 0; $j < $a; $j++) {
            foreach ($modul as $item) {
                if ($item->deskripsi == $sepuluh[$j]) {
                    if ($item->erp_id == 1) {
                        $odooSepuluh++;
                    }

                    if ($item->erp_id == 2) {
                        $dolibarSepuluh++;
                    }

                    if ($item->erp_id == 3) {
                        $sapSepuluh++;
                    }
                }
            }
        }

        $max = max($dolibarSepuluh, $odooSepuluh, $sapSepuluh);
        if ($max == $dolibarSepuluh) {
            $odoo += 1;
        } else if ($max == $odooSepuluh) {
            $dolibar += 1;
        } else if ($max == $sapSepuluh) {
            $sap += 1;
        }


        for ($i = 1; $i <= 8; $i++) {
            if ($request->$i == 'odoo') {
                $odoo += 1;
            } else if ($request->$i == 'dolibar') {
                $dolibar += 1;
            } else if ($request->$i == 'sap') {
                $sap += 1;
            }
        }

        $erp_resul = 0;
        $findMax = max($odoo, $dolibar, $sap);
        if ($findMax == $odoo) {
            $erp_resul = 1;
        } else if ($findMax == $dolibar) {
            $erp_resul = 2;
        } else if ($findMax == $sap) {
            $erp_resul = 3;
        }
        $date = Carbon::now()->format('Y-m-d');
        ErpRespon::insert([
            'user_id' => Auth::user()->id,
            'erp_id' => $erp_resul,
            'odoo' => $odoo,
            'dolibar' => $dolibar,
            'sap' => $sap,
            'created_at' => $date
        ]);


        $data = Erp::find($erp_resul);

        return view('pages.result', compact(['odoo', 'dolibar', 'sap', 'data']));
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
        foreach ($erps as $erp) {
            if ($erp->erp_id == 1) {
                $odoo += 1;
            } else if ($erp->erp_id == 2) {
                $dolibar += 1;
            } else if ($erp->erp_id == 3) {
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
