<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id_pembayaran'];
    protected $table = 'pembayaran';

    public $timestamps = true;
    const CREATED_AT = 'tgl_bayar';
    const UPDATED_AT = 'tgl_bayar';

    public function siswa(){
        return $this->belongsTo(Siswa::class, "nisn", "nisn");
    }

    public function spp(){
        return $this->belongsTo(Spp::class, "id_spp", "id_spp");
    }
    
    public function petugas(){
        return $this->belongsTo(Petugas::class, "id_petugas", "id_petugas");
    }
}
