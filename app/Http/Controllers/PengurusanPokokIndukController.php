<?php

namespace App\Http\Controllers;

class PengurusanPokokIndukController extends Controller
{
    public function pokok()
    {
        return view('pengurusanPokokInduk.pokok.index');
    }

    public function daftarPokok()
    {
        return view('pengurusanPokokInduk.pokok.create');
    }

    public function editPokok()
    {
        return view('pengurusanPokokInduk.pokok.edit');
    }

    public function tandan()
    {
        return view('pengurusanPokokInduk.tandan.index');
    }

    public function daftarTandan()
    {
        return view('pengurusanPokokInduk.tandan.create');

    }

    public function MuatNaikDokumenTandan()
    {
        return view('pengurusanPokokInduk.tandan.muatNaikDokumen');
    }
}
