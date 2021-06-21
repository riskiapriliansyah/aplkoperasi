<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kas;
use Livewire\Component;

class KategorisIndex extends Component
{
    public $addMode = false;
    public $updateMode = false;
    public $kategori;

    protected $listeners = [
        'created' => 'itemCreated',
        'updated' => 'itemUpdated',
    ];

    public function mount($kategori)
    {
        $this->kategori = $kategori;
    }
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

    public function deleteItem($id)
    {
        $kas = Kas::find($id);
        $kas->delete();
        session()->flash('sukses', 'Berhasil dihapus');
    }
    public function render()
    {
        $kas = Kas::where('kategori_id', $this->kategori->id)->orderBy('created_at', 'DESC')->get();
        $pemasukan = $kas->where('jenis', 'I')->sum('nilai');
        $pengeluaran = $kas->where('jenis', 'O')->sum('nilai');
        $saldo = $kas->sum('ntag');
        return view('livewire.kategori.kategoris-index', [
            'kas' => $kas,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo' => $saldo,
        ]);
    }
}
