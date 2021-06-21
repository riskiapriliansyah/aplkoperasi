<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'ASC')->get();
        return view('gallery.index', compact('galleries'));
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.edit', compact('gallery'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ket' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg',
        ]);

        $input = $request->all();
        if ($request->hasFile('foto')) {
            $foto = $request->foto;
            $nama_file = time() . $request->ket . '.' . $foto->getClientOriginalExtension();
            $foto->move('public/gallery/', $nama_file);
            $input['foto'] = $nama_file;
        }
        Gallery::create($input);
        return redirect()->route('admin.gallery')->with('sukses', 'Berhasil disimpan');
    }

    public function update($id, Request $request)
    {
        $gallery = Gallery::find($id);
        $request->validate([
            'ket' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('foto')) {
            \File::delete('public/gallery/' . $gallery->foto);
            $foto = $request->foto;
            $nama_file = time() . $request->ket . '.' . $foto->getClientOriginalExtension();
            $foto->move('public/gallery/', $nama_file);
            $gallery->foto = $nama_file;
        }
        $gallery->ket = $request->ket;
        $gallery->update();
        return redirect()->route('admin.gallery')->with('sukses', 'Berhasil diubah');
    }
}
