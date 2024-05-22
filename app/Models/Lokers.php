<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokers extends Model
{
    use HasFactory;
    protected $table = 'infoloker';
    protected $fillable = [
         'posisi_id','deskripsi','persyaratan','batas_waktu','foto_loker','status_loker'
    ];

    public $timestamps = false;
}
