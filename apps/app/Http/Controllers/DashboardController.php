<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Config;
use App\Models\District;
use App\Models\Pendaftar;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $districts = District::where('regency_id', 6472)->orderBy('name', 'ASC')->pluck('name');
        foreach ($districts as $item) {
            $anggota[] = Anggota::where('district_domisili', $item)->count();
        };
        $anggotas = collect($anggota);
        //dd($cities);
        $sumNewPendaftar = Pendaftar::where('status', 0)->count();
        $sumAnggota = Anggota::where('status', 1)->count();
        $sumL = Anggota::where('jk', 'L')->count();
        $sumP = Anggota::where('jk', 'P')->count();
        $jk = collect([$sumL, $sumP]);
        $xpekerjaans = Config::where('key', 'pekerjaan')->pluck('val1');
        foreach ($xpekerjaans as $item) {
            $pekerjaan[] = Anggota::where('pekerjaan', $item)->count();
        };
        $pekerjaans = collect($pekerjaan);
        $xpendidikans = Config::where('key', 'pendidikan')->pluck('val1');
        foreach ($xpendidikans as $item) {
            $pendidikan[] = Anggota::where('pendidikan', $item)->count();
        };
        $pendidikans = collect($pendidikan);
        return view('admin.dashboard', compact('sumAnggota', 'sumNewPendaftar', 'districts', 'anggotas', 'jk', 'pekerjaans', 'xpekerjaans', 'pendidikans', 'xpendidikans'));
    }
}
