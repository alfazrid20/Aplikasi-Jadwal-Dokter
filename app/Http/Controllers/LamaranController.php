<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamarans;

class LamaranController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('nama');
        $query = Lamarans::query();
    
        if ($search) {
            $query->where('nama', 'LIKE', "%{$search}%");
        }
    
        $lamaran = $query->paginate(10);
    
        return view('loker.lamaran', compact('lamaran'));
    }

    public function updateStatus(Request $request, $id)
    {
        $lamaran = Lamarans::find($id);
        if ($lamaran) {
            $lamaran->status_lamaran = $request->input('status_lamaran');
            $lamaran->save();
            return redirect()->back()->with('success', 'Status lamaran berhasil diubah.');
        } else {
            return redirect()->back()->with('error', 'Lamaran tidak ditemukan.');
        }
    }
}
