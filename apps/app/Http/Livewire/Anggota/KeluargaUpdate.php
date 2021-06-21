<?php

namespace App\Http\Livewire\Anggota;

use App\Models\Keluarga;
use Livewire\Component;

class KeluargaUpdate extends Component
{
    public $kk_id, $keluarga_id, $nik, $nama, $alamat, $agama, $tempat_lahir, $tgl_lahir, $status, $jk;

    protected $listeners = [
        'getAnggota' => 'showAnggota',
    ];



    public function showAnggota($keluarga)
    {
        $this->keluarga_id = $keluarga['id'];
        $this->kk_id = $keluarga['kk_id'];
        $this->nik = $keluarga['nik'];
        $this->nama = $keluarga['nama'];
        $this->alamat = $keluarga['alamat'];
        $this->agama = $keluarga['agama'];
        $this->tempat_lahir = $keluarga['tempat_lahir'];
        $this->tgl_lahir = $keluarga['tgl_lahir'];
        $this->status = $keluarga['status'];
        $this->jk = $keluarga['jk'];
    }

    public function update()
    {
        $keluarga = Keluarga::find($this->keluarga_id);
        //dd($meja);
        $keluarga->update([
            'kk_id' => $this->kk_id,
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'agama' => $this->agama,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'status' => $this->status,
            'jk' => $this->jk,
        ]);

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.anggota.keluarga-update');
    }
}
