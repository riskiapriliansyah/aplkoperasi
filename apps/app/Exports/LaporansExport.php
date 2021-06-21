<?php

namespace App\Exports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class LaporansExport implements WithMapping, FromCollection, WithHeadings
class LaporansExport implements FromView
{
    public function __construct($laporans, $sumSaldoAwal, $sumDebit, $sumKredit, $sumSaldoAkhir, $tgl_awal)
    {
        $this->tgl_awal = $tgl_awal;
        $this->laporans = $laporans;
        $this->sumSaldoAwal = $sumSaldoAwal;
        $this->sumDebit = $sumDebit;
        $this->sumKredit = $sumKredit;
        $this->sumSaldoAkhir = $sumSaldoAkhir;
    }
    public function view(): View
    {
        //dd($this->laporans);
        return view('livewire.laporan.laporan-export', [
            'tgl_awal' => $this->tgl_awal,
            'laporans' => $this->laporans,
            'sumSaldoAwal' => $this->sumSaldoAwal,
            'sumDebit' => $this->sumDebit,
            'sumKredit' => $this->sumKredit,
            'sumSaldoAkhir' => $this->sumSaldoAkhir,
        ]);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function __construct(array $laporans, $sumSaldoAwal, $tgl_awal, $bank)
    // {
    //     $this->tgl_awal = $tgl_awal;
    //     $this->sumSaldoAwal = $sumSaldoAwal;
    //     $this->bank = $bank;
    //     $this->laporans = $laporans;
    // }

    // public function collection()
    // {
    //     return collect($this->laporans);
    // }
    // public function map($laporans): array
    // {
    //     $kategori = Kategori::where('id', $laporans['kategori_id'])->first();
    //     if ($laporans['jenis'] == 'I') {
    //         $debit = $laporans['nilai'];
    //         $kredit = '-';
    //     } else if ($laporans['jenis'] == 'O') {
    //         $kredit = $laporans['nilai'];
    //         $debit = '-';
    //     }
    //     $tgl = date('d/m/Y', strtotime($laporans['tgl']));

    //     return [
    //         $tgl,
    //         $laporans['bank'],
    //         $kategori['kategori'],
    //         $laporans['ket'],
    //         $laporans['no_bukti'],
    //         $debit,
    //         $kredit,
    //     ];
    // }
    // public function headings(): array
    // {
    //     return [
    //         'Tanggal',
    //         'Bank',
    //         'Kategori',
    //         'Keterangan',
    //         'No Bukti',
    //         'Debit',
    //         'Kredit',
    //     ];
    // }
}
