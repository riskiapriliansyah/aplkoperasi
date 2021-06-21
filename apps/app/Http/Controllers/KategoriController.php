<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index');
    }
    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }
    public function indexEvent()
    {
        return view('kategori.event');
    }
    public function showEvent(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }
}
