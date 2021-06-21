<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all();
        $rKegiatans = Kegiatan::latest()->take(6)->get();
        return view('kegiatan.index', compact('kegiatans'));
    }
    public function edit(Kegiatan $kegiatan, Request $request)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }
    public function store(Request $request)
    {
        $random = Str::random(10);
        $input = $request->all();
        $input['slug'] = Str::slug($request->judul . '-' . $random);
        if ($request->hasFile('foto')) {
            $foto = $request->foto;
            $nama_file = time() . $request->ket . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(700, 400)->save('public/xkegiatan/' . $nama_file);
            $input['foto'] = $nama_file;
        }
        Kegiatan::create($input);
        return redirect()->route('admin.kegiatan')->with('sukses', 'Berhasil disimpan');
    }

    public function update(Kegiatan $kegiatan, Request $request)
    {
        $random = Str::random(10);
        $kegiatan->judul = $request->judul;
        $kegiatan->slug = Str::slug($request->judul . '-' . $random);
        if ($request->hasFile('foto')) {
            \File::delete('public/xkegiatan/' . $kegiatan->foto);
            $foto = $request->foto;
            $nama_file = time() . $request->ket . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(700, 400)->save('public/xkegiatan/' . $nama_file);
            $kegiatan->foto = $nama_file;
        }
        $kegiatan->content = $request->content;
        $kegiatan->status = $request->status;
        $kegiatan->update();
        return redirect()->route('admin.kegiatan')->with('sukses', 'Berhasil diubah');
    }

    public function delete(Kegiatan $kegiatan)
    {
        if (isset($kegiatan->foto)) {
            \File::delete('public/xkegiatan/' . $kegiatan->foto);
        }
        $kegiatan->delete();
        return redirect()->back()->with('sukses', 'Berhasil dihapus');
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '-' . time() . '.' . $extension;
            $foto = $request->upload;
            $foto->move('public/gallery/', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('xkegiatan/' . $fileName);
            $msg = 'Image Uploaded Successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url') </script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
