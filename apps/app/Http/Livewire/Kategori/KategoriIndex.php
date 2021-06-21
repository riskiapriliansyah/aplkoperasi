<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;

class KategoriIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $addMode = false;
    public $updateMode = false;
    public $jenis;
    public $filter = 10;
    public $search;

    protected $listeners = [
        'created' => 'itemCreated',
        'updated' => 'itemUpdated',
    ];

    public function FunctionName($jenis)
    {
        $this->jenis = $jenis;
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
        $kategori = Kategori::find($id);
        $this->emit('getItem', $kategori);
    }
    public function itemUpdated()
    {
        session()->flash('sukses', 'Berhasil diperbarui');
        $this->updateMode = false;
    }

    public function render()
    {
        $kategoriEvents = Kategori::where('jenis', 'event')->paginate($this->filter);
        $searchEvents = Kategori::where('jenis', 'event')->where('kategori', 'LIKE', '%' . $this->search . '%')->paginate($this->filter);
        $kategoriUmum = Kategori::where('jenis', 'umum')->paginate($this->filter);
        $searchUmum = Kategori::where('jenis', 'umum')->where('kategori', 'LIKE', '%' . $this->search . '%')->paginate($this->filter);
        return view('livewire.kategori.kategori-index', [
            'kategoriEvents' => $this->search == null ? $kategoriEvents : $searchEvents,
            'kategoriUmum' => $this->search == null ? $kategoriUmum : $searchUmum,
        ]);
    }
}
