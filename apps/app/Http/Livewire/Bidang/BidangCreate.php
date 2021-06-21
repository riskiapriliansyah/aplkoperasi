<?php

namespace App\Http\Livewire\Bidang;

use App\Models\Bidang;
use Livewire\Component;

class BidangCreate extends Component
{
    public $bidang;

    public function create()
    {
        $this->validate([
            'bidang' => 'required',
        ]);
        Bidang::create([
            'bidang' => $this->bidang,
        ]);
        $this->emit('created');
    }
    public function render()
    {
        return view('livewire.bidang.bidang-create');
    }
}
