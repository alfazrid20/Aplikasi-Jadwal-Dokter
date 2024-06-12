<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImgSlider;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class SliderController extends Controller
{
    public function index ()
    {
        $data['slider'] = DB::table('slider')->get();
        return view('slider.index',$data);
    }

    public function create ()
    {
        return view('slider.create');
    }

    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'judul' => 'required', 
        'konten' => 'required', 
    ], [
        'judul.required' => "Isi Judul",
        'konten.required' => "Isi Konten",
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.slider.create')
            ->withErrors($validator)
            ->withInput();
    }

    DB::table('slider')->insert([
        'judul'=> $request->judul,
        'konten'=> $request->konten,
    ]);

    return redirect()->route('backend.slider.index')
        ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $slider = DB::table('slider')
        ->where('id', $id)
        ->first();
    if (!$slider) {
        return abort(404);
    }
        return view('slider.edit' ,compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'konten' => 'required',
        ], [
            'judul.required' => "Isi Judul",
            'konten.required' => "Isi Konten",
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.slider.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $slider = DB::table('slider')->where('id', $id)->first();
        if (!$slider) {
            return redirect()->route('backend.slider.index')
                ->with('error', 'Data tidak ditemukan');
        }

        DB::table('slider')
            ->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);

        return redirect()->route('backend.slider.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $slider = DB::table('slider')
            ->where('id', $id)
            ->delete();
        if ($slider) {
            return redirect()->route('backend.slider.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.slider.index')->with('error', 'Data Gagal Dihapus');
        }
    }

    public function index2 ()
    {
        $foto = ImgSlider::all();
        return view('slider.img', compact('foto'));
    }

    public function create2 ()
    {
        return view('slider.img_create');
    }

    public function store2(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'foto_slider' => 'image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'foto_slider.image' => 'File harus berupa foto atau gambar.',
        'foto_slider.mimes' => 'Format foto yang diizinkan adalah jpeg, png, dan jpg',
        'foto_slider.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
       
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.slider-foto.create')
            ->withErrors($validator)
            ->withInput();
    }

    if ($request->hasFile('foto_slider')) {
        $file = $request->file('foto_slider');
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        $filePath = $file->storeAs('public/foto_slider', $fileName);
        $filePath = 'storage/' . str_replace('public/', '', $filePath);
    }

    ImgSlider::create([
        'foto_slider' => $filePath,
        
    ]);

    return redirect()->route('backend.slider-foto.index')
        ->with('success', 'Data berhasil ditambah');
    }

    public function edit2 ($id)
    {
        $foto = ImgSlider::findOrFail($id);
        return view('slider.img_edit',compact('foto'));
    }

    public function update2(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto_slider' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'foto_slider.image' => 'File harus berupa foto atau gambar.',
            'foto_slider.mimes' => 'Format foto yang diizinkan adalah jpeg, png, dan jpg',
            'foto_slider.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.slider-foto.edit2', $id)
                ->withErrors($validator)
                ->withInput();
        }
    
        $foto = ImgSlider::findOrFail($id);
    
        if ($request->hasFile('foto_slider')) {
            $file = $request->file('foto_slider');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/foto_slider', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
    
            // Hapus gambar lama jika ada
            if ($foto->foto_slider) {
                Storage::delete('public/' . str_replace('storage/', '', $foto->foto_slider));
            }
    
            $foto->update([
                'foto_slider' => $filePath,
            ]);
        }
    
        return redirect()->route('backend.slider-foto.index2')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function delete2($id)
    {
        $foto = DB::table('foto_slider')
            ->where('id', $id)
            ->delete();
        if ($foto) {
            return redirect()->route('backend.slider-foto.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.slider-foto.index')->with('error', 'Data Gagal Dihapus');
        }
    }
    

}
