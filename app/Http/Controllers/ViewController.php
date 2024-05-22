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
use App\Models\Lokers;
use App\Models\Lamarans;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
    
    public function loker(Request $request)
    {
        $loker = Lokers::all();
        return view('frontend.listlowongan',compact('loker'));
    }

    public function lowongan($id)
    {
        $loker = Lokers::findOrFail($id);
        $otherJobs = Lokers::where('id', '!=', $id)->get();

        return view('frontend.lowongan', compact('loker', 'otherJobs'));
    }

    public function create()
    {
        $lokerData = Lokers::all();
        return view('frontend.lowongan_create',compact('lokerData'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'email' => 'required', 
            'no_hp' => 'required',    
            'alamat' => 'required', 
            'pendidikan_terakhir' => 'required', 
            'ipk' => 'required',
            'posisi_id' => 'required',
            'dokumen' => 'required|mimes:pdf',
            'status' => 'required',
        ], [
            'nama.required' => "Nama harus diisi.",
            'email.required' => "Email harus diisi.",
            'no_hp.required' => "Nomor HP harus diisi.",
            'alamat.required' => "Alamat harus diisi.",
            'pendidikan_terakhir.required' => "Pendidikan terakhir harus diisi.",
            'ipk.required' => 'IPK atau Nilai Ijazah Terakhir harus diisi',
            'posisi_id.required' => 'Posisi yang dilamar harus diisi',
            'dokumen.required' => 'Dokumen harus diunggah',
            'dokumen.mimes' => 'Dokumen harus berupa file PDF',
            'status.required' => 'Status harus diisi',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('lowongan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $loker = Lokers::find($request->posisi_dilamar);
        if ($loker && $loker->status_loker === 'Tutup') {
            return redirect()->route('lowongan.create')
                ->with('error', 'Maaf, lowongan pada posisi ini belum dibuka.')
                ->withInput();
        }
        $status_lamaran = 0;

        $dokumenPath = $request->file('dokumen')->store('dokumen');
        
        Lamarans::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'ipk' => $request->ipk,
            'posisi_id' => $request->posisi_id,
            'dokumen' => $dokumenPath,
            'status' => $request->status,
            'status_lamaran' => $status_lamaran,
        ]);

        return redirect()->route('loker')
            ->with('success', 'Data berhasil ditambah');
    }

}
