<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        return view('bidang.index');
    }
    public function show(Bidang $bidang)
    {
        return view('bidang.show', compact('bidang'));
    }
    public function store(Bidang $bidang, Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'jabatan' => 'required',
        ]);
        $anggota = Anggota::find($request->anggota_id);
        $anggota->bidang()->attach($bidang->id, ['jabatan' => $request->jabatan]);
        return redirect()->route('admin.bidang.show', $bidang->id)->with('sukses', 'Berhasil ditambahkan');
    }
    public function deleteBidang(Bidang $bidang, Anggota $anggota)
    {
        $anggota->bidang()->detach();
        return redirect()->route('admin.bidang.show', $bidang->id)->with('sukses', 'Berhasil dihapus');
    }
}
