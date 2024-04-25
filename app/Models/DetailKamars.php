<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKamars extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detailkamar';
    protected $fillable = [
        'nama_kamar', 'jenis_ruang_id', 'tempat_tidur', 'kamar_mandi', 'foto_kamar' , 'harga',
    ];

    public function jeniskamar()
    {
    return $this->belongsTo(JenisKamar::class, 'jenis_ruang_id');
    }

}
