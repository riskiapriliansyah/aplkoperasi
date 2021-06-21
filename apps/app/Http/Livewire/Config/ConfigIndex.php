<?php

namespace App\Http\Livewire\Config;

use App\Models\Anggota;
use App\Models\Config;
use App\Models\Kas;
use Livewire\Component;

class ConfigIndex extends Component
{
    public $config_id, $key, $val1, $val1New;
    public $updateMode = false;
    public $addMode = true;

    public function create()
    {
        $this->validate([
            'key' => 'required',
            'val1New' => 'required',
        ]);
        Config::create([
            'key' => $this->key,
            'val1' => $this->val1New,
        ]);
        session()->flash('sukses', 'Value ditambahkan');
        $this->val1 = '';
        $this->val1New = '';
    }

    public function getItem($id)
    {
        $this->addMode = false;
        $this->updateMode = true;
        $config = Config::find($id);
        $this->config_id = $config->id;
        $this->val1 = $config->val1;
        $this->val1New = $config->val1;
    }
    public function update($id)
    {
        $config = Config::find($id);
        if ($config->key == "bank") {
            $kas = Kas::where('bank', $this->val1)->get();
            foreach ($kas as $item) {
                $item->update([
                    'bank' => $this->val1New,
                ]);
            }
            $config->update([
                'val1' => $this->val1New,
            ]);
        } else if ($config->key == "pendidikan") {
            $anggota = Anggota::where('pendidikan', $this->val1)->get();
            foreach ($anggota as $item) {
                $item->update([
                    'pendidikan' => $this->val1New,
                ]);
            }
        } else if ($config->key == 'pekerjaan') {
            $anggota = Anggota::where('pekerjaan', $this->val1)->get();
            foreach ($anggota as $item) {
                $item->update([
                    'pekerjaan' => $this->val1New,
                ]);
            }
        } else if ($config->key == 'jenis kelamin') {
            $anggota = Anggota::where('jk', $this->val1)->get();
            foreach ($anggota as $item) {
                $item->update([
                    'jk' => $this->val1New,
                ]);
            }
        } else if ($config->key == 'agama') {
            $anggota = Anggota::where('agama', $this->val1)->get();
            foreach ($anggota as $item) {
                $item->update([
                    'agama' => $this->val1New,
                ]);
            }
        }
        $config->update([
            'val1' => $this->val1New,
        ]);
        session()->flash('sukses', 'Berhasil diubah');
        $this->val1 = '';
        $this->val1New = '';
        $this->updateMode = false;
        $this->addMode = true;
    }

    public function deleteItem($id)
    {
        $config = Config::find($id);
        $config->delete();
        session()->flash('sukses', 'Data telah dihapus');
    }

    public function render()
    {
        $baseConfig = Config::where('key', 'base')->pluck('val1');
        $listVal = Config::where('key', $this->key)->get();
        return view('livewire.config.config-index', [
            'baseConfig' => $baseConfig,
            'listVal' => $listVal,
        ]);
    }
}
