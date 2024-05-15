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
use Illuminate\Support\Facades\DB;
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

    public function berita($id)
    {
        $berita = Beritas::findOrFail($id);
        $otherNews = Beritas::where('id', '!=', $id)->get();
        return view('frontend.berita', compact('berita', 'otherNews'));
    }


    
    public function listberita(Request $request)
    {
        $kategoriId = $request->input('kategori_id');
        $query = Beritas::query();
        if ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        }
        $berita = $query->get();
        $kategori = Kategoris::all();
        
        return view('frontend.listberita', compact('berita', 'kategori'));
    }
    
}
