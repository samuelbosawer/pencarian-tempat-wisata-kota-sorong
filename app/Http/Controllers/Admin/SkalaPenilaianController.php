<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkalaPenilaian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SkalaPenilaianController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = SkalaPenilaian::whereNotNull('nama_s')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nama_s', 'LIKE', '%' . $s . '%')
                        ->orWhere('nilai_s', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.skala.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.skala.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_s'            => 'required|string|max:255',
            'nilai_s'            => 'required|string|max:255',
        ],  [
            'nama_s.required' => 'Nama skala lengkap wajib diisi.',
            'nilai_s.required' => 'Nilai skala lengkap wajib diisi.',
        ]);



        // Create user
        $user = SkalaPenilaian::create([
            'nama_s'          => $validated['nama_s'],
            'nilai_s'          => $validated['nilai_s'],
        ]);


        Alert::success('Berhasil', 'Data skala penilaian berhasil ditambahkan');
        return redirect()->route('dashboard.skala');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $judul = 'Detail Skala Penilaian';
        $data = SkalaPenilaian::where('id', $id)->first();
        return view('admin.skala.create-update-show', compact('judul', 'data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $judul = 'Ubah Skala Penilaian';
        $data = SkalaPenilaian::where('id', $id)->first();
        return view('admin.skala.create-update-show', compact('judul', 'data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $skala = SkalaPenilaian::findOrFail($id);
        $validated = $request->validate([
            'nama_s'            => 'required|string|max:255',
            'nilai_s'            => 'required|string|max:255',
        ],  [
            'nama_s.required' => 'Nama skala lengkap wajib diisi.',
            'nilai_s.required' => 'Nilai skala lengkap wajib diisi.',
        ]);



        // Create user
        $skala->update([
            'nama_s'          => $validated['nama_s'],
            'nilai_s'          => $validated['nilai_s'],
        ]);


        Alert::success('Berhasil', 'Data skala penilaian berhasil diubah');
        return redirect()->route('dashboard.skala');
    }

    // Hapus data
    public function destroy($id)
    {
        $skala = SkalaPenilaian::findOrFail($id);
        $skala->delete();
        Alert::success('Berhasil', 'Data skala penilaian berhasil dihapus');
        return redirect()->route('dashboard.skala');
    }
}
