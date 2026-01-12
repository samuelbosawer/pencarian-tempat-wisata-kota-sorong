<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPenilaian;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PenilaianController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
         $datas = Penilaian::when($request->s, function ($query) use ($request) {
        $s = $request->s;

        $query->where(function ($q) use ($s) {

            // Cari dari saran penilaian
            $q->where('saran_p', 'LIKE', "%{$s}%")

            // Cari dari user
            ->orWhereHas('user', function ($u) use ($s) {
                $u->where('nama', 'LIKE', "%{$s}%")
                  ->orWhere('email', 'LIKE', "%{$s}%")
                  ->orWhere('alamat', 'LIKE', "%{$s}%");
            })

            // Cari dari wisata
            ->orWhereHas('wisata', function ($w) use ($s) {
                $w->where('nama_w', 'LIKE', "%{$s}%")
                  ->orWhere('desk_w', 'LIKE', "%{$s}%");
            });

        });
    })
    ->orderBy('id', 'desc')
    ->paginate(7);
        return view('admin.penilaian.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        // return view('admin.crud_tamplate.create-update-show');

    }

    // Simpan data baru
    public function store(Request $request)
    {
       
      
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Penilaian::where('id', $id)->first();
        $detail = DetailPenilaian::where('penilaian_id', $id)->first();
        // dd($detail);
       return view('admin.penilaian.create-update-show',compact('data','detail'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
    //    return view('admin.crud_tamplate.create-update-show');
    }

    // Update data
    public function update(Request $request, $id)
    {
        
    }

    // Hapus data
    public function destroy($id)
    {
        
    }
}
