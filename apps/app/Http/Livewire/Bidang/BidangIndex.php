<?php

namespace App\Http\Livewire\Bidang;

use App\Models\Bidang;
use Livewire\Component;
use Livewire\WithPagination;

class BidangIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $addMode = false;
    public $updateMode = false;
    public $filter = 10;
    public $search;

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
        $bidang = Bidang::find($id);
        $this->emit('getItem', $bidang);
    }
    public function itemUpdated()
    {
        session()->flash('sukses', 'Berhasil diperbarui');
        $this->updateMode = false;
    }

    public function deleteItem($id)
    {
        $bidang = Bidang::find($id);
        $bidang->delete();
        session()->flash('sukses', 'Data telah dihapus');
    }

    public function render()
    {
        $bidangs = Bidang::paginate($this->filter);
        $search = Bidang::where('bidang', 'LIKE', '%' . $this->search . '%')->paginate($this->filter);
        return view('livewire.bidang.bidang-index', [
            'bidangs' => $this->search == null ? $bidangs : $search,
        ]);
    }
}
