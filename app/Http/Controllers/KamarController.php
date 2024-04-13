<?php

namespace App\Http\Controllers;

use App\Models\JenisKamar;
use App\Models\Kamars;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        $kamar = Kamars::orderByRaw("CASE WHEN status = 'TERISI' THEN 0 ELSE 1 END")->paginate(20);
        $jenis_kamar = JenisKamar::all();
        return view('kamar.index', compact('kamar', 'jenis_kamar'));
    }

    public function create()
    {
        $jeniskamar = JenisKamar::all();
        $kamar = Kamars::all();
        return view('kamar.create', compact('jeniskamar', 'kamar'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_kamar' => 'required',
            'jenis_ruang_id' => 'required',
            'posisi' => 'required',
            'status' => 'required',
            'jumlah_pasien' => 'required',
            // 'tanggal_masuk' => 'required'
        ], [
            'nama_kamar.required' => "Pilih Nama Kamar",
            'jenis_ruang_id.required' => "Pilih Jenis Kamar",
            'posisi.required' => "Isi Posisi",
            'status.required' => "Pilih Status",
            'Jumlah Pasien.required' => "Isi Jumlah Pasien",
            'tanggal_masuk.required' => "Isi Tanggal Masuk"
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('backend.kamar.create')->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, buat entitas baru
        Kamars::create([
            'nama_kamar' => $request->nama_kamar,
            'jenis_ruang_id' => $request->jenis_ruang_id,
            'posisi' => $request->posisi,
            'status' => $request->status,
            'jumlah_pasien' => $request->jumlah_pasien,
            'tanggal_masuk' => date('Y-m-d', strtotime($request->tanggal_masuk))
        ]);

        // Redirect ke index kamar dengan pesan sukses
        return redirect()->route('backend.kamar.index')->with('success', 'Data berhasil ditambah');
    }
    public function edit($id)
    {
        $kamar = Kamars::findOrFail($id);
        $jeniskamar = JenisKamar::all();
        return view('kamar.edit', compact('kamar', 'jeniskamar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_kamar' => 'required',
            'jenis_ruang_id' => 'required',
            'posisi' => 'required',
            'status' => 'required',
            'jumlah_pasien' => 'required',
            // 'tanggal_masuk' => 'required'
        ], [
            'nama_kamar.required' => "Pilih Nama Kamar",
            'jenis_ruang_id.required' => "Pilih Jenis Kamar",
            'posisi.required' => "Isi Posisi",
            'status.required' => "Pilih Status",
            'jumlah_pasien.required' => "Isi Jumlah Pasien",
            'tanggal_masuk.required' => "Isi Tanggal Masuk"
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('backend.kamar.edit', $id)->withErrors($validator)->withInput();
        }

        // Temukan kamar berdasarkan ID
        $kamar = Kamars::findOrFail($id);

        // Update kamar
        $kamar->update([
            'nama_kamar' => $request->nama_kamar,
            'jenis_ruang_id' => $request->jenis_ruang_id,
            'posisi' => $request->posisi,
            'status' => $request->status,
            'jumlah_pasien' => $request->jumlah_pasien,
            'tanggal_masuk' => date('Y-m-d', strtotime($request->tanggal_masuk))
        ]);

        // Redirect ke index kamar dengan pesan sukses
        return redirect()->route('backend.kamar.index')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $user = Kamars::findOrFail($id);
        $user->delete();

        return redirect()->route('backend.kamar.index')->with('success', 'Data Berhasil dihapus.');
    }
}
