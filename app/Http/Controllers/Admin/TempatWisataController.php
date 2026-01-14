<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TempatWisataController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Wisata::with(['user', 'kategoriWisata'])
            ->whereNotNull('nama_w')

            // 🔐 FILTER JIKA ROLE = USAHA
            ->when(Auth::user()->hasRole('usaha'), function ($query) {
                $query->where('user_id', Auth::user()->id);
            })

            // 🔍 SEARCH
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nama_w', 'LIKE', "%{$s}%")
                        ->orWhere('desk_w', 'LIKE', "%{$s}%")
                        ->orWhereHas('user', function ($u) use ($s) {
                            $u->where('nama', 'LIKE', "%{$s}%");
                        })
                        ->orWhereHas('kategoriWisata', function ($k) use ($s) {
                            $k->where('nama_ktg', 'LIKE', "%{$s}%");
                        });
                });
            })

            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.wisata.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        $kategoris = KategoriWisata::orderBy('id', 'desc')->get();

        $users = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'admin')
                ->orWhere('name', 'pengunjung');
        })

            // 🔐 JIKA LOGIN SEBAGAI USAHA → HANYA DIRI SENDIRI
            ->when(Auth::user()->hasRole('usaha'), function ($query) {
                $query->where('id', Auth::user()->id);
            })

            ->orderBy('id', 'asc')
            ->get();

        return view('admin.wisata.create-update-show', compact('kategoris', 'users'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        // Validasi (Bahasa Indonesia)
        $validated = $request->validate(
            [
                'nama_w' => 'required|string|max:255',
                'kategori_wisata_id' => 'required|exists:kategori_wisatas,id',
                'user_id' => 'required|exists:users,id',
                'desk_w' => 'required|string',
                'gambar_w' => 'nullable|string', // base64 image
            ],
            [
                'nama_w.required' => 'Nama tempat wajib diisi',
                'kategori_wisata_id.required' => 'Kategori wisata wajib dipilih',
                'user_id.required' => 'User wajib dipilih',
                'desk_w.required' => 'Deskripsi wajib diisi',
            ]
        );

        // Simpan gambar hasil crop/resize
        if ($request->gambar_w) {
            $image = $request->gambar_w;

            // Pisahkan base64
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'wisata_' . time() . '.jpg';

            $path = public_path('wisata');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            file_put_contents($path . '/' . $fileName, base64_decode($image));

            $validated['gambar_w'] = 'wisata/' . $fileName;
        }

        Wisata::create($validated);

        Alert::success('Berhasil', 'Data wisata berhasil ditambahkan');
        return redirect()->route('dashboard.wisata');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $kategoris = KategoriWisata::orderBy('id', 'desc')->get();
        $users = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'admin')
                ->orWhere('name', 'pengunjung');
        })

            // 🔐 JIKA LOGIN SEBAGAI USAHA → HANYA DIRI SENDIRI
            ->when(Auth::user()->hasRole('usaha'), function ($query) {
                $query->where('id', Auth::user()->id);
            })

            ->orderBy('id', 'asc')
            ->get();
        $data = Wisata::where('id', $id)->first();
        $judul = 'Detail Data Tempat Wisata';
        return view('admin.wisata.create-update-show', compact('kategoris', 'users', 'data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $kategoris = KategoriWisata::orderBy('id', 'desc')->get();
        $users = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'admin')
                ->orWhere('name', 'pengunjung');
        })

            // 🔐 JIKA LOGIN SEBAGAI USAHA → HANYA DIRI SENDIRI
            ->when(Auth::user()->hasRole('usaha'), function ($query) {
                $query->where('id', Auth::user()->id);
            })

            ->orderBy('id', 'asc')
            ->get();
        $data = Wisata::where('id', $id)->first();
        $judul = 'Detail Data Tempat Wisata';
        return view('admin.wisata.create-update-show', compact('kategoris', 'users', 'data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        // Validasi (Bahasa Indonesia)
        $validated = $request->validate(
            [
                'nama_w' => 'required|string|max:255',
                'kategori_wisata_id' => 'required|exists:kategori_wisatas,id',
                'user_id' => 'required|exists:users,id',
                'desk_w' => 'required|string',
                'gambar_w' => 'nullable|string', // base64 image
            ],
            [
                'nama_w.required' => 'Nama tempat wajib diisi',
                'kategori_wisata_id.required' => 'Kategori wisata wajib dipilih',
                'user_id.required' => 'User wajib dipilih',
                'desk_w.required' => 'Deskripsi wajib diisi',
            ]
        );

        // Jika ada gambar baru
        if ($request->filled('gambar_w')) {

            // Hapus gambar lama (jika ada & file exists)
            if ($wisata->gambar_w && Storage::disk('public')->exists($wisata->gambar_w)) {
                Storage::disk('public')->delete($wisata->gambar_w);
            }

            // Simpan gambar baru (base64)
            $image = $request->gambar_w;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'wisata_' . time() . '.jpg';

            $path = public_path('wisata');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            file_put_contents($path . '/' . $fileName, base64_decode($image));

            $validated['gambar_w'] = 'wisata/' . $fileName;
        }

        $wisata->update($validated);

        Alert::success('Berhasil', 'Data wisata berhasil diperbarui');
        return redirect()->route('dashboard.wisata');
    }

    // Hapus data
    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);

        // Hapus gambar jika ada
        if ($wisata->gambar_w && Storage::disk('public')->exists($wisata->gambar_w)) {
            Storage::disk('public')->delete($wisata->gambar_w);
        }

        $wisata->delete();

        Alert::success('Berhasil', 'Data wisata berhasil dihapus');
        return redirect()->route('dashboard.wisata');
    }
}
