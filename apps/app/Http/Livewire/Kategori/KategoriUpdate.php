<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class KategoriUpdate extends Component
{
    public $kategori, $kategori_id, $jenis;

    protected $listeners = [
        'getItem' => 'showItem',
    ];

    public function showItem($kategori)
    {
        $this->kategori_id = $kategori['id'];
        $this->kategori = $kategori['kategori'];
        $this->jenis = $kategori['jenis'];
    }

    public function update()
    {
        $kategori = Kategori::find($this->kategori_id);
        $this->validate([
            'kategori' => 'required',
        ]);

        $kategori->update([
            'kategori' => $this->kategori,
        ]);
        $this->emit('updated');
    }
    public function render()
    {
        return view('livewire.kategori.kategori-update');
    }
}
