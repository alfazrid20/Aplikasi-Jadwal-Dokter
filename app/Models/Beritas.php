<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Beritas extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $fillable = [
         'judul_berita', 'gambar','kategori_id','isi','tanggal',
    ];
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategoris::class, 'kategori_id');
    }

    public function getStatusAttribute()
    {
        $tanggalBerita = Carbon::parse($this->tanggal);
        $tanggalSekarang = Carbon::now();
        $selisihHari = $tanggalBerita->diffInDays($tanggalSekarang);

        return ($selisihHari <= 1) ? 'Update News' : 'Late News';
    }

}
