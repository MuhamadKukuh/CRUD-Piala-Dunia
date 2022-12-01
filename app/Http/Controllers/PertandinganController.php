<?php

namespace App\Http\Controllers;

use App\Models\PapanSkor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Inertia::render('RekapSekor');
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
        // $val =$request->validate([
        //     'team_a' => ['required', 'min:3'],
        //     'team_b' => ['required', 'min:3'],
        //     'skor' => ['required', 'min:3'],
        // ]);

        // dd($request->team_a);

        PapanSkor::create([
            'team_a' => $request->team_a,
            'team_b' => $request->team_b,
            'skor' => $request->skor,
            'user_id' => Auth()->User()->id
        ]);

        return redirect('/dashboard')->with('success', "Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PapanSkor::where('id', $id)->update([
            'team_a' => $request->team_a,
            'team_b' => $request->team_b,
            'skor' => $request->skor,
            'user_id' => Auth()->User()->id
        ]);

        return redirect('/dashboard')->with('success', "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PapanSkor::destroy($id);

        return redirect('/dashboard');
    }

    public function myData($id){

        $data = PapanSkor::find($id);

        return response()->json($data);
    }
}
