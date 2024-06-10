<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Illuminate\Support\Facades\Validator;

class ManajemenController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('manajemen.index',compact('staff'));
    }

    public function create()
    {
       
        return view('manajemen.create',);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'tgl_lahir' => 'required', 
            'jenis_kelamin' => 'required',    
            'alamat' => 'required', 
            'no_telepon' => 'required', 
            'jabatan' => 'required', 
            'departemen' => 'required', 
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            ], [
            'nama.required' => "Nama harus diisi.",
            'tgl_lahir.required' => "Tanggal Lahir harus diisi.",
            'jenis_kelamin.required' => "Jenis Kelamin harus diisi.",
            'alamat.required' => "Batas waktu harus diisi.",
            'no_telepon.required' => "No Handphone / Telepon harus diisi",
            'jabatan.required' => "Jabatan harus diisi.",
            'departemen.required' => "Departemen harus diisi.",
            'foto.image' => 'File harus berupa foto atau gambar.',
            'foto.mimes' => 'Format foto yang diizinkan adalah jpeg, png, dan jpg',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);
    
            if ($validator->fails()) {
                return redirect()->route('backend.staff.create')
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $filePath = asset('frontend/images/no-image.png');
    
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = time() . '_' . $file->getClientOriginalName();
                
                $filePath = $file->storeAs('public/foto_manajemen', $fileName);
                $filePath = 'storage/' . str_replace('public/', '', $filePath);
            }
            Staff::create([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'jabatan' => $request->jabatan,
                'departemen' => $request->departemen,
                'foto' => $filePath,
                
            ]);
        
            return redirect()->route('backend.staff.index')
                ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('manajemen.edit',compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => ['required', 'regex:/^[0-9]{10,13}$/'],
            'jabatan' => 'required',
            'departemen' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => "Nama harus diisi.",
            'tgl_lahir.required' => "Tanggal Lahir harus diisi.",
            'tgl_lahir.date' => "Tanggal Lahir harus berupa tanggal yang valid.",
            'jenis_kelamin.required' => "Jenis Kelamin harus diisi.",
            'alamat.required' => "Alamat harus diisi.",
            'no_telepon.required' => "No Handphone / Telepon harus diisi.",
            'no_telepon.regex' => "No Handphone / Telepon harus terdiri dari 10 hingga 13 digit angka.",
            'jabatan.required' => "Jabatan harus diisi.",
            'departemen.required' => "Departemen harus diisi.",
            'foto.image' => 'File harus berupa foto atau gambar.',
            'foto.mimes' => 'Format foto yang diizinkan adalah jpeg, png, dan jpg.',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('backend.staff.edit', $staff->id)
                ->withErrors($validator)
                ->withInput();
        }
    
        $filePath = $staff->foto;
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/foto_manajemen', $fileName);
            $filePath = 'storage/' . str_replace('public/', '', $filePath);
        }
    
        $staff->update([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'jabatan' => $request->jabatan,
            'departemen' => $request->departemen,
            'foto' => $filePath,
        ]);
    
        return redirect()->route('backend.staff.index')
            ->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $staff = DB::table('manajemen')
            ->where('id', $id)
            ->delete();
        if ($staff) {
            return redirect()->route('backend.staff.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.staff.index')->with('error', 'Data Gagal Dihapus');
        }
    }

}
