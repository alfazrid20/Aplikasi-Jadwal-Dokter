<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use App\Models\Dokters;
use App\Models\JadwalDokter;
use App\Models\Kamars;
use App\Models\JenisKamar;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $jadwaldokter = JadwalDokter::all();
        $dokter = Dokters::all();
        $poli = Polis::all();
        $kamar = Kamars::all();
        $jenis_kamar = JenisKamar::all();
        return view('frontend.viewjadwal',compact('jadwaldokter', 'dokter','poli','kamar','jenis_kamar'));
    }
}
