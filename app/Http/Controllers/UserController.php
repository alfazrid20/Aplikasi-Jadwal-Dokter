<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('backend.user', compact('user','roles', 'permissions'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama pengguna harus diisi.',
            'role.required' => 'Role pengguna harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.min' => 'Kata sandi minimal harus 6 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.user.create')->withErrors($validator)->withInput();
        }

        $filePath = asset('frontend/images/usernofoto.png'); 

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('foto_users', $fileName, 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $filePath,
        ]);

        return redirect()->route('backend.user.index')->with('success', 'Data pengguna berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama pengguna harus diisi.',
            'role.required' => 'Role pengguna harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.min' => 'Kata sandi minimal harus 6 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, dan gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.user.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

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

        return redirect()->route('backend.user.index')->with('success', 'Data pengguna berhasil diubah.');
    }

    public function delete($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->delete();
        if ($user) {
            return redirect()->route('backend.user.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('backend.user.index')->with('error', 'Data Gagal Dihapus');
        }
    }


    //Role
    public function roleindex()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.role', compact('roles', 'permissions'));
    }

    // Menambahkan role baru
    public function storeRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.role.index')->withErrors($validator)->withInput();
        }

        Role::create(['name' => $request->name]);

        return redirect()->route('backend.role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    // Menghapus role
    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();    

        return redirect()->route('backend.role.index')->with('success', 'Role berhasil dihapus.');
    }

    // Menambahkan permission baru
    public function storePermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
        ]);

        if ($validator->fails()) {
            return redirect()->route('backend.role.index')->withErrors($validator)->withInput();
        }

        Permission::create(['name' => $request->name]);

        return redirect()->route('backend.role.index')->with('success', 'Permission berhasil ditambahkan.');
    }

    // Menghapus permission
    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('backend.role.index')->with('success', 'Permission berhasil dihapus.');
    }
}
