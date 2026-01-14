<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;
use App\Models\Penilaian;
use App\Models\SkalaPenilaian;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $wisata = Wisata::count();
        $kategori = KategoriWisata::count();
        $user = User::count();
        $skala = SkalaPenilaian::count();
        $penilaian = Penilaian::count();

        if (Auth::user()->hasAnyRole(['usaha'])) {
            $wisata = Wisata::where('user_id', Auth::user()->id)->count();
            $penilaian =  Penilaian::with(['user', 'wisata'])

                // 🔐 JIKA LOGIN SEBAGAI USAHA → HANYA PENILAIAN WISATA MILIKNYA
                ->when(Auth::user()->hasRole('usaha'), function ($query) {
                    $query->whereHas('wisata', function ($w) {
                        $w->where('user_id', Auth::user()->id);
                    });
                })->count();
        }

        return view('admin.dashboard.index', compact('wisata', 'kategori', 'user', 'skala', 'penilaian'));
    }
}
