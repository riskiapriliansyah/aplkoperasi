<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class LaporanShow extends Component
{
    public $laporan;

    protected $listeners = [
        'showed',
    ];

    public function showed($laporan)
    {
        $this->laporan = $laporan;
        //dd($this->laporan);
    }

    public function render()
    {
        $laporans = $this->laporan;
        //dd($laporans);
        return view('livewire.laporan.laporan-show', [
            'laporans' => $laporans,
        ]);
    }
}
