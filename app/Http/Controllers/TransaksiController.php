<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;

class TransaksiController extends Controller
{
    public function index()
    {

        if (auth()->check() && auth()->user()->role !== 'petugas' && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $siswas = Siswa::belumlunas()->get();
        return view('transaksi.pembayaran', compact('siswas'));
    }

    public function index_histori()
    {
        $pembayarans = Pembayaran::all();
        return view('transaksi.histori', compact('pembayarans'));
    }

    public function create(Siswa $siswa)
    {
        Pembayaran::create([
            'id_petugas' => 1,
            'nisn' => $siswa->nisn,
            'tgl_bayar' => '2023-01-03',
            'id_spp' => $siswa->spp->id_spp,
            'jumlah_bayar' => 500000,
            'keterangan' => 'lunas',
        ]);

        return redirect('/pembayaran');
    }
}
