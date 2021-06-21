<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Config;
use App\Models\Kas;
use App\Models\Kategori;
use Livewire\Component;

class KategorisCreate extends Component
{
    public $kategori_id, $ket, $nilai, $jenis, $tgl, $kategori, $no_bukti, $bank;

    public function mount($kategori)
    {
        $this->kategori = $kategori;
    }

    public function create()
    {
        //dd($this->kategori_id);
        $this->validate([
            'bank' => 'required',
            'ket' => 'required',
            'nilai' => 'required',
            'jenis' => 'required',
            'tgl' => 'required',
        ]);

        $kas =  Kas::create([
            'bank' => $this->bank,
            'ket' => $this->ket,
            'kategori_id' => $this->kategori->id,
            'nilai' => $this->nilai,
            'jenis' => $this->jenis,
            'tgl' => $this->tgl,
            'ntag' => $this->jenis == 'I' ? $this->nilai * 1 : $this->nilai * -1,
            'no_bukti' => $this->no_bukti == null ? '-' : $this->no_bukti,
        ]);


        $this->emit('created');
    }
    public function render()
    {
        $kategoris = Kategori::all();
        $banks = Config::where('key', 'bank')->pluck('val1');
        return view('livewire.kategori.kategoris-create', [
            'kategoris' => $kategoris,
            'banks' => $banks,
        ]);
    }
}
