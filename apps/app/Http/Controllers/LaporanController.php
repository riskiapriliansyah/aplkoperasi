<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function pdf(Request $request)
    {
        if ($request->kategori_id == 'all' and $request->bank == 'all') {
            $laporan = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('jenis', 'I')->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('jenis', 'O')->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $request->tgl_awal)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $request->kategori = "SEMUA KATEGORI";
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
        } else if ($request->kategori_id == 'all') {
            $laporan = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('bank', $request->bank)->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('jenis', 'I')->where('bank', $request->bank)->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('jenis', 'O')->where('bank', $request->bank)->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $request->tgl_awal)->where('bank', $request->bank)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $request->kategori = "SEMUA KATEGORI";
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
        } else if ($request->bank == 'all') {
            $laporan = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('kategori_id', $request->kategori_id)->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('jenis', 'I')->where('kategori_id', $request->kategori_id)->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('jenis', 'O')->where('kategori_id', $request->kategori_id)->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $request->tgl_awal)->where('kategori_id', $request->kategori_id)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $kategori = Kategori::find($request->kategori_id)->kategori;
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
        } else {
            $laporan = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('kategori_id', $request->kategori_id)->where('bank', $request->bank)->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('kategori_id', $request->kategori_id)->where('bank', $request->bank)->where('jenis', 'I')->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->where('kategori_id', $request->kategori_id)->where('bank', $request->bank)->where('jenis', 'O')->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $request->tgl_awal)->where('kategori_id', $request->kategori_id)->where('bank', $request->bank)->get();
            $saldoAwal = '200000';
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
            $kategori = Kategori::find($request->kategori_id)->kategori;
            $request->kategori = $kategori;
        }
        $sumDebit = $sumDebit + $sumSaldoAwal;
        $sumSaldoAkhir = $sumDebit - $sumKredit;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $bank = $request->bank;
        return view('laporan.cetak', compact('sumSaldoAwal', 'laporan', 'sumDebit', 'sumKredit', 'sumSaldoAkhir', 'tgl_awal', 'tgl_akhir', 'bank'));
    }
}
