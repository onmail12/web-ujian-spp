<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;

class TransaksiController extends Controller
{
    public function index()
    {
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
            'id_petugas' => auth()->user()->id_petugas,
            'nisn' => $siswa->nisn,
            'tgl_bayar' => date("Y-m-d", time()),
            'id_spp' => $siswa->spp->id_spp,
            'jumlah_bayar' => 500000, // no form
            'keterangan' => 'lunas',
        ]);

        return redirect('/pembayaran');
    }
}
