<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beritas;
use App\Models\Kategoris;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Beritas::query();

        if ($request->has('tanggalberita')) {
            $tanggalBerita = Carbon::createFromFormat('Y-m-d', $request->tanggalberita);
            $query->whereDate('tanggal', $tanggalBerita);
        } else {
            // Jika tidak ada tanggal berita yang diberikan, tampilkan semua data berita
            $berita = Beritas::all();
            $kategori = Kategoris::all();
            return view('berita.index', compact('berita', 'kategori'));
        }
        
        $berita = $query->get();
        $kategori = Kategoris::all();
        
        return view('berita.index', compact('berita', 'kategori'));
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

    public function edit($id)
    {   
        $berita = Beritas::findOrFail($id);
        $kategori = Kategoris::all();
        return view('berita.edit', compact('kategori','berita'));
    }


    public function update(Request $request, $id)
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
            return redirect()->route('backend.data-berita.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $berita = Beritas::findOrFail($id);

        $filePath = $berita->gambar; // Tetap menggunakan gambar yang sudah ada

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/gambar_berita', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }

        $berita->update([
            'tanggal'=> $request->tanggal,
            'judul_berita'=> $request->judul_berita,
            'gambar'=> $filePath,
            'kategori_id'=> $request->kategori_id,
            'isi'=> $request->isi,
        ]);

        return redirect()->route('backend.data-berita.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $berita = Beritas::findOrFail($id);
        $berita->delete();
        return redirect()->route('backend.data-berita.index')->with('success', 'Data Berhasil dihapus.');
    }

}
