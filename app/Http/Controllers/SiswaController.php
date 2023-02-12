<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        $kelases = Kelas::all();
        $spps = Spp::all();
        return view('siswa.index', compact('siswas', 'kelases', 'spps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
            'keterangan' => 'belum lunas',
        ]);
        return redirect('/siswa')->with('alert', ['alert-success', 'Berhasil!', ' Siswa Telah Ditambahkan!']);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        // dd($siswa->kelas->id_kelas);
        $spps = Spp::all();
        $kelases = Kelas::all();
        return view('siswa.update', compact('siswa', 'spps', 'kelases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        User::where('name', $siswa->nama)->where('role', 'siswa')->update([
            'name' => $request->nama
        ]);

        Siswa::where('nisn', $siswa->nisn)->update([
            'nisn' => $request->nisn_new,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        return redirect('/siswa')->with('alert', ['alert-success', 'Berhasil!', ' Data Siswa Telah Diubah!'])->with('last_updated', $request->nisn);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        // use nisn to prevent same name problem
        User::where('nisn', $siswa->nisn)->delete();
        Siswa::where('nisn', $siswa->nisn)->delete();
        // Siswa::destroy($siswa->nisn);

        return redirect('/siswa')->with('alert', ['alert-success', 'Berhasil!', ' Data Siswa Telah Dihapus!']);
    }
}
