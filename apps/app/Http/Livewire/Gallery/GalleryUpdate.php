<?php

namespace App\Http\Livewire\Gallery;

use Livewire\Component;

class GalleryUpdate extends Component
{
    public $gallery_id, $ket;

    protected $listeners = [
        'getItem' => 'showItem',
    ];

    // public function showItem($gallery)
    // {
    //     dd($gallery);
    //     $this->kategori_id = $kategori['id'];
    //     $this->kategori = $kategori['kategori'];
    //     $this->jenis = $kategori['jenis'];
    // }

    public function render()
    {
        return view('livewire.gallery.gallery-update');
    }
}
