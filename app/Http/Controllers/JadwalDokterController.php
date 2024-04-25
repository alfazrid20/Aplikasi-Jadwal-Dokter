<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use App\Models\Dokters;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JadwalDokterController extends Controller
{

    public function index(Request $request)
    {
        $query = JadwalDokter::query();
        if ($request->has('nama')) {
            $query->whereHas('dokter', function ($q) use ($request) {
                $q->where('nama', 'like', '%'.$request->nama.'%');
            });
        }
        $jadwaldokter = $query->get();
        $dokter = Dokters::all();
        $poli = Polis::all();
    
        return view('backend.jadwal-dokter', compact('jadwaldokter', 'dokter', 'poli'));
    }
    

    public function create()
    {
        $data['polis'] = Polis::all();
        $data['dokters'] = Dokters::all();

        return view('jadwaldokter.create', $data);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'poli_id' => 'required', 
        'dokter_id' => 'required',
        'hari' => 'required',
        'jam_pelayanan' => 'required',
        'foto_dokter' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'keterangan' => 'required'
    ], [
        'poli_id.required' => "Isi Poli",
        'dokter_id.required' => "Isi Nama Dokter",
        'hari.required' => "Isi Hari",
        'jam_pelayanan.required' => "Isi Jam Pelayanan",
        'foto_dokter.required' => 'Silakan pilih file foto.',
        'foto_dokter.image' => 'File harus berupa gambar.',
        'foto_dokter.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
        'foto_dokter.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        'keterangan.required' => 'Isi Keterangan'
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.jadwal-dokter.create')
            ->withErrors($validator)
            ->withInput();
    }

    if ($request->hasFile('foto_dokter')) {
        $file = $request->file('foto_dokter');
        // Membuat nama file unik dengan menambahkan timestamp
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        // Menyimpan file ke direktori penyimpanan
        $filePath = $file->storeAs('public/foto_dokter', $fileName);
        $filePath = 'storage/' . str_replace('public/', '', $filePath);
    } else {
        return redirect()->back()
            ->withErrors(['foto_dokter' => 'Silakan pilih file foto.'])
            ->withInput();
    }

    // Jika validasi berhasil dan file berhasil diunggah, buat entitas baru
    JadwalDokter::create([
        'poli_id' => $request->poli_id,
        'dokter_id' => $request->dokter_id,
        'hari' => $request->hari,
        'jam_pelayanan' => $request->jam_pelayanan,
        'foto_dokter' => $filePath,
        'keterangan' => $request->keterangan
    ]);

    return redirect()->route('backend.jadwal-dokter.index')
        ->with('success', 'Data berhasil ditambah');
}


    public function edit($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $polis = Polis::all();
        $dokters = Dokters::all();
        return view('jadwaldokter.edit', compact('jadwal', 'polis', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'poli_id' => 'required',
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_pelayanan' => 'required',
            'keterangan' => 'required'
        ], [
            'poli_id.required' => "Isi Poli",
            'dokter_id.required' => "Isi Nama Dokter",
            'hari.required' => "Isi Hari",
            'jam_pelayanan.required' => "Isi Jam Pelayanan",
            'keterangan.required' => 'Isi Keterangan'
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.jadwal-dokter.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $jadwal = JadwalDokter::findOrFail($id);

        $jadwal->poli_id = $request->poli_id;
        $jadwal->dokter_id = $request->dokter_id;
        $jadwal->hari = $request->hari;
        $jadwal->jam_pelayanan = $request->jam_pelayanan;
        $jadwal->keterangan = $request->keterangan;

        // Jika ada file foto yang diunggah, proses file tersebut
    if ($request->hasFile('foto_dokter')) {
        $validator = Validator::make($request->all(), [
            'foto_dokter' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'foto_dokter.image' => 'File harus berupa gambar.',
            'foto_dokter.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto_dokter.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.jadwal-dokter.edit', $id)->withErrors($validator)->withInput();
        }

        $file = $request->file('foto_dokter');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/foto_dokter', $fileName);
        $filePath = 'storage/' . str_replace('public/', '', $filePath);

        // Hapus foto lama jika ada
        if ($jadwal->foto_dokter) {
            Storage::delete(str_replace('storage/', 'public/', $jadwal->foto_dokter));
        }

        $jadwal->foto_dokter = $filePath;
    }

        $jadwal->save();

        return redirect()->route('backend.jadwal-dokter.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('backend.jadwal-dokter.index')->with('success', 'Data berhasil dihapus');
    }

    public function reset()
    {
        try {
            $jadwal = JadwalDokter::all();
            foreach ($jadwal as $item) {
                $item->keterangan = 'Tidak Tersedia';
                $item->jam_pelayanan = '';
                $item->save();
            }
            return redirect()->back()->with('success', 'Semua data berhasil di-reset');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mereset data: ' . $e->getMessage());
        }
    }
    
    
}
