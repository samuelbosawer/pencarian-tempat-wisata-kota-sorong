<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Kriteria::whereNotNull('kriteria')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('kriteria', 'LIKE', '%' . $s . '%')
                        ->orWhere('bobot', 'LIKE', '%' . $s . '%')
                        ->orWhere('jenis', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.kriteria.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.kriteria.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kriteria'            => 'required|string|max:255',
            'bobot'            => 'required|numeric',
            'jenis'            => 'required|string|max:255',
        ],  [
            'kriteria.required' => 'Nama kriteria lengkap wajib diisi.',
            'bobot.required' => ' Bobot lengkap wajib diisi.',
            'bobot.numeric' => ' Bobot harus angka',
            'jenis.required' => ' Jenis lengkap wajib diisi.',
        ]);


        // Create user
        $user = Kriteria::create([
            'kriteria'          => $validated['kriteria'],
            'bobot'          => $validated['bobot'],
            'jenis'          => $validated['jenis'],
        ]);

        Alert::success('Berhasil', 'Data kriteria berhasil ditambahkan');
        return redirect()->route('dashboard.kriteria');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Kriteria::where('id', $id)->first();
        $judul = 'Detail Data Kriteria';
        return view('admin.kriteria.create-update-show', compact('data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = Kriteria::where('id', $id)->first();
        $judul = 'Ubah Data Kriteria';
        return view('admin.kriteria.create-update-show', compact('data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {

        $kriteria = Kriteria::findOrFail($id);
        $validated = $request->validate([
            'kriteria'            => 'required|string|max:255',
            'bobot'            => 'required|numeric',
            'jenis'            => 'required|string|max:255',
        ],  [
            'kriteria.required' => 'Nama kriteria lengkap wajib diisi.',
            'bobot.required' => ' Bobot lengkap wajib diisi.',
            'bobot.numeric' => ' Bobot harus angka',
            'jenis.required' => ' Jenis lengkap wajib diisi.',
        ]);


        $kriteria->update([
            'kriteria'          => $validated['kriteria'],
            'bobot'          => $validated['bobot'],
            'jenis'          => $validated['jenis'],
        ]);

        Alert::success('Berhasil', 'Data kriteria berhasil diubah');
        return redirect()->route('dashboard.kriteria');
    }

    // Hapus data
    public function destroy($id)
    {

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        Alert::success('Berhasil', 'Data kriteria berhasil dihapus');
        return redirect()->route('dashboard.kriteria');
    }
}
