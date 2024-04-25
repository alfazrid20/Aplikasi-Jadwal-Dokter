<?php

namespace App\Http\Controllers;

use App\Models\DetailKamars;
use App\Models\JenisKamar;
use App\Models\Kamars;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailKamarController extends Controller
{
    public function index(Request $request)
    {
    $nama_kamar = $request->input('nama_kamar');
    $detailkamar = DetailKamars::query();
    if ($nama_kamar) {
        $detailkamar->where('nama_kamar', 'LIKE', '%' . $nama_kamar . '%');
    }
    $detailkamar = $detailkamar->paginate(10);
    $jeniskamar = JenisKamar::all();

    return view('kamar.detailkamar', compact('detailkamar', 'jeniskamar'));
    }

    public function create()
    {
        $jeniskamar = JenisKamar::all();
        $kamar = Kamars::all();
        return view('kamar.detailkamar_create', compact('jeniskamar', 'kamar'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kamar' => 'required',
            'jenis_ruang_id' => 'required',
            'tempat_tidur' => 'required',
            'kamar_mandi' => 'required',
            'foto_kamar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah agar tidak wajib required
            'harga' => 'required',
        ], [
            'nama_kamar.required' => "Pilih Nama Kamar",
            'jenis_ruang_id.required' => "Pilih Jenis Kamar",
            'tempat_tidur.required' => "Isi Tempat Tidur",
            'kamar_mandi.required' => "Isi Kamar Mandi",
            'foto_kamar.image' => 'File harus berupa gambar.',
            'foto_kamar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto_kamar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'harga.required' => "Isi Nominal Harga",
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.detail-kamar.create')->withErrors($validator)->withInput();
        }
    
        $filePath = asset('frontend/images/no-image.png'); // Mengatur path default untuk gambar
    
        if ($request->hasFile('foto_kamar')) {
            $file = $request->file('foto_kamar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/foto_kamar', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }
    
        DetailKamars::create([
            'nama_kamar' => $request->nama_kamar,
            'jenis_ruang_id' => $request->jenis_ruang_id,
            'tempat_tidur' => $request->tempat_tidur,
            'kamar_mandi' => $request->kamar_mandi,
            'foto_kamar' => $filePath,
            'harga' => $request->harga,
        ]);
    
        // Redirect ke index kamar dengan pesan sukses
        return redirect()->route('backend.detail-kamar.index')->with('success', 'Data berhasil ditambah');
    }
    
    
    public function edit($id)
    {
        $detailKamar = DetailKamars::findOrFail($id);
        $jeniskamar = JenisKamar::all();
        return view('kamar.detailkamar_edit', compact('detailKamar', 'jeniskamar'));
    }

    public function update(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
        'nama_kamar' => 'required',
        'jenis_ruang_id' => 'required',
        'tempat_tidur' => 'required',
        'kamar_mandi' => 'required',
        'harga' => 'required',
    ], [
        'nama_kamar.required' => "Pilih Nama Kamar",
        'jenis_ruang_id.required' => "Pilih Jenis Kamar",
        'tempat_tidur.required' => "Isi Tempat Tidur",
        'kamar_mandi.required' => "Isi Kamar Mandi",
        'harga.required' => "Isi Nominal Harga",
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.detail-kamar.edit', $id)->withErrors($validator)->withInput();
    }

    $detailKamar = DetailKamars::findOrFail($id);

    $detailKamar->nama_kamar = $request->nama_kamar;
    $detailKamar->jenis_ruang_id = $request->jenis_ruang_id;
    $detailKamar->tempat_tidur = $request->tempat_tidur;
    $detailKamar->kamar_mandi = $request->kamar_mandi;
    $detailKamar->harga = $request->harga;

    // Jika ada file foto yang diunggah, proses file tersebut
    if ($request->hasFile('foto_kamar')) {
        $validator = Validator::make($request->all(), [
            'foto_kamar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'foto_kamar.image' => 'File harus berupa gambar.',
            'foto_kamar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto_kamar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.detail-kamar.edit', $id)->withErrors($validator)->withInput();
        }

        $file = $request->file('foto_kamar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/foto_kamar', $fileName);
        $filePath = 'storage/' . str_replace('public/', '', $filePath);

        // Hapus foto lama jika ada
        if ($detailKamar->foto_kamar) {
            Storage::delete(str_replace('storage/', 'public/', $detailKamar->foto_kamar));
        }

        $detailKamar->foto_kamar = $filePath;
    }

    $detailKamar->save();

    // Redirect ke index kamar dengan pesan sukses
    return redirect()->route('backend.detail-kamar.index')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $dokter = DB::table('detailkamar')
            ->where('id', $id)
            ->delete();
        if ($dokter) {
            return redirect()->route('backend.detail-kamar.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.detail-kamar.index')->with('error', 'Data Gagal Dihapus');
        }
    }

}
