<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
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
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ], [
        'judul.required' => "Isi Judul",
        'konten.required' => "Isi Konten",
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.slider.create')
            ->withErrors($validator)
            ->withInput();
    }

    $filePath = asset('frontend/images/no-photo.png'); 

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        $filePath = $file->storeAs('public/gambar_slider', $fileName);
        $filePath = 'storage/' . str_replace('public/', '', $filePath);
    }
    DB::table('slider')->insert([
        'judul'=> $request->judul,
        'konten'=> $request->konten,
        'gambar'=> $filePath,
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
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => "Isi Judul",
            'konten.required' => "Isi Konten",
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
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

        $filePath = $slider->gambar;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $filePath = $file->storeAs('public/gambar_slider', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }

        DB::table('slider')
            ->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'gambar' => $filePath,
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
}
