<?php

namespace App\Http\Livewire\Anggota;

use App\Models\City;
use App\Models\Config;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnggotaCreate extends Component
{
    use WithFileUploads;
    public $selected = false;
    public $province_id_ktp = 64, $city_id_ktp, $district_id_ktp, $village_id_ktp, $alamat_ktp, $alamat_domisili, $province_id_domisili = 64, $city_id_domisili, $district_id_domisili, $village_id_domisili;


    public function selected()
    {
        $this->selected = true;
        $this->alamat_domisili = $this->alamat_ktp;
        $this->province_id_domisili = $this->province_id_ktp;
        $this->city_id_domisili = $this->city_id_ktp;
        $this->district_id_domisili = $this->district_id_ktp;
        $this->village_id_domisili = $this->village_id_ktp;
    }
    public function unSelected()
    {
        $this->selected = false;
        $this->alamat_domisili = '';
        $this->province_id_domisili =  '';
        $this->city_id_domisili =  '';
        $this->district_id_domisili = '';
        $this->village_id_domisili =  '';
    }
    public function render()
    {
        $provinces_ktp = 'Kalimantan Timur';
        $cities_ktp = Regency::where('province_id', 64)->get();
        $districts_ktp = District::where('regency_id', $this->city_id_ktp)->get();
        $villages_ktp = Village::where('district_id', $this->district_id_ktp)->get();
        $provinces_domisili = 'Kalimantan Timur';
        $cities_domisili = Regency::where('province_id', $this->province_id_domisili)->get();
        $districts_domisili = District::where('regency_id', $this->city_id_domisili)->get();
        $villages_domisili = Village::where('district_id', $this->district_id_domisili)->get();
        $pekerjaan = Config::where('key', 'pekerjaan')->pluck('val1');
        $pendidikan = Config::where('key', 'pendidikan')->pluck('val1');
        $agama = Config::where('key', 'agama')->pluck('val1');
        $jk = Config::where('key', 'jenis kelamin')->pluck('val1');
        $jabatans = Config::where('key', 'jabatan')->pluck('val1');



        return view('livewire.anggota.anggota-create', [
            'provinces_ktp' => $provinces_ktp,
            'cities_ktp' => $this->province_id_ktp == null ? [] : $cities_ktp,
            'districts_ktp' => $this->city_id_ktp == null ? [] : $districts_ktp,
            'villages_ktp' => $this->district_id_ktp == null ? [] : $villages_ktp,
            'provinces_domisili' => $provinces_domisili,
            'cities_domisili' => $this->province_id_domisili == null ? [] : $cities_domisili,
            'districts_domisili' => $this->city_id_domisili == null ? [] : $districts_domisili,
            'villages_domisili' => $this->district_id_domisili == null ? [] : $villages_domisili,
            'pekerjaans' => $pekerjaan,
            'pendidikans' => $pendidikan,
            'jks' => $jk,
            'agamas' => $agama,
            'jabatans' => $jabatans,
        ]);
    }
}
