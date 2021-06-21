<?php

namespace App\Http\Livewire\Laporan;

use App\Exports\LaporansExport;
use App\Models\Config;
use App\Models\Kas;
use App\Models\Kategori;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LaporanIndex extends Component
{
    public $showMode = false;
    public $tgl_awal, $tgl_akhir, $kategori_id, $kategori, $laporans, $sumDebit, $sumKredit, $sumSaldoAwal, $sumSaldoAkhir, $bank;

    public function show()
    {
        $this->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'kategori_id' => 'required',
            'bank' => 'required',
        ]);
        if ($this->kategori_id == 'all' and $this->bank == 'all') {
            $laporan = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('jenis', 'I')->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('jenis', 'O')->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $this->tgl_awal)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $this->kategori = "SEMUA KATEGORI";
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
        } else if ($this->kategori_id == 'all') {
            $laporan = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('bank', $this->bank)->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('jenis', 'I')->where('bank', $this->bank)->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('jenis', 'O')->where('bank', $this->bank)->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $this->tgl_awal)->where('bank', $this->bank)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $this->kategori = "SEMUA KATEGORI";
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
        } else if ($this->bank == 'all') {
            $laporan = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('kategori_id', $this->kategori_id)->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('jenis', 'I')->where('kategori_id', $this->kategori_id)->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('jenis', 'O')->where('kategori_id', $this->kategori_id)->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $this->tgl_awal)->where('kategori_id', $this->kategori_id)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $kategori = Kategori::find($this->kategori_id)->kategori;
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
        } else {
            $laporan = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('kategori_id', $this->kategori_id)->where('bank', $this->bank)->orderBy('tgl', 'ASC')->get();
            $debit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('kategori_id', $this->kategori_id)->where('bank', $this->bank)->where('jenis', 'I')->orderBy('tgl', 'ASC')->get();
            $kredit = Kas::whereBetween('tgl', [$this->tgl_awal, $this->tgl_akhir])->where('kategori_id', $this->kategori_id)->where('bank', $this->bank)->where('jenis', 'O')->orderBy('tgl', 'ASC')->get();
            $saldoAwal = Kas::where('tgl', '<', $this->tgl_awal)->where('kategori_id', $this->kategori_id)->where('bank', $this->bank)->get();
            $sumSaldoAwal = $saldoAwal->sum('ntag');
            $sumDebit = $debit->sum('nilai');
            $sumKredit = $kredit->sum('nilai');
            $kategori = Kategori::find($this->kategori_id)->kategori;
            $this->kategori = $kategori;
        }
        $this->sumSaldoAwal = $sumSaldoAwal;
        $this->showMode = true;
        $this->laporans = $laporan;
        $this->sumDebit = $sumDebit + $sumSaldoAwal;
        $this->sumKredit = $sumKredit;
        $this->sumSaldoAkhir = $this->sumDebit - $sumKredit;
        $this->emit('showed', [$laporan, $this->sumSaldoAwal, $this->sumDebit, $this->sumKredit, $this->sumSaldoAkhir]);
    }


    public function exportExcel($laporans)
    {
        // return  Excel::download(new LaporansExport($laporans, $this->sumSaldoAwal, $this->tgl_awal, $this->bank), 'laporan.xlsx');
        return  Excel::download(new LaporansExport($this->laporans, $this->sumSaldoAwal, $this->sumDebit, $this->sumKredit, $this->sumSaldoAkhir, $this->tgl_awal), 'laporan.xlsx');
    }
    public function render()
    {
        $kategoris = Kategori::all();
        $banks = Config::where('key', 'bank')->pluck('val1');
        return view('livewire.laporan.laporan-index', [
            'kategori' => $this->kategori,
            'sumSaldoAwal' => $this->sumSaldoAwal,
            'sumSaldoAkhir' => $this->sumSaldoAkhir,
            'sumKredit' => $this->sumKredit,
            'sumDebit' => $this->sumDebit,
            'laporans' => $this->laporans,
            'kategoris' => $kategoris,
            'banks' => $banks,
        ]);
    }
}
