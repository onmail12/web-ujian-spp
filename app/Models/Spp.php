<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'spp';
    protected $guarded = ['id_spp'];
    protected $primaryKey = 'id_spp';
    public $timestamps = false;

    //spp has many siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_spp', 'id_spp');
    }
    
}
