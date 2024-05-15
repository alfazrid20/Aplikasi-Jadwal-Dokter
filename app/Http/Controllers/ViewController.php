<?php

namespace App\Http\Controllers;

use App\Models\DetailKamars;
use App\Models\Polis;
use App\Models\Beritas;
use App\Models\Kategoris;
use App\Models\Dokters;
use App\Models\JadwalDokter;
use App\Models\Kamars;
use App\Models\JenisKamar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $query = Kamars::query();
        $jadwaldokter = JadwalDokter::all();
        $dokter = Dokters::all();
        $poli = Polis::all();
        $kamar = $query->orderByRaw("CASE WHEN status = 'TERISI' THEN 0 ELSE 1 END")->paginate(15);
        $jenis_kamar = JenisKamar::all();
        return view('frontend.viewjadwal',compact('jadwaldokter', 'dokter','poli','kamar','jenis_kamar'));
    }

    public function sejarah()
    {
        return view('frontend.sejarah');
    }

    public function cekkamar()
    {
        $jenis_kamar = JenisKamar::all();
        $detailkamar = DetailKamars::all();
        return view('frontend.cekkamar', compact('detailkamar'));
    }

    public function berita()
    {
      
        return view('frontend.berita');
    }

    public function listberita()
    {
        $berita = Beritas::all();
        $kategori = Kategoris::all();
    
        // Iterasi melalui setiap berita
        foreach ($berita as $b) {
            // Mendapatkan tanggal berita
            $tanggalBerita = Carbon::parse($b->tanggal);
    
            // Mendapatkan tanggal sekarang
            $tanggalSekarang = Carbon::now();
    
            // Menghitung selisih hari antara tanggal berita dan tanggal sekarang
            $selisihHari = $tanggalBerita->diffInDays($tanggalSekarang);
    
            // Menentukan status berita berdasarkan selisih hari
            $b->status = ($selisihHari <= 1) ? 'Update News' : 'Late News';
        }
    
        return view('frontend.listberita', compact('berita', 'kategori'));
    }
    
}
