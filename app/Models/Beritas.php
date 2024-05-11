<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beritas extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $fillable = [
         'judul_berita', 'gambar','kategori','isi','tanggal',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategoris::class, 'kategori_id');
    }
}