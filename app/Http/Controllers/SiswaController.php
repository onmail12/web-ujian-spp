<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(){
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function index_update(Siswa $siswa){
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.update', compact('siswa', 'kelas', 'spp'));
    }

    public function update(Request $request){
        dd($request);
    }
}
