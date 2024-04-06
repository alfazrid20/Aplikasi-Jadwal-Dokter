<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use App\Models\Dokters;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JadwalDokterController extends Controller
{

    public function index()
    {
        $jadwaldokter = JadwalDokter::all();
        $dokter = Dokters::all();
        $poli = Polis::all();

        return view('backend.jadwal-dokter', compact('jadwaldokter', 'dokter','poli',));
    }

    public function create()
    {
        $data['polis'] = Polis::all();
        $data['dokters'] = Dokters::all();

        return view('jadwaldokter.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'poli_id' => 'required', // Ubah menjadi poli_id
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_pelayanan' => 'required',
            'keterangan' => 'required' // Pastikan validasi keterangan diatur dengan benar
        ], [
            'poli_id.required' => "Isi Poli",
            'dokter_id.required' => "Isi Nama Dokter",
            'hari.required' => "Isi Hari",
            'jam_pelayanan.required' => "Isi Jam Pelayanan",
            'keterangan.required' => 'Isi Keterangan'
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.jadwal-dokter.create')->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, buat entitas baru
        JadwalDokter::create([
            'poli_id' => $request->poli_id,
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam_pelayanan' => $request->jam_pelayanan,
            'keterangan' => $request->keterangan
        ]);


        return redirect()->route('backend.jadwal-dokter.index')->with('success', 'Data berhasil ditambah');
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
        $jadwal->update($request->all());

        return redirect()->route('backend.jadwal-dokter.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('backend.jadwal-dokter.index')->with('success', 'Data berhasil dihapus');
    }
}
