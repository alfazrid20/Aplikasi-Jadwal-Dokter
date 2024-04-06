<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('backend.user', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama pengguna harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'password.required' => 'Kata sandi harus diisi.',
            'foto.required' => 'Silakan pilih file foto.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Jika Validasi Gagal
        if ($validator->fails()) {
            return redirect()->route('backend.user.create')->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, proses unggahan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('foto_users', $fileName, 'public');
        }

        // Buat entitas baru dengan foto
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $filePath ?? null, // Gunakan $filePath jika foto diunggah, jika tidak, biarkan null
        ]);


        return redirect()->route('backend.user.index')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
    ], [
        'name.required' => 'Nama pengguna harus diisi.',
        'email.required' => 'Alamat email harus diisi.',
    ]);

    if ($validator->fails()) {
        return redirect()->route('backend.user.edit', ['id' => $id])->withErrors($validator)->withInput();
    }

    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    // Periksa apakah ada input foto baru
    if ($request->hasFile('foto')) {
        // Validasi foto
        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.user.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        // Proses unggah foto
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('foto_users', $fileName, 'public');

        // Hapus foto lama jika ada
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->foto = $filePath;
    }

    // Periksa apakah ada input password baru
    if ($request->filled('password')) {
        // Jika ada input password baru, update password
        $user->password = bcrypt($request->input('password'));
    }

    $user->save();

    return redirect()->route('backend.user.index')->with('success', 'Data pengguna berhasil diubah.');
}


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
