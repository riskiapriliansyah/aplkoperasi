<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnggotaExport implements FromView
{
    public function __construct($anggotas)
    {
        $this->anggotas = $anggotas;
    }
    public function view(): View
    {
        //dd($this->laporans);
        return view('anggota.cetak', [
            'list_anggota' => $this->anggotas,
        ]);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
    }
}
