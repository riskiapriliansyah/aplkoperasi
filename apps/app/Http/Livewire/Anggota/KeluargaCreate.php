<?php

namespace App\Http\Livewire\Anggota;

use App\Models\Keluarga;
use Livewire\Component;

class KeluargaCreate extends Component
{
    public $anggota, $nik, $nama, $alamat, $agama, $tempat_lahir, $tgl_lahir, $status, $jk;

    public function close()
    {
        $this->emit('closed');
    }

    public function create()
    {
        $this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'jk' => 'required',
        ]);

        Keluarga::create([
            'kk_id' => $this->anggota->kk_id,
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'agama' => $this->agama,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'status' => $this->status,
            'jk' => $this->jk,
        ]);
        $this->emit('created');
    }
    public function mount($anggota)
    {
        $this->anggota = $anggota;
    }
    public function render()
    {
        return view('livewire.anggota.keluarga-create');
    }
}
