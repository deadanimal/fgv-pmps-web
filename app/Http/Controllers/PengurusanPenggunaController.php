<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function edit()
    {
        return view('pengurusanPengguna.edit');
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
