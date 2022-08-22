<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $pengguna->ic_pengguna = $request->ic_pengguna;
        $pengguna->email = $request->email;
        $pengguna->tel_pengguna = $request->tel_pengguna;
        $pengguna->lokaliti = $request->lokaliti;
        $pengguna->blok = $request->blok;
        $pengguna->kategori_petugas = $request->kategori_petugas;
        $pengguna->peranan_pengguna = $request->peranan_pengguna;
        $pengguna->password = Hash::make('PNSB1234');
        $pengguna->created_by = Auth::id();
        $pengguna->save();
        $pengguna->syncRoles([$request->peranan_pengguna]);

        return redirect('/pengurusan_pengguna/petugas');
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

    public function update(Request $request, $id)
    {
        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->no_kakitangan = $request->no_kakitangan;
        $pengguna->ic_pengguna = $request->ic_pengguna;
        $pengguna->email = $request->email;
        $pengguna->tel_pengguna = $request->tel_pengguna;
        $pengguna->lokaliti = $request->lokaliti;
        $pengguna->blok = $request->blok;
        $pengguna->kategori_petugas = $request->kategori_petugas;
        $pengguna->peranan_pengguna = $request->peranan_pengguna;
        $pengguna->jangka_hayat_laluan = $request->jangka_hayat_laluan;
        $pengguna->password = Hash::make($request->password);
        $pengguna->modified_by = Auth::id();
        $pengguna->save();
        $pengguna->syncRoles($request->peranan_pengguna);

        return redirect('/pengurusan_pengguna/petugas');
    }

    public function destroy($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();
        return redirect('/pengurusan_pengguna/petugas');
    }

    public function filter()
    {
        $no_kakitangan = $_GET['no_kakitangan'];
        $pengguna = User::where('no_kakitangan', 'LIKE', '%'.$no_kakitangan.'%')->get();

        return response()->json($pengguna);
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
