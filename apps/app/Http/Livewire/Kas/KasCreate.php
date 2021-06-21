<?php

namespace App\Http\Livewire\Kas;

use App\Models\Kas;
use App\Models\Kategori;
use Livewire\Component;

class KasCreate extends Component
{
    public $kategori_id, $ket, $nilai, $jenis, $tgl, $kategori, $no_bukti;

    public function create()
    {
        //dd($this->kategori_id);
        $this->validate([
            'ket' => 'required',
            'nilai' => 'required',
            'jenis' => 'required',
            'tgl' => 'required',
        ]);


        $kas =  Kas::create([
            'ket' => $this->ket,
            'kategori_id' => $this->kategori_id,
            'nilai' => $this->nilai,
            'jenis' => $this->jenis,
            'tgl' => $this->tgl,
            'ntag' => $this->jenis == 'I' ? $this->nilai * 1 : $this->nilai * -1,
            'no_bukti' => $this->no_bukti,
        ]);


        $this->emit('created');
    }

    public function render()
    {
        $kategoris = Kategori::all();
        return view('livewire.kas.kas-create', [
            'kategoris' => $kategoris,
        ]);
    }
}
