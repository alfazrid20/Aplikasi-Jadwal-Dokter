<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamarans extends Model
{
    use HasFactory;
    protected $table = 'lamarans';
    protected $fillable = [
         'nama', 'email','no_hp','alamat','posisi_dilamar','dokumen','status','status_lamaran','pendidikan_terakhir'
         ,'ipk',
    ];
}
