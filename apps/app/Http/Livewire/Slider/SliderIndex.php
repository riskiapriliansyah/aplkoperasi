<?php

namespace App\Http\Livewire\Slider;

use App\Models\Config;
use App\Models\Slider;
use Livewire\Component;
use File;

class SliderIndex extends Component
{
    public function deleteItem($id)
    {
        $slider  = Config::find($id);
        \File::delete('public/slider/' . $slider->val1);
        $slider->delete();
        session()->flash('sukses', 'Berhasil dihapus');
    }
    public function render()
    {
        $sliders = Config::where('key', 'slider')->get();
        return view('livewire.slider.slider-index', [
            'sliders' => $sliders,
        ]);
    }
}
