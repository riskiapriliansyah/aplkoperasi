<?php

namespace App\Http\Livewire\Slider;

use App\Models\Config;
use Livewire\Component;

class SliderminiIndex extends Component
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
        $sliders = Config::where('key', 'sliderMini')->get();
        return view('livewire.slider.slidermini-index', [
            'sliders' => $sliders,
        ]);
    }
}
