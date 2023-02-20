<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
        $siswa = Siswa::find(auth()->user()->nisn);
        $kelases = Kelas::all();
        return view('profile', compact('siswa', 'kelases'));
    }

    public function update(Request $request){
        Siswa::find(auth()->user()->nisn)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        User::where('nisn', auth()->user()->nisn)->first()->update([
            'name' => $request->nama,
        ]);
        return redirect()->route('home');
    }
}
