<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamarans extends Model
{
    use HasFactory;
    protected $table = 'lamarans';
    protected $fillable = [
         'nama', 'jenis_kelamin', 'email','no_hp','foto','alamat','posisi_id','dokumen','status','status_lamaran','pendidikan_terakhir'
         ,'ipk', 'kampus',
    ];

    public function infoloker()
    {
        return $this->belongsTo(Lokers::class, 'posisi_id');
    }

}
