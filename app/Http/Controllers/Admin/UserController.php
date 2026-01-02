<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = User::whereNotNull('nama')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nama', 'LIKE', '%' . $s . '%')
                        ->orWhere('alamat', 'LIKE', '%' . $s . '%')
                        ->orWhere('tempat_lahir', 'LIKE', '%' . $s . '%')
                        ->orWhere('tanggal_lahir', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.user.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('admin.user.create-update-show', compact('roles'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'tempat_lahir'    => 'required|string|max:255',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'password'        => 'required|string|min:6|confirmed',
            'role'            => 'required|string|exists:roles,name',
        ],  [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'role.required' => 'Role akses wajib dipilih.',
            'role.exists' => 'Role yang dipilih tidak valid.',
        ]);


        if ($request->role === 'admin') {
            abort(403);
        }

        // Create user
        $user = User::create([
            'nama'          => $validated['nama'],
            'email'         => $validated['email'],
            'tempat_lahir'  => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat'        => $validated['alamat'],
            'password'      => Hash::make($validated['password']),
        ]);

        // Assign role (Spatie)
        $user->assignRole($validated['role']);

        Alert::success('Berhasil', 'Data user berhasil ditambahkan');
        return redirect()->route('dashboard.user');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        $judul = 'Detail Data User';
        $data = User::where('id', $id)->first();
        return view('admin.user.create-update-show', compact('roles', 'judul', 'data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        $judul = 'Ubah Data User';
        $data = User::where('id', $id)->first();
        return view('admin.user.create-update-show', compact('roles', 'judul', 'data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate(
            [
                'nama'            => 'required|string|max:255',
                'email'           => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'tempat_lahir'    => 'required|string|max:255',
                'tanggal_lahir'   => 'required|date',
                'alamat'          => 'required|string',
                'password'        => 'nullable|string|min:6|confirmed',
                'role'            => 'required|string|exists:roles,name',
            ],
            [
                'nama.required' => 'Nama lengkap wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
                'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
                'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
                'alamat.required' => 'Alamat wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',
                'role.required' => 'Role akses wajib dipilih.',
                'role.exists' => 'Role yang dipilih tidak valid.',
            ]
        );

        // Update data user
        $user->update([
            'nama'          => $validated['nama'],
            'email'         => $validated['email'],
            'tempat_lahir'  => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat'        => $validated['alamat'],
        ]);

        // Update password jika diisi
        if (!empty($validated['password'])) {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        // Update role
        $user->syncRoles([$validated['role']]);

        Alert::success('Berhasil', 'Data user berhasil diperbarui');
        return redirect()->route('dashboard.user');
    }

    // Hapus data
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Proteksi user admin (opsional tapi disarankan)
        if ($user->hasRole('admin')) {
            Alert::error('Gagal', 'User admin tidak dapat dihapus');
            return redirect()->route('dashboard.user');
        }

        $user->delete();

        Alert::success('Berhasil', 'Data user berhasil dihapus');
        return redirect()->route('dashboard.user');
    }
}
