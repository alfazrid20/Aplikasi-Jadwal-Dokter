<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kamars;
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

    public function panduan()
    {
        return view('backend.panduan',);
    }
}
