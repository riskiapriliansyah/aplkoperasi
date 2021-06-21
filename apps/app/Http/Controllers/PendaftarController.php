<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Anggota;
use App\Models\Config;
use App\Models\District;
use App\Models\Keluarga;
use App\Models\Kk;
use App\Models\Pendaftar;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class PendaftarController extends Controller
{
    public function indexHome()
    {
        $pekerjaans = Config::where('key', 'pekerjaan')->pluck('val1');
        $pendidikans = Config::where('key', 'pendidikan')->pluck('val1');
        $agamas = Config::where('key', 'agama')->pluck('val1');
        $jks = Config::where('key', 'jenis kelamin')->pluck('val1');
        $cities = Regency::where('province_id', 64)->get();

        return view('pendaftaran', compact('pekerjaans', 'pendidikans', 'agamas', 'jks', 'cities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required',
            'nik' => 'required|unique:anggotas',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'city_id_ktp' => 'required',
            'district_id_ktp' => 'required',
            'alamat_ktp' => 'required',
            // 'city_id_domisili' => 'required',
            // 'district_id_domisili' => 'required',
            // 'alamat_domisili' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'no_kontak' => 'required',
            'foto_ktp' => 'image|required',
            'foto_kk' => 'image|required',
            'pas_foto' => 'image',
        ]);

        $input = $request->all();

        $cek_kk = Kk::where('no_kk', $request->no_kk)->first();
        //dd($cek_kk);
        if ($cek_kk == null) {
            $kk = new Kk;
            $kk->no_kk = $request->no_kk;
            if ($request->hasFile('foto_kk')) {
                $foto = $request->foto_kk;
                $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
                $foto->move('public/kk/', $nama_file);
                $kk->file = $nama_file;
            } else {
                $kk->file = '-';
            }
            $kk->save();

            $input['kk_id'] = $kk->id;
        } else {
            $input['kk_id'] = $cek_kk->id;
        }


        if ($request->hasFile('foto_ktp')) {
            $foto = $request->foto_ktp;
            $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
            $foto->move('public/foto/', $nama_file);
            $input['foto_ktp'] = $nama_file;
        }
        if ($request->hasFile('pas_foto')) {
            $foto = $request->pas_foto;
            $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
            $foto->move('public/pasfoto/', $nama_file);
            $input['pas_foto'] = $nama_file;
        }
        if ($request->hasFile('foto_kk')) {
            $foto = $request->foto_kk;
            $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
            $input['foto_kk'] = $nama_file;
        }

        if ($request->cek == 'cek') {
            $input['alamat_ktp'] = $request->alamat_ktp;
            $province_ktp = 'KALIMANTAN TIMUR';
            $input['province_ktp'] = $province_ktp;
            $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
            $input['city_ktp'] = $city_ktp;
            $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
            $input['district_ktp'] = $district_ktp;
            $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();
            $input['village_ktp'] = $village_ktp;


            $input['alamat_domisili'] = $request->alamat_ktp;
            $province_domisili = 'KALIMANTAN TIMUR';
            $input['province_domisili'] = $province_domisili;
            $city_domisili = $city_ktp;
            $input['city_domisili'] = $city_domisili;
            $district_domisili = $district_ktp;
            $input['district_domisili'] = $district_domisili;
            $village_domisili = $village_ktp;
            $input['village_domisili'] = $village_domisili;
        } else {
            $input['alamat_ktp'] = $request->alamat_ktp;
            $province_ktp = 'KALIMANTAN TIMUR';
            $input['province_ktp'] = $province_ktp;
            $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
            $input['city_ktp'] = $city_ktp;
            $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
            $input['district_ktp'] = $district_ktp;
            $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();
            $input['village_ktp'] = $village_ktp;


            $input['alamat_domisili'] = $request->alamat_ktp;
            $province_domisili = 'KALIMANTAN TIMUR';
            $input['province_domisili'] = $province_domisili;
            $city_domisili = Regency::where('id', $request->city_id_domisili)->pluck('name')->first();
            $input['city_domisili'] = $city_domisili;
            $district_domisili = District::where('id', $request->district_id_domisili)->pluck('name')->first();
            $input['district_domisili'] = $district_domisili;
            $village_domisili = Village::where('id', $request->village_id_domisili)->pluck('name')->first();
            $input['village_domisili'] = $village_domisili;
        }

        $input['jabatan'] = 'Anggota';
        $input['tgl_bergabung'] = Carbon::now();

        $lastNiaId =  Anggota::whereYear('created_at', date('Y'))->orderBy('id', 'desc')->first()->nia ?? 0;
        $lastIncreament = substr($lastNiaId, -3);
        $kodeNia = date('Y') . str_pad($lastIncreament + 1, 5, 0, STR_PAD_LEFT);
        $input['nia'] = $kodeNia;


        Anggota::create($input);

        Keluarga::create([
            'kk_id' => $input['kk_id'],
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'status' => '-',
            'jk' => $request->jk,
        ]);

        $alamat = Config::where('key', 'alamat')->pluck('val1')->first();

        $details = [
            'nama' => $request->nama,
            'alamat' => $alamat,
            'nia' => $input['nia'],
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
        ];



        Mail::to($request->email)->send(new SendMail($details));


        return redirect()->route('pendaftaran')->with('sukses', 'Sdr/Sdri ' . $request->nama . ' Berhasil terdaftar dengan nomor anggota ' . $input['nia'] . ', untuk tahap selanjutnya silahkan memverifikasi data anda di sekretariat AMPI SAMARINDA ' . $alamat);
    }

    // public function index()
    // {
    //     return view('pendaftar.index');
    // }

    // public function konfirmasi(Pendaftar $pendaftar)
    // {
    //     return view('pendaftar.konfirmasi', compact('pendaftar'));
    // }
    // public function konfirm(Pendaftar $pendaftar, Request $request)
    // {
    //     $request->validate([
    //         'no_kk' => 'required',
    //         'nik' => 'required',
    //         'nama' => 'required',
    //         'nama' => 'required',
    //         'jk' => 'required',
    //         'tempat_lahir' => 'required',
    //         'tgl_lahir' => 'required',
    //         'province_id_ktp' => 'required',
    //         'city_id_ktp' => 'required',
    //         'district_id_ktp' => 'required',
    //         'village_id_ktp' => 'required',
    //         'alamat_ktp' => 'required',
    //         'province_id_domisili' => 'required',
    //         'city_id_domisili' => 'required',
    //         'district_id_domisili' => 'required',
    //         'village_id_domisili' => 'required',
    //         'alamat_domisili' => 'required',
    //         'jabatan' => 'required',
    //         'pendidikan' => 'required',
    //         'pekerjaan' => 'required',
    //         'agama' => 'required',
    //         'tgl_bergabung' => 'required',
    //         'no_kontak' => 'required',
    //         'foto_ktp' => 'image',
    //         'pas_foto' => 'image',
    //     ]);

    //     $input = $request->all();

    //     $cek_kk = Kk::where('no_kk', $request->no_kk)->first();
    //     //dd($cek_kk);
    //     if ($cek_kk == null) {
    //         $kk = new Kk;
    //         $kk->no_kk = $request->no_kk;
    //         if ($request->hasFile('foto_kk')) {
    //             $foto = $request->foto_kk;
    //             $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //             $foto->move('public/kk/', $nama_file);
    //             $kk->file = $nama_file;
    //         } else {
    //             $kk->file = '-';
    //         }
    //         $kk->save();

    //         $input['kk_id'] = $kk->id;
    //         $input['nia'] = '12093';

    //         if ($request->hasFile('foto_ktp')) {
    //             $foto = $request->foto_ktp;
    //             $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //             $foto->move('public/foto/', $nama_file);
    //             $input['foto_ktp'] = $nama_file;
    //         } else {
    //             $input['foto_ktp'] = $pendaftar->foto_ktp;
    //         }
    //         if ($request->hasFile('pas_foto')) {
    //             $foto = $request->pas_foto;
    //             $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //             $foto->move('public/pasfoto/', $nama_file);
    //             $input['pas_foto'] = $nama_file;
    //         } else {
    //             $input['pas_foto'] = $pendaftar->pas_foto;
    //         }
    //         if ($request->hasFile('foto_kk')) {
    //             $foto = $request->foto_kk;
    //             $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //             $input['foto_kk'] = $nama_file;
    //         } else {
    //             $input['foto_kk'] = $pendaftar->foto_kk;
    //         }

    //         $province_ktp = Province::where('id', $request->province_id_ktp)->pluck('name')->first();
    //         $input['province_ktp'] = $province_ktp;
    //         $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
    //         $input['city_ktp'] = $city_ktp;
    //         $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
    //         $input['district_ktp'] = $district_ktp;
    //         $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();
    //         $input['village_ktp'] = $village_ktp;

    //         $province_domisili = Province::where('id', $request->province_id_domisili)->pluck('name')->first();
    //         $input['province_domisili'] = $province_domisili;
    //         $city_domisili = Regency::where('id', $request->city_id_domisili)->pluck('name')->first();
    //         $input['city_domisili'] = $city_domisili;
    //         $district_domisili = District::where('id', $request->district_id_domisili)->pluck('name')->first();
    //         $input['district_domisili'] = $district_domisili;
    //         $village_domisili = Village::where('id', $request->village_id_domisili)->pluck('name')->first();
    //         $input['village_domisili'] = $village_domisili;

    //         Anggota::create($input);

    //         Keluarga::create([
    //             'kk_id' => $kk->id,
    //             'nik' => $request->nik,
    //             'nama' => $request->nama,
    //             'alamat' => $request->alamat,
    //             'agama' => $request->agama,
    //             'tempat_lahir' => $request->tempat_lahir,
    //             'tgl_lahir' => $request->tgl_lahir,
    //             'status' => '-',
    //             'jk' => $request->jk,
    //         ]);
    //         $pendaftar->update([
    //             'status' => 1,
    //         ]);
    //         return redirect()->route('admin.anggota')->with('sukses', 'Berhasil dikonfirmasi');
    //     }
    //     $input['kk_id'] = $cek_kk->id;
    //     $input['nia'] = '12093';

    //     if ($request->hasFile('foto_ktp')) {
    //         $foto = $request->foto_ktp;
    //         $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //         $foto->move('public/foto/', $nama_file);
    //         $input['foto_ktp'] = $nama_file;
    //     } else {
    //         $input['foto_ktp'] = $pendaftar->foto_ktp;
    //     }
    //     if ($request->hasFile('pas_foto')) {
    //         $foto = $request->pas_foto;
    //         $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //         $foto->move('public/pasfoto/', $nama_file);
    //         $input['pas_foto'] = $nama_file;
    //     } else {
    //         $input['pas_foto'] = $pendaftar->pas_foto;
    //     }
    //     if ($request->hasFile('foto_kk')) {
    //         $foto = $request->foto_kk;
    //         $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
    //         $input['foto_kk'] = $nama_file;
    //     } else {
    //         $input['foto_kk'] = $pendaftar->foto_kk;
    //     }

    //     $province_ktp = Province::where('id', $request->province_id_ktp)->pluck('name')->first();
    //     $input['province_ktp'] = $province_ktp;
    //     $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
    //     $input['city_ktp'] = $city_ktp;
    //     $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
    //     $input['district_ktp'] = $district_ktp;
    //     $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();
    //     $input['village_ktp'] = $village_ktp;

    //     $province_domisili = Province::where('id', $request->province_id_domisili)->pluck('name')->first();
    //     $input['province_domisili'] = $province_domisili;
    //     $city_domisili = Regency::where('id', $request->city_id_domisili)->pluck('name')->first();
    //     $input['city_domisili'] = $city_domisili;
    //     $district_domisili = District::where('id', $request->district_id_domisili)->pluck('name')->first();
    //     $input['district_domisili'] = $district_domisili;
    //     $village_domisili = Village::where('id', $request->village_id_domisili)->pluck('name')->first();
    //     $input['village_domisili'] = $village_domisili;

    //     Anggota::create($input);

    //     Keluarga::create([
    //         'kk_id' => $cek_kk->id,
    //         'nik' => $request->nik,
    //         'nama' => $request->nama,
    //         'alamat' => $request->alamat,
    //         'agama' => $request->agama,
    //         'tempat_lahir' => $request->tempat_lahir,
    //         'tgl_lahir' => $request->tgl_lahir,
    //         'status' => '-',
    //         'jk' => $request->jk,
    //         'pendidikan' => $request->pendidikan,
    //         'pekerjaan' => $request->pekerjaan,
    //     ]);

    //     $pendaftar->update([
    //         'status' => 1,
    //     ]);

    //     return redirect()->route('admin.anggota')->with('sukses', 'Berhasil dikonfirmasi');
    // }

    public function getDistrictKTP()
    {
        //QUERY UNTUK MENGAMBIL DATA KOTA / KABUPATEN BERDASARKAN PROVINCE_ID
        $disctricts_ktp = District::where('regency_id', request()->city_id_ktp)->get();
        //KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $disctricts_ktp]);
    }
    public function getVillageKTP()
    {
        $village = Village::where('district_id', request()->district_id_ktp)->get();
        return response()->json(['status' => 'success', 'data' => $village]);
    }

    public function getDistrictDomisili()
    {
        //QUERY UNTUK MENGAMBIL DATA KOTA / KABUPATEN BERDASARKAN PROVINCE_ID
        $disctricts_domisili = District::where('regency_id', request()->city_id_domisili)->get();
        //KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $disctricts_domisili]);
    }
    public function getVillageDomisili()
    {
        //QUERY UNTUK MENGAMBIL DATA KOTA / KABUPATEN BERDASARKAN PROVINCE_ID
        $villages_domisili = Village::where('district_id', request()->district_id_domisili)->get();
        //KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $villages_domisili]);
    }
}
