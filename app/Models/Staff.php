<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'manajemen';
    protected $fillable = ['nama','tgl_lahir','jenis_kelamin','alamat','no_telepon','jabatan','departemen','foto'];
    public $timestamps = false;
}
