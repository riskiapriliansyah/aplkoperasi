<?php

namespace App\Http\Livewire\Kas;

use App\Models\Kas;
use Livewire\Component;

class KasIndex extends Component
{
    public $addMode = false;
    public $updateMode = false;

    protected $listeners = [
        'created' => 'itemCreated',
        'updated' => 'itemUpdated',
    ];

    public function add()
    {
        $this->addMode = true;
    }
    public function itemCreated()
    {
        session()->flash('sukses', 'Berhasil ditambahkan');
        $this->addMode = false;
    }

    public function getItem($id)
    {
        $this->updateMode = true;
        $kas = Kas::find($id);
        $this->emit('getItem', $kas);
    }
    public function itemUpdated()
    {
        session()->flash('sukses', 'Berhasil diperbarui');
        $this->updateMode = false;
    }

    public function render()
    {
        $kas = Kas::orderBy('tgl', 'DESC')->get()->take(30);
        $saldo = $kas->sum('ntag');
        $pemasukan = $kas->where('jenis', 'I')->sum('nilai');
        $pengeluaran = $kas->where('jenis', 'O')->sum('nilai');
        return view('livewire.kas.kas-index', [
            'kas' => $kas,
            'saldo' => $saldo,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
        ]);
    }
}
