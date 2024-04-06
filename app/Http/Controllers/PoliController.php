<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PoliController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('nama'); // Ambil nilai parameter pencarian

        // Lakukan pencarian berdasarkan nama poli jika parameter pencarian ada
        if ($searchTerm) {
            $polis = Polis::where('nama', 'LIKE', '%' . $searchTerm . '%')->get();
        } else {
            // Jika tidak ada parameter pencarian, ambil semua data poli
            $polis = Polis::all();
        }

        return view('backend.data-poli', compact('polis'));
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kodepoli' => 'required',
        ], [
            'nama.required' => "Isi Nama",
            'kodepoli.required' => "Isi Kode Poli",
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.data-poli.create')->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, buat entitas baru
        Polis::create([
            'nama' => $request->nama,
            'kodepoli' => $request->kodepoli
        ]);

        return redirect()->route('backend.data-poli.index')->with('success', 'Data berhasil ditambah');
    }


    public function edit($id)
    {
        $polis = Polis::findOrFail($id);
        return view('poli.edit', compact('polis'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kodepoli' => 'required',
        ], [
            'nama.required' => "Isi Nama",
            'kodepoli.required' => "Isi Kode Poli",
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.data-poli.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $polis = Polis::findOrFail($id);
        $polis->nama = $request->input('nama');
        $polis->kodepoli = $request->input('kodepoli');
        $polis->save();

        return redirect()->route('backend.data-poli.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $polis = DB::table('polis')
            ->where('id', $id)
            ->delete();
        if ($polis) {
            return redirect()->route('backend.data-poli.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.data-poli.index')->with('error', 'Data Gagal Dihapus');
        }
    }
}
