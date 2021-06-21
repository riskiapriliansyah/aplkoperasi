<?php

namespace App\Http\Livewire\Pendaftar;

use App\Models\City;
use App\Models\Config;
use App\Models\District;
use App\Models\Pendaftar;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithFileUploads;

class PendaftarIndex extends Component
{
    public $selected = false;
    public $setuju = false;
    public $province_id_ktp = 64,  $alamat_ktp, $alamat_domisili, $province_id_domisili = 64, $city_id_domisili, $district_id_domisili, $village_id_domisili;
    public $email, $no_kk, $nik, $nama, $jk, $tempat_lahir, $tgl_lahir, $pendidikan, $pekerjaan, $agama, $no_kontak;

    public function setuju()
    {
        $this->validate([
            'no_kk' => 'required',
            'nik' => 'required|unique:anggotas',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            // 'city_id_ktp' => 'required',
            // 'district_id_ktp' => 'required',
            // 'village_id_ktp' => 'required',
            // 'alamat_ktp' => 'required',
            // 'city_id_domisili' => 'required',
            // 'district_id_domisili' => 'required',
            // 'village_id_domisili' => 'required',
            'alamat_domisili' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'no_kontak' => 'required',
            'foto_ktp' => 'image|required',
            'foto_kk' => 'image|required',
            'pas_foto' => 'image|required',
        ]);
        $this->setuju = true;
    }
    public function tidakSetuju()
    {
        $this->setuju = false;
    }


    // public function selected()
    // {
    //     $this->selected = true;
    //     $this->alamat_domisili = $this->alamat_ktp;
    //     $this->province_id_domisili = $this->province_id_ktp;
    //     $this->city_id_domisili = $this->city_id_ktp;
    //     $this->district_id_domisili = $this->district_id_ktp;
    //     $this->village_id_domisili = $this->village_id_ktp;
    // }
    // public function unSelected()
    // {
    //     $this->selected = false;
    //     $this->alamat_domisili = '';
    //     $this->province_id_domisili =  '';
    //     $this->city_id_domisili =  '';
    //     $this->district_id_domisili = '';
    //     $this->village_id_domisili =  '';
    // }



    public function render()
    {

        $provinces_ktp = 'Kalimantan Timur';
        $cities_ktp = Regency::where('province_id', $this->province_id_ktp)->get();
        // $districts_ktp = District::where('regency_id', $this->city_id_ktp)->get();
        // $villages_ktp = Village::where('district_id', $this->district_id_ktp)->get();
        $provinces_domisili = Province::all();
        $cities_domisili = Regency::where('province_id', $this->province_id_domisili)->get();
        // $districts_domisili = District::where('regency_id', $this->city_id_domisili)->get();
        // $villages_domisili = Village::where('district_id', $this->district_id_domisili)->get();
        $pekerjaan = Config::where('key', 'pekerjaan')->pluck('val1');
        $pendidikan = Config::where('key', 'pendidikan')->pluck('val1');
        $agama = Config::where('key', 'agama')->pluck('val1');
        $jk = Config::where('key', 'jenis kelamin')->pluck('val1');
        return view('livewire.pendaftar.pendaftar-index', [
            'provinces_ktp' => $provinces_ktp,
            'cities_ktp' => $this->province_id_ktp == null ? [] : $cities_ktp,
            // 'districts_ktp' => $this->city_id_ktp == null ? [] : $districts_ktp,
            // 'villages_ktp' => $this->district_id_ktp == null ? [] : $villages_ktp,
            'provinces_domisili' => $provinces_domisili,
            'cities_domisili' => $this->province_id_domisili == null ? [] : $cities_domisili,
            // 'districts_domisili' => $this->city_id_domisili == null ? [] : $districts_domisili,
            // 'villages_domisili' => $this->district_id_domisili == null ? [] : $villages_domisili,
            'pekerjaans' => $pekerjaan,
            'pendidikans' => $pendidikan,
            'jks' => $jk,
            'agamas' => $agama,
        ]);
    }
}
