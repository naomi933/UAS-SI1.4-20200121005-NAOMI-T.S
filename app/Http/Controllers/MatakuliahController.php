<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact(
            'matakuliah'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matakuliah = new Matakuliah;
        return view('matakuliah.create', compact(
            'matakuliah'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matakuliah = new Matakuliah;
        $matakuliah->matakuliah = $request->matakuliah;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();
        return redirect('matakuliah')->with('success', 'Data Berhasil Ditambahkan');
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
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.edit', compact(
            'matakuliah'
        ));
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
        $matakuliah = Matakuliah::find($id);
        $matakuliah->matakuliah = $request->matakuliah;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();
        return redirect('matakuliah')->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matakuliah = Matakuliah::find($id);
        $matakuliah->delete();
        return redirect('matakuliah')->with('success', 'Data Berhasil Dihapus');
    }
}
