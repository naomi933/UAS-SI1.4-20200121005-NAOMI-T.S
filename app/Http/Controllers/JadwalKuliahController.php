<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use App\Models\Matakuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();
        $jadwal = JadwalKuliah::with('matakuliah')->paginate(10);
        return view('jadwal.index', compact(
            'jadwal', 'matakuliah'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = new JadwalKuliah;
        $matakuliah = Matakuliah::all();
        return view('jadwal.create', compact(
            'jadwal', 'matakuliah'
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
        $jadwal = new JadwalKuliah;
        $jadwal->matakuliah_id = $request->matakuliah_id;
        $jadwal->jadwal = $request->jadwal;
        $jadwal->save();
        return redirect('jadwal')->with('success', 'Jadwal Berhasil Dibuat');
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
        $matakuliah = Matakuliah::all();
        $dtJadwal = JadwalKuliah::find($id);
        return view('jadwal.edit', compact(
            'dtJadwal', 'matakuliah'
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
        $jadwal = JadwalKuliah::find($id);
        $jadwal->matakuliah_id = $request->matakuliah_id;
        $jadwal->jadwal = $request->jadwal;
        $jadwal->save();
        return redirect('jadwal')->with('success', 'Jadwal Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = JadwalKuliah::find($id);
        $jadwal->delete();
        return redirect('jadwal')->with('success', 'Data Berhasil Dihapus');
    }
}
