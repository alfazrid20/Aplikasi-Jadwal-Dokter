<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamars extends Model
{
    use HasFactory;
    protected $table = 'ruang_inaps';
    protected $fillable = ['nama_kamar', 'posisi','status', 'jumlah_pasien', 'jenis_ruang_id'];

    public function jeniskamar()
    {
        return $this->belongsTo(JenisKamar::class, 'jenis_ruang_id');
    }
}
