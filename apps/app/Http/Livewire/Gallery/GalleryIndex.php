<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use File;
use Livewire\WithPagination;

class GalleryIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $filter = 10;
    public $addMode = false;
    public $updateMode = false;
    public $search;

    public function add()
    {
        $this->addMode = true;
    }

    public function getItem($id)
    {
        $this->updateMode = true;
        $gallery = Gallery::find($id);
        $this->emit('getItem', $gallery);
    }

    public function deleteItem($id)
    {
        $gallery = Gallery::find($id);
        if (isset($gallery->foto)) {
            \File::delete('public/gallery/' . $gallery->foto);
        }
        $gallery->delete();
        session()->flash('sukses', 'Berhasil dihapus');
    }

    public function render()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate($this->filter);
        $search = Gallery::where('ket', 'LIKE', '%' . $this->search . '%')->paginate($this->filter);
        return view('livewire.gallery.gallery-index', [
            'galleries' => $this->search == null ? $galleries : $search,
        ]);
    }
}
