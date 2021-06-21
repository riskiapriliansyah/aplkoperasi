<?php

namespace App\Http\Livewire\Pendaftaran;

use App\Models\Config;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;

class PendaftaranKonfirmasi extends Component
{
    public $pendaftar;
    public $province_id_ktp, $city_id_ktp, $district_id_ktp, $village_id_ktp, $province_id_domisili, $city_id_domisili, $district_id_domisili, $village_id_domisili;

    public function mount($pendaftar)
    {
        $this->pendaftar = $pendaftar;
        $province_id_ktp = Province::where('name', $pendaftar->province_ktp)->pluck('id')->first();
        $city_id_ktp = Regency::where('name', $pendaftar->city_ktp)->pluck('id')->first();
        $district_id_ktp = District::where('name', $pendaftar->district_ktp)->where('regency_id', $city_id_ktp)->pluck('id')->first();
        $village_id_ktp = Village::where('name', $pendaftar->village_ktp)->where('district_id', $district_id_ktp)->pluck('id')->first();
        $province_id_domisili = Province::where('name', $pendaftar->province_domisili)->pluck('id')->first();
        $city_id_domisili = Regency::where('name', $pendaftar->city_domisili)->pluck('id')->first();
        $district_id_domisili = District::where('name', $pendaftar->district_domisili)->where('regency_id', $city_id_domisili)->pluck('id')->first();
        $village_id_domisili = Village::where('name', $pendaftar->village_domisili)->where('district_id', $district_id_domisili)->pluck('id')->first();
        $this->province_id_ktp = $province_id_ktp;
        $this->city_id_ktp = $city_id_ktp;
        $this->district_id_ktp = $district_id_ktp;
        $this->village_id_ktp = $village_id_ktp;
        $this->province_id_domisili = $province_id_domisili;
        $this->city_id_domisili = $city_id_domisili;
        $this->district_id_domisili = $district_id_domisili;
        $this->village_id_domisili = $village_id_domisili;
    }
    public function render()
    {
        $provinces_ktp = Province::all();
        $cities_ktp = Regency::where('province_id', $this->province_id_ktp)->get();
        $districts_ktp = District::where('regency_id', $this->city_id_ktp)->get();
        $villages_ktp = Village::where('district_id', $this->district_id_ktp)->get();
        $provinces_domisili = Province::all();
        $cities_domisili = Regency::where('province_id', $this->province_id_domisili)->get();
        $districts_domisili = District::where('regency_id', $this->city_id_domisili)->get();
        $villages_domisili = Village::where('district_id', $this->district_id_domisili)->get();
        $pekerjaan = Config::where('key', 'pekerjaan')->pluck('val1');
        $pendidikan = Config::where('key', 'pendidikan')->pluck('val1');
        $jk = Config::where('key', 'jenis kelamin')->pluck('val1');
        $agama = Config::where('key', 'agama')->pluck('val1');
        return view('livewire.pendaftaran.pendaftaran-konfirmasi', [
            'provinces_ktp' => $provinces_ktp,
            'cities_ktp' => $this->province_id_ktp == null ? [] : $cities_ktp,
            'districts_ktp' => $this->city_id_ktp == null ? [] : $districts_ktp,
            'villages_ktp' => $this->district_id_ktp == null ? [] : $villages_ktp,
            'provinces_domisili' => $provinces_domisili,
            'cities_domisili' => $this->province_id_domisili == null ? [] : $cities_domisili,
            'districts_domisili' => $this->city_id_domisili == null ? [] : $districts_domisili,
            'villages_domisili' => $this->district_id_domisili == null ? [] : $villages_domisili,
            'pekerjaan' => $pekerjaan,
            'pendidikan' => $pendidikan,
            'jk' => $jk,
            'agama' => $agama,
        ]);
    }
}
