<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;
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
        return view('admin.dashboard.index', compact('wisata','kategori','user'));
    }
}
