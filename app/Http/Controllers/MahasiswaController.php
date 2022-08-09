<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(5);
        return view('Mahasiswa.index', compact(
            'mahasiswas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = new Mahasiswa;
        return view('Mahasiswa.create', compact(
            'mahasiswa'
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
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->email = $request->email;
        $mahasiswa->umur = $request->umur;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_tlp = $request->no_tlp;
        $mahasiswa->semester = $request->semester;
        $mahasiswa->save();
        return redirect('mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $mahasiswa = Mahasiswa::find($id);
       return view('Mahasiswa.show', compact(
        'mahasiswa'
       ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('Mahasiswa.edit', compact(
            'mahasiswa'
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
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->email = $request->email;
        $mahasiswa->umur = $request->umur;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_tlp = $request->no_tlp;
        $mahasiswa->semester = $request->semester;
        $mahasiswa->save();
        return redirect('mahasiswa')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return redirect('mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
