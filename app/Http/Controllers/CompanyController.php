<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = session('feedback');
        $company = Company::where("user_id", Auth::user()->id)->get()->last();

        return view('pages.company', compact(['feedback', 'company']));
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
        $feedback = null;
        try {
            $validate = $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required',
                'alamat' => 'required'
            ]);
            // Lakukan tindakan jika validasi berhasil
            Company::create($validate);
            $feedback[0] = "Insert data Berhasil";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/company')->with('feedback', $feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = null;
        try {
            $validate = $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required',
                'alamat' => 'required'
            ]);
            // Lakukan tindakan jika validasi berhasil
            Company::where('id', $id)->update($validate);
            $feedback[0] = "Update data Berhasil";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/company')->with('feedback', $feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = null;
        try {
            // Lakukan tindakan jika validasi berhasil
            Company::where('id', $id)->update([
                'nama' => "",
                'email' => "",
                'no_hp' => 0,
                'alamat' => ""
            ]);
            $feedback[0] = "Kosongkan data Berhasil";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/company')->with('feedback', $feedback);
    }
}
