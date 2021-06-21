<?php

namespace App\Http\Livewire\Config;

use App\Models\Anggota;
use App\Models\Config;
use App\Models\Kas;
use Livewire\Component;

class ConfigwebIndex extends Component
{
    public $valVisi, $valMisi, $valSejarah, $valAlamat;
    public $updateMode = false;
    public $addMode = true;


    // public function update()
    // {
    //     dd('ok');
    //     $visi = Config::where('key', 'visi')->first();
    //     dd($this->valVisi);
    //     $visi->val1 = $this->valVisi;
    //     $misi = Config::where('key', 'misi')->first();
    //     $misi->update([
    //         'val1' => $this->valMisi,
    //     ]);
    //     $sejarah = Config::where('key', 'sejarah')->first();
    //     $sejarah->update([
    //         'val1' => $this->valSejarah,
    //     ]);
    //     return redirect()->route('admin.config.web');
    // }

    public function render()
    {
        $baseConfig = Config::where('key', 'base')->pluck('val1');
        $visi = Config::where('key', 'visi')->first();
        $misi = Config::where('key', 'misi')->first();
        $sejarah = Config::where('key', 'sejarah')->first();
        $alamat = Config::where('key', 'alamat')->first();
        $this->valVisi = $visi->val1;
        $this->valMisi = $misi->val1;
        $this->valSejarah = $sejarah->val1;
        $this->valAlamat = $alamat->val1;
        return view('livewire.config.configweb-index', [
            'baseConfig' => $baseConfig,
            'visi' => $visi,
            'misi' => $misi,
            'sejarah' => $sejarah,
            'alamat' => $alamat,
        ]);
    }
}
