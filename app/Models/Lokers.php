<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokers extends Model
{
    use HasFactory;
    protected $table = 'infoloker';
    protected $fillable = [
         'posisi','deskripsi','persyaratan','batas_waktu','foto_loker'
    ];

    public $timestamps = false;
}
