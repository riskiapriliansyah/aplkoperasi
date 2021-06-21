<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class KategoriCreate extends Component
{
    public $kategori, $jenis;

    public function mount($jenis)
    {
        $this->jenis = $jenis;
    }
    public function create()
    {
        $this->validate([
            'kategori' => 'required',
        ]);
        Kategori::create([
            'kategori' => $this->kategori,
            'jenis' => $this->jenis,
        ]);
        $this->emit('created');
    }
    public function render()
    {
        return view('livewire.kategori.kategori-create');
    }
}
