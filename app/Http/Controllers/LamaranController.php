<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamarans;
use Illuminate\Support\Facades\DB;

class LamaranController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('nama');
        $query = Lamarans::query();

        if ($search) {
            $query->where('nama', 'LIKE', "%{$search}%");
        }

        $lamaran = $query->orderByRaw("FIELD(status_lamaran, 3, 1, 0, 2)")
                        ->paginate(10);

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

    public function show($id)
    {
        $lamaran = Lamarans::findOrFail($id);
        return response()->json($lamaran);
    }

    public function delete($id)
{
    // Ambil data lamaran berdasarkan ID
    $lamaran = DB::table('lamarans')->where('id', $id)->first();

    if ($lamaran) {
        // Hapus file dokumen dari storage
        if ($lamaran->dokumen && file_exists(public_path($lamaran->dokumen))) {
            unlink(public_path($lamaran->dokumen));
        }

        // Hapus data dari database
        DB::table('lamarans')->where('id', $id)->delete();

        return redirect()->route('backend.lamaran.index')->with('success', 'Data Berhasil Dihapus');
    } else {
        return redirect()->route('backend.lamaran.index')->with('error', 'Data Gagal Dihapus');
    }
}

}
