<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('about.index',compact('fasilitas'));
    }

    public function create()
    {
      
        return view('about.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_fasilitas' => 'required', 
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'nama_fasilitas.required' => "Isi Tanggal",
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.about.create')
                ->withErrors($validator)
                ->withInput();
        }

        $filePath = asset('frontend/images/no-photo.png'); 

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/gambar_fasilitas', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }
    
        Fasilitas::create([
            'nama_fasilitas'=> $request->nama_fasilitas,
            'gambar'=> $filePath,
        ]);
    
        return redirect()->route('backend.about.index')
            ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('about.edit',compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_fasilitas' => 'required', 
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'nama_fasilitas.required' => "Fasilitas Harus Diisi",
            'gambar.required' => "Gambar Harus Diinputkan",
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.about.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $fasilitas = Fasilitas::findOrFail($id);

        $filePath = $fasilitas->gambar; // Tetap menggunakan gambar yang sudah ada

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/gambar_fasilitas', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }

        $fasilitas->update([
            'nama_fasilitas'=> $request->nama_fasilitas,
            'gambar'=> $filePath,
        ]);

        return redirect()->route('backend.about.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();
        return redirect()->route('backend.about.index')->with('success', 'Data Berhasil dihapus.');
    }
    
}
