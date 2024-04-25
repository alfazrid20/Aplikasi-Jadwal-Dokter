<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = [
        // 'poli_id', 'dokter_id', 'hari', 'jam_pelayanan', 'keterangan'
        'poli_id', 'dokter_id', 'hari', 'jam_pelayanan', 'foto_dokter', 'keterangan' ,
    ];

    protected $guarded = [];

    public $timestamps = true;

    public function poli()
    {
        return $this->belongsTo(Polis::class, 'poli_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokters::class, 'dokter_id');
    }



    // public $timestamps = true;
    // protected $touches = ['updated_at'];
}
