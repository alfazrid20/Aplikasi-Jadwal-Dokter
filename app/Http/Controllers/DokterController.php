<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use App\Models\Dokters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $dokter = Dokters::select('*');
        $searchField = ['nama'];
        foreach ($searchField as $field) {
            $val = $request->input($field);
            if ($val && $val != '') {
                $dokter->where($field, 'like', '%' . $val . '%');
            }
        }
        $dokter = $dokter->paginate(10); // Gunakan variabel $dokter yang telah difilter
        return view('backend.data-dokter', compact('dokter'));
    }

    public function create()
    {
        $data['polis'] = Polis::get();
        return view('dokter.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'poli_id' => 'required',
        ], [
            'nama.required' => "Isi Nama",
            'poli_id.required' => "Isi Poli",
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.data-dokter.create')->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, buat entitas baru
        Dokters::create([
            'nama' => $request->nama,
            'poli_id' => $request->poli_id
        ]);

        return redirect()->route('backend.data-dokter.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $data['polis'] = Polis::get();
        $dokter = Dokters::findOrFail($id);
        return view('dokter.edit', compact('dokter', 'data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'poli_id' => 'required',
        ], [
            'nama.required' => "Isi Nama",
            'poli_id.required' => "Isi Poli",
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.data-dokter.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $dokter = Dokters::findOrFail($id);
        $dokter->nama = $request->input('nama');
        $dokter->poli_id = $request->input('poli_id');
        $dokter->save();

        return redirect()->route('backend.data-dokter.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $dokter = DB::table('dokters')
            ->where('id', $id)
            ->delete();
        if ($dokter) {
            return redirect()->route('backend.data-dokter.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.data-dokter.index')->with('error', 'Data Gagal Dihapus');
        }
    }
}
