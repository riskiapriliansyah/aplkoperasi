<?php

namespace App\Http\Livewire\Bidang;

use App\Models\Anggota;
use Livewire\Component;

class BidangShow extends Component
{
    public $anggota_id, $nama, $jabatan, $bidang;
    public $bidang_id;

    public function mount($bidang)
    {
        $this->bidang = $bidang;
        $this->bidang_id = $bidang->id;
    }
    public function add()
    {
        $anggota = Anggota::find($this->anggota_id);
        $anggota->bidang()->attach($this->bidang_id, ['jabatan' => $this->jabatan]);
        session()->flash('sukses', 'Berhasil disimpan');
        return redirect()->route('admin.bidang.show', $this->bidang_id);
    }

    public function render()
    {
        $anggota = Anggota::all();
        return view('livewire.bidang.bidang-show', [
            'anggota' => $anggota,
        ]);
    }
}
