<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OwnerController extends Controller
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
        $owner = Owner::where("user_id", Auth::user()->id)->get()->last();
        return view('pages.owner', compact(['feedback', 'company', 'owner']));
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
                'name' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required',
                'age' => 'required',
                'education' => 'required',
                'employment_history' => 'required',
                'position' => 'required',
                'foto' => 'required',
            ]);
            // Lakukan tindakan jika validasi berhasil
            $product_image = $request->file('foto');
            $gambar = $product_image->getClientOriginalName();
            $tujuan_upload = './assets/image';
            $product_image->move($tujuan_upload, $gambar);
            Owner::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'age' => $request->age,
                'education' => $request->education,
                'employment_history' => $request->employment_history,
                'position' => $request->position,
                'foto' => $gambar,
            ]);
            $feedback[0] = "Insert data Berhasil";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/owner')->with('feedback', $feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = null;
        try {
            $validate = $request->validate([
                'user_id' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required',
                'age' => 'required',
                'education' => 'required',
                'employment_history' => 'required',
                'position' => 'required',
            ]);
            // Lakukan tindakan jika validasi berhasil
            Owner::where('id', $id)->update($validate);
            $feedback[0] = "Update data Berhasil";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/owner')->with('feedback', $feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = null;
        try {
            Owner::where("id", $id)->update([
                'name' => "",
                'gender' => "",
                'address' => "",
                'email' => "",
                'no_hp' => 0,
                'age' => 0,
                'education' => "",
                'employment_history' => "",
                'position' => "",
            ]);
            $feedback[0] = "Kosongkan data Berhasil";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/owner')->with('feedback', $feedback);
    }
}
