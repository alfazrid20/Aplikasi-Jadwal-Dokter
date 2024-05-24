<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kamars;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $kamar = Kamars::all();
        $user = Auth::user();
        return view('backend.dashboard', compact('user','kamar'));
    }

    public function profileuser()
    {
        $user = Auth::user();
        return view('backend.profileuser', compact('user',));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.editprofile', compact('user',));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama pengguna harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.profileuser.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('foto_users', $fileName, 'public');

            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            $user->foto = $filePath;
        }

        $user->save();

        return redirect()->route('backend.profileuser')->with('success', 'Data pengguna berhasil diubah.');
    }

    public function panduan()
    {
        return view('backend.panduan',);
    }
}
