<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use File;

class ConfigController extends Controller
{
    public function index()
    {
        return view('config.index');
    }
    public function indexWeb()
    {
        return view('config.indexWeb');
    }

    public function updateWeb(Request $request)
    {
        $visi = Config::where('key', 'visi')->first();
        $visi->update([
            'val1' => $request->visi,
        ]);
        $misi = Config::where('key', 'misi')->first();
        $misi->update([
            'val1' => $request->misi,
        ]);
        $sejarah = Config::where('key', 'sejarah')->first();
        $sejarah->update([
            'val1' => $request->sejarah,
        ]);
        $alamat = Config::where('key', 'alamat')->first();
        $alamat->update([
            'val1' => $request->alamat,
        ]);
        $alamat = Config::where('key', 'struktur')->first();
        if ($request->has('file')) {
            \File::delete('public/pdfjs/' . $alamat->val1);
            $file = $request->file;
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $file->move('public/pdfjs/', $nama_file);
        }
        $alamat->update([
            'val1' => $nama_file,
        ]);

        return redirect()->route('admin.config.web')->with('sukses', 'Berhasil diubah');
    }
}
