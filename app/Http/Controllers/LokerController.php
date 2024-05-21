<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokers;
use App\Models\Posisi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LokerController extends Controller
{
    // Function Loker
    public function index()
    {
        $loker = Lokers::all();
        return view('loker.index', compact('loker'));
    }

    public function create()
    {
        return view('loker.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'posisi' => 'required', 
            'deskripsi' => 'required', 
            'persyaratan' => 'required',    
            'batas_waktu' => 'required', 
            'status_loker' => 'required', 
            'foto_loker' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'posisi.required' => "Posisi harus diisi.",
            'deskripsi.required' => "Deskripsi harus diisi.",
            'persyaratan.required' => "Persyaratan harus diisi.",
            'batas_waktu.required' => "Batas waktu harus diisi.",
            'status_loker.required' => "Status harus diisi.",
            'foto_loker.image' => 'File harus berupa foto atau gambar.',
            'foto_loker.mimes' => 'Format foto yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto_loker.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.loker.create')
                ->withErrors($validator)
                ->withInput();
        }

        $filePath = 'path/to/default/image.png';

        if ($request->hasFile('foto_loker')) {
            $file = $request->file('foto_loker');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/foto_loker', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }

        Lokers::create([
            'posisi' => $request->posisi,
            'foto_loker' => $filePath,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'status_loker' => $request->status_loker,
            'batas_waktu' => $request->batas_waktu,
        ]);

        return redirect()->route('backend.loker.index')
            ->with('success', 'Data berhasil ditambah');
    }


    public function edit($id)
    {
        $loker = Lokers::findOrFail($id);
        return view('loker.edit', compact('loker'));
    }
    

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'posisi' => 'required', 
            'deskripsi' => 'required', 
            'persyaratan' => 'required',    
            'batas_waktu' => 'required', 
            'status_loker' => 'required', 
            'foto_loker' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'posisi.required' => "Posisi harus diisi.",
            'deskripsi.required' => "Deskripsi harus diisi.",
            'persyaratan.required' => "Persyaratan harus diisi.",
            'batas_waktu.required' => "Batas waktu harus diisi.",
            'status_loker.required' => "Status harus diisi.",
            'foto_loker.image' => 'File harus berupa foto atau gambar.',
            'foto_loker.mimes' => 'Format foto yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto_loker.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.loker.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $loker = Lokers::findOrFail($id);
        
        $filePath = $loker->foto_loker;

        if ($request->hasFile('foto_loker')) {
            $file = $request->file('foto_loker');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            
            $filePath = $file->storeAs('public/foto_loker', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }

        $loker->update([
            'posisi'=> $request->posisi,
            'foto_loker'=> $filePath,
            'deskripsi'=> $request->deskripsi,
            'persyaratan'=> $request->persyaratan,
            'batas_waktu'=> $request->batas_waktu,
            'status_loker'=> $request->status_loker,
        ]);

        return redirect()->route('backend.loker.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $polis = DB::table('infoloker')
            ->where('id', $id)
            ->delete();
        if ($polis) {
            return redirect()->route('backend.loker.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.loker.index')->with('error', 'Data Gagal Dihapus');
        }
    }
    // End Function Loker

    // Function Posisi
    public function posisi()
    {
        $posisi = Posisi::all();
        return view('loker.posisi',compact('posisi'));
    }

    public function create2()
    {
        return view('loker.posisi_create');
    }

    public function store2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'posisi' => 'required', 
        ], [
            'posisi.required' => "Posisi harus diisi.",
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.posisi.create')
                ->withErrors($validator)
                ->withInput();
        }
        Posisi::create([
            'posisi'=> $request->posisi,
        ]);

        return redirect()->route('backend.posisi.index')
        ->with('success', 'Data berhasil ditambah');
    }

    public function delete2($id)
    {
        $polis = DB::table('infoloker')
            ->where('id', $id)
            ->delete();
        if ($polis) {
            return redirect()->route('backend.loker.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.loker.index')->with('error', 'Data Gagal Dihapus');
        }
    }
    // End Function Posisi

}
