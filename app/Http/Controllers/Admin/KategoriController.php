<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = KategoriWisata::whereNotNull('nama_ktg')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nama_ktg', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.kategori.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.kategori.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ktg'            => 'required|string|max:255',
        ],  [
            'nama_ktg.required' => 'Nama Kategori lengkap wajib diisi.',
        ]);



        // Create user
        $user = KategoriWisata::create([
            'nama_ktg'          => $validated['nama_ktg'],
        ]);


        Alert::success('Berhasil', 'Data kategori wisata berhasil ditambahkan');
        return redirect()->route('dashboard.kategori');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $judul = 'Detail Data Kategori Wisata';
        $data = KategoriWisata::where('id', $id)->first();
        return view('admin.kategori.create-update-show', compact('judul', 'data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $judul = 'Ubah Data Kategori Wisata';
        $data = KategoriWisata::where('id', $id)->first();
        return view('admin.kategori.create-update-show', compact('judul', 'data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $kategori = KategoriWisata::findOrFail($id);

        $validated = $request->validate([
            'nama_ktg'            => 'required|string|max:255',
        ],  [
            'nama_ktg.required' => 'Nama Kategori lengkap wajib diisi.',
        ]);

        // Update data kategori
        $kategori->update([
            'nama_ktg'          => $validated['nama_ktg'],
        ]);

        Alert::success('Berhasil', 'Data kategori wisata berhasil diperbarui');
        return redirect()->route('dashboard.kategori');
    }

    // Hapus data
    public function destroy($id)
    {
        $kategori = KategoriWisata::findOrFail($id);
        $kategori->delete();
        Alert::success('Berhasil', 'Data kategori wisata berhasil dihapus');
        return redirect()->route('dashboard.kategori');
    }
}
