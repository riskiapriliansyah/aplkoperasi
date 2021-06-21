<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        return view('slider.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image',
        ]);
        $slider = new Config;
        $slider->key = 'slider';

        $foto = $request->foto;
        $nama_file = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(700, 335)->save('public/slider/' . $nama_file);

        $slider->val1 = $nama_file;
        $slider->save();
        return redirect()->route('admin.slider');
    }
    public function indexMini()
    {
        return view('slider.indexMini');
    }
    public function storeMini(Request $request)
    {
        $request->validate([
            'foto' => 'required|image',
        ]);
        $slider = new Config;
        $slider->key = 'sliderMini';

        $foto = $request->foto;
        $nama_file = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(500, 500)->save('public/slider/' . $nama_file);

        $slider->val1 = $nama_file;
        $slider->save();
        return redirect()->route('admin.sliderMini');
    }
}
