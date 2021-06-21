<?php

namespace App\Http\Livewire\Pendaftaran;

use App\Models\Pendaftar;
use Livewire\Component;

class PendaftaranIndex extends Component
{
    public function deleteItem($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();
        session()->flash('sukses', 'Data dihapus');
    }

    public function render()
    {
        $list_pendaftar = Pendaftar::paginate(10);
        return view('livewire.pendaftaran.pendaftaran-index', [
            'list_pendaftar' => $list_pendaftar,
        ]);
    }
}
