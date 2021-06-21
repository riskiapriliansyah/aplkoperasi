<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Gallery;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->get();
        $sliders = Config::where('key', 'slider')->get();
        $slidersMini = Config::where('key', 'sliderMini')->get();
        $misi = Config::where('key', 'misi')->pluck('val1')->first();
        $visi = Config::where('key', 'visi')->pluck('val1')->first();
        $sejarah = Config::where('key', 'sejarah')->pluck('val1')->first();
        $alamat = Config::where('key', 'alamat')->pluck('val1')->first();
        $kegiatans = Kegiatan::take(6)->latest()->get();

        return view('home', compact('galleries', 'sliders', 'slidersMini', 'misi', 'visi', 'sejarah', 'alamat', 'kegiatans'));
    }
    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(20);

        return view('gallery', compact('galleries'));
    }
    public function kegiatan()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        $rKegiatans = Kegiatan::latest()->take(6)->get();
        return view('kegiatan', compact('kegiatans', 'rKegiatans'));
    }
    public function showKegiatan(Kegiatan $kegiatan)
    {
        $rKegiatans = Kegiatan::latest()->take(6)->get();
        return view('showKegiatan', compact('kegiatan', 'rKegiatans'));
    }

    public function sejarah()
    {
        $sejarah = Config::where('key', 'sejarah')->pluck('val1')->first();
        return view('sejarah', compact('sejarah'));
    }
    public function visiMisi()
    {
        $visi = Config::where('key', 'visi')->pluck('val1')->first();
        $misi = Config::where('key', 'misi')->pluck('val1')->first();
        return view('visimisi', compact('visi', 'misi'));
    }
    public function pdfViewer()
    {
        $valPdf = Config::where('key', 'struktur')->pluck('val1')->first();
        return view('strukturOrganisasi', compact('valPdf'));
    }
}
