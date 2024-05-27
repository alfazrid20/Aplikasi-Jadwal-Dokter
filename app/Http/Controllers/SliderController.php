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
        'konten'=> $request->konten
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

        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('backend.slider.index')
                ->with('error', 'Data tidak ditemukan');
        }

        $slider->judul = $request->judul;
        $slider->konten = $request->konten;
        $slider->save();

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
