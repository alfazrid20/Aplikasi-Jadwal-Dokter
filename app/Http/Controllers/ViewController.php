<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use App\Models\Dokters;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $jadwaldokter = JadwalDokter::all();
        $dokter = Dokters::all();
        $poli = Polis::all();
        return view('frontend.viewjadwal',compact('jadwaldokter', 'dokter','poli',));
    }
}
