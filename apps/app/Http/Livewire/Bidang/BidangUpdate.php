<?php

namespace App\Http\Livewire\Bidang;

use App\Models\Bidang;
use Livewire\Component;

class BidangUpdate extends Component
{
    public $bidang_id, $bidang;

    protected $listeners = [
        'getItem' => 'showItem',
    ];

    public function showItem($bidang)
    {
        $this->bidang_id = $bidang['id'];
        $this->bidang = $bidang['bidang'];
    }

    public function update()
    {
        $this->validate([
            'bidang' => 'required',
        ]);

        $bidang = Bidang::find($this->bidang_id);

        $bidang->update([
            'bidang' => $this->bidang,
        ]);
        $this->emit('updated');
    }


    public function render()
    {
        return view('livewire.bidang.bidang-update');
    }
}
