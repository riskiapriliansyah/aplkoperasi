<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Config;
use App\Models\Kas;
use Livewire\Component;

class KategorisUpdate extends Component
{
    public $kas_id, $ket, $nilai, $jenis, $tgl, $kategori_id, $kategori, $no_bukti, $bank;

    protected $listeners = [
        'getItem' => 'showItem',
    ];

    public function mount($kategori)
    {
        $this->kategori = $kategori;
    }


    public function showItem($kas)
    {
        $this->kas_id = $kas['id'];
        $this->bank = $kas['bank'];
        $this->kategori_id = $kas['kategori_id'];
        $this->ket = $kas['ket'];
        $this->nilai = $kas['nilai'];
        $this->jenis = $kas['jenis'];
        $this->no_bukti = $kas['no_bukti'];
    }
    public function update()
    {
        $kas = Kas::find($this->kas_id);
        $kas->update([
            'bank' => $this->bank,
            'ket' => $this->ket,
            'nilai' => $this->nilai,
            'jenis' => $this->jenis,
            'ntag' => $this->jenis == 'I' ? $this->nilai * 1 : $this->nilai * -1,
            'no_bukti' => $this->no_bukti,
        ]);
        $this->emit('updated');
    }
    public function render()
    {
        $banks = Config::where('key', 'bank')->pluck('val1');
        return view('livewire.kategori.kategoris-update', [
            'banks' => $banks,
        ]);
    }
}
