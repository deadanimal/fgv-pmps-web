<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PengurusanPenggunaController extends Controller
{
    public function index()
    {
        $jumlah_petugas = count(User::all());
        $petugas = User::all();
        return view('pengurusanPengguna.petugas', [
            'jum_petugas' => $jumlah_petugas,
            'petugas' => $petugas
        ]);
    }

    public function daftar()
    {
        $roles = Role::all();
        return view('pengurusanPengguna.create', [
            'peranan' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $pengguna = new User;
        $pengguna->name = $request->name;
        $pengguna->no_kakitangan = $request->no_kakitangan;
        $pengguna->email = $request->email;
        $pengguna->tel_pengguna = $request->tel_pengguna;
        $pengguna->lokaliti = $request->lokaliti;
        $pengguna->blok = $request->blok;
        $pengguna->peranan_pengguna = $request->peranan_pengguna;
        $pengguna->password = Hash::make('PNSB1234');

        return redirect('/pengurusan_pengguna');
    }

    public function edit($id)
    {
        $pengguna = User::find($id);
        $roles = Role::all();
        return view('pengurusanPengguna.edit', [
            'p' => $pengguna,
            'peranan' => $roles
        ]);
    }

    public function laporan()
    {
        return view('pengurusanPengguna.laporan');
    }

    public function maklumat()
    {
        return view('pengurusanPengguna.maklumat');
    }

}
