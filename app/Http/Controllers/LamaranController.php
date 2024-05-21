<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamarans;

class LamaranController extends Controller
{
    public function index()
    {
        $lamaran = Lamarans::all();
        return view('loker.lamaran',compact('lamaran'));
    }
}
