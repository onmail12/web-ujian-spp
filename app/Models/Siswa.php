<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nisn', 'nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'id_spp', 'keterangan'];
    protected $primaryKey = 'nisn';
    protected $with = ['spp', 'kelas'];
    public $timestamps = true;

    public function spp()
    {
        return $this->belongsTo(Spp::class, "id_spp", "id_spp");
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, "id_kelas", "id_kelas");
    }

    public function scopeBelumlunas($query)
    {
        return $query->where('keterangan', '=', 'belum lunas');
    }
}
