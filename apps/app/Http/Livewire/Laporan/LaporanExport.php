<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class LaporanExport extends Component
{
    public $laporan, $sumSaldoAwal, $sumDebit, $sumKredit, $sumSaldoAkhir;
    protected $listeners = [
        'showed',
    ];

    public function showed($laporan, $sumSaldoAwal, $sumDebit, $sumKredit, $sumSaldoAkhir)
    {
        $this->laporan = $laporan;
        $this->sumSaldoAwal = $sumSaldoAwal;
        dd($this->sumSaldoAwal);
        $this->sumDebit = $sumDebit;
        $this->sumKredit = $sumKredit;
        $this->sumSaldoAkhir = $sumSaldoAkhir;
    }
    public function render()
    {
        $laporans = $this->laporan;
        return view('livewire.laporan.laporan-export', [
            'laporans' => $laporans,
        ]);
    }
}
