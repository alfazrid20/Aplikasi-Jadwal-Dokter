<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beritas;
use App\Models\Kategoris;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Beritas::all();
        $kategori = Kategoris::all();
        
        return view('berita.index', compact('berita','kategori'));
    }

    public function create()
    {   
        $kategori = Kategoris::all();
        return view('berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required', 
            'judul_berita' => 'required', 
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'kategori_id' => 'required', 
            'isi' => 'required', 
        ], [
            'tanggal.required' => "Isi Tanggal",
            'judul_berita.required' => "Isi Judul",
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'kategori_id.required' => "Isi Kategori",
            'isi.required' => "Inputkan Isi Berita",
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.data-berita.create')
                ->withErrors($validator)
                ->withInput();
        }

        $filePath = asset('frontend/images/no-photo.png'); 

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/gambar_berita', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }
    
        Beritas::create([
            'tanggal'=> $request->tanggal,
            'judul_berita'=> $request->judul_berita,
            'gambar'=> $filePath,
            'kategori_id'=> $request->kategori_id,
            'isi'=> $request->isi,
        ]);
    
        return redirect()->route('backend.data-berita.index')
            ->with('success', 'Data berhasil ditambah');
    }
}
