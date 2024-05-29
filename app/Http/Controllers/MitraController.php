<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Mitras;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = Mitras::all();
        return view('mitra.index',compact('mitra'));
    }

    public function create()
    {
       
        return view('mitra.create');
    }

    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'nama' => 'required', 
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'nama.required' => "Isi Nama",
        'gambar.required' => "Inputkan Gambar",
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.mitra.create')
            ->withErrors($validator)
            ->withInput();
    }

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        $filePath = $file->storeAs('public/gambar_mitra', $fileName);
        $filePath = 'storage/' . str_replace('public/', '', $filePath);
    }

    Mitras::create([
        'nama' => $request->nama,
        'gambar' => $filePath,
    ]);

    return redirect()->route('backend.mitra.index')
        ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $mitra = Mitras::findOrFail($id);
        return view('mitra.edit',compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $mitra = Mitras::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama.required' => "Isi Nama",
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.mitra.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
    
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($mitra->gambar && Storage::exists(str_replace('storage/', 'public/', $mitra->gambar))) {
                Storage::delete(str_replace('storage/', 'public/', $mitra->gambar));
            }
    
            // Upload gambar baru
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/gambar_mitra', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
    
            $mitra->gambar = $filePath;
        }
    
        $mitra->nama = $request->nama;
        $mitra->save();
    
        return redirect()->route('backend.mitra.index')
            ->with('success', 'Data berhasil diperbarui');
    }
    
    public function delete()
    {
       
        //
    }




}
