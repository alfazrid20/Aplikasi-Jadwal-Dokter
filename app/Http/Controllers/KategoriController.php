<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = DB::table('kategoris')->get();

        return view('berita.kategori',$data);
    }

    public function create()
    {
        return view('berita.kategori_create');
    }

    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'kategori' => 'required', 
    ], [
        'kategori.required' => "Isi Kategori",
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.kategori.create')
            ->withErrors($validator)
            ->withInput();
    }

    $kategori= DB::table('kategoris')->insert([
        'kategori'=> $request->kategori
    ]);

    return redirect()->route('backend.kategori.create')
        ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $kategori = DB::table('kategoris')
            ->where('id', $id)
            ->first();
        if (!$kategori) {
            return abort(404);
        }
        return view('berita.kategori_edit', compact('kategori'));
    }
    

    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'kategori' => 'required', 
        ], [
            'kategori.required' => "Isi Kategori",
        ]);
    
       
        if ($validator->fails()) {
            return redirect()->route('backend.kategori.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
    
        
        DB::table('kategoris')
            ->where('id', $id)
            ->update([
                'kategori' => $request->kategori,
            ]);
    
      
        return redirect()->route('backend.kategori.index')
            ->with('success', 'Data berhasil diupdate');
    }
    
    public function delete($id)
    {
        $kategori = DB::table('kategoris')
            ->where('id', $id)
            ->delete();
        if ($kategori) {
            return redirect()->route('backend.kategori.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.kategori.index')->with('error', 'Data Gagal Dihapus');
        }
    }

}
