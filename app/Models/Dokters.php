<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokters extends Model
{
    protected $table = 'dokters';
    protected $fillable = [
         'nama', 'poli_id',
    ];

    public function poli()
    {
        return $this->belongsTo(Polis::class, 'poli_id');
    }
}
