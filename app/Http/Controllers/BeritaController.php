<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beritas;
use App\Models\Kategoris;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        
        
        return view('berita.index');
    }

    public function create()
    {   
        $kategori['kategori'] = DB::table('kategoris')->get();
        return view('berita.create', $kategori);
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required', 
            'judul_berita' => 'required', 
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'kategori' => 'required', 
            'isi' => 'required', 
        ], [
            'tanggal.required' => "Isi Tanggal",
            'judul_berita.required' => "Isi Judul",
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'kategori.required' => "Isi Kategori",
            'isi.required' => "Inputkan Isi Berita",
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.kategori.create')
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
    
        $berita= DB::table('beritas')->insert([
            'tanggal'=> $request->tanggal,
            'judul_berita'=> $request->judul_berita,
            'gambar'=> $filePath,
            'kategori'=> $request->kategori,
            'isi'=> $request->isi,
        ]);
    
        return redirect()->route('backend.data-berita.index')
            ->with('success', 'Data berhasil ditambah');
        }
    
    
}
