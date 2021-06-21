<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\District;
use App\Models\Keluarga;
use App\Models\Kk;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class AnggotaController extends Controller
{
    public function index()
    {
        $list_anggota = Anggota::all();
        return view('anggota.anggota', compact('list_anggota'));
    }
    public function create()
    {
        return view('anggota.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'city_id_ktp' => 'required',
            'district_id_ktp' => 'required',
            'alamat_ktp' => 'required',
            'city_id_domisili' => 'required',
            'district_id_domisili' => 'required',
            'alamat_domisili' => 'required',
            'jabatan' => 'required',
            'tgl_bergabung' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'no_kontak' => 'required',
            'foto_ktp' => 'image',
            'pas_foto' => 'image',
            'foto_kk' => 'image',
        ]);

        $input = $request->all();

        $cek_kk = Kk::where('no_kk', $request->no_kk)->first();
        //dd($cek_kk);
        if ($cek_kk == null) {
            $kk = new Kk;
            $kk->no_kk = $request->no_kk;
            if ($request->hasFile('foto_kk')) {
                $foto = $request->foto_kk;
                $random = Str::random(10);
                $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
                $foto->move('public/kk/', $nama_file);
                $kk->file = $nama_file;
            } else {
                $kk->file = '-';
            }
            $kk->save();

            $input['kk_id'] = $kk->id;

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

            $province_ktp = 'KALIMANTAN TIMUR';
            $input['province_ktp'] = $province_ktp;
            $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
            $input['city_ktp'] = $city_ktp;
            $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
            $input['district_ktp'] = $district_ktp;
            $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();
            $input['village_ktp'] = $village_ktp;

            $province_domisili = 'KALIMANTAN TIMUR';
            $input['province_domisili'] = $province_domisili;
            $city_domisili = Regency::where('id', $request->city_id_domisili)->pluck('name')->first();
            $input['city_domisili'] = $city_domisili;
            $district_domisili = District::where('id', $request->district_id_domisili)->pluck('name')->first();
            $input['district_domisili'] = $district_domisili;
            $village_domisili = Village::where('id', $request->village_id_domisili)->pluck('name')->first();
            $input['village_domisili'] = $village_domisili;

            $lastNiaId =  Anggota::whereYear('created_at', date('Y'))->orderBy('id', 'desc')->first()->nia ?? 0;
            $lastIncreament = substr($lastNiaId, -3);
            $kodeNia = date('y', strtotime($request->tgl_bergabung)) . date('y', strtotime($request->tgl_lahir)) . str_pad($lastIncreament + 1, 5, 0, STR_PAD_LEFT);
            $input['nia'] = $kodeNia;

            Anggota::create($input);

            Keluarga::create([
                'kk_id' => $kk->id,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'status' => '-',
                'jk' => $request->jk,
            ]);

            return redirect()->route('admin.anggota')->with('sukses', 'Berhasil tersimpan');
        }
        $input['kk_id'] = $cek_kk->id;

        if ($request->hasFile('foto_ktp')) {
            $foto = $request->foto_ktp;
            $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
            $input['foto_ktp'] = $nama_file;
            $foto->move('public/foto/', $nama_file);
        }
        if ($request->hasFile('pas_foto')) {
            $foto = $request->pas_foto;
            $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
            $input['pas_foto'] = $nama_file;
            $foto->move('public/pasfoto/', $nama_file);
        }
        if ($request->hasFile('foto_kk')) {
            $foto = $request->foto_kk;
            $nama_file = time() . $request->nama . '.' . $foto->getClientOriginalExtension();
            $input['foto_kk'] = $nama_file;
        }

        $province_ktp = 'KALIMANTAN TIMUR';
        $input['province_ktp'] = $province_ktp;
        $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
        $input['city_ktp'] = $city_ktp;
        $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
        $input['district_ktp'] = $district_ktp;
        $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();
        $input['village_ktp'] = $village_ktp;

        $province_domisili = 'KALIMANTAN TIMUR';
        $input['province_domisili'] = $province_domisili;
        $city_domisili = Regency::where('id', $request->city_id_domisili)->pluck('name')->first();
        $input['city_domisili'] = $city_domisili;
        $district_domisili = District::where('id', $request->district_id_domisili)->pluck('name')->first();
        $input['district_domisili'] = $district_domisili;
        $village_domisili = Village::where('id', $request->village_id_domisili)->pluck('name')->first();
        $input['village_domisili'] = $village_domisili;

        $lastNiaId =  Anggota::whereYear('created_at', date('Y'))->orderBy('id', 'desc')->first()->nia ?? 0;
        $lastIncreament = substr($lastNiaId, -3);
        $kodeNia = date('Y') . str_pad($lastIncreament + 1, 5, 0, STR_PAD_LEFT);
        $input['nia'] = $kodeNia;

        Anggota::create($input);

        Keluarga::create([
            'kk_id' => $cek_kk->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'status' => '-',
            'jk' => $request->jk,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect()->route('admin.anggota')->with('sukses', 'Berhasil tersimpan');
    }
    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'city_id_ktp' => 'required',
            'district_id_ktp' => 'required',
            'village_id_ktp' => 'required',
            'alamat_ktp' => 'required',
            'city_id_domisili' => 'required',
            'district_id_domisili' => 'required',
            'village_id_domisili' => 'required',
            'alamat_domisili' => 'required',
            'jabatan' => 'required',
            'tgl_bergabung' => 'required',
            'agama' => 'required',
            'no_kontak' => 'required',
            'foto_ktp' => 'image',
            'pas_foto' => 'image',
        ]);

        $province_ktp = 'KALIMANTAN TIMUR';
        $city_ktp = Regency::where('id', $request->city_id_ktp)->pluck('name')->first();
        $district_ktp = District::where('id', $request->district_id_ktp)->pluck('name')->first();
        $village_ktp = Village::where('id', $request->village_id_ktp)->pluck('name')->first();

        $province_domisili = 'KALIMANTAN TIMUR';
        $city_domisili = Regency::where('id', $request->city_id_domisili)->pluck('name')->first();
        $district_domisili = District::where('id', $request->district_id_domisili)->pluck('name')->first();
        $village_domisili = Village::where('id', $request->village_id_domisili)->pluck('name')->first();

        if ($request->has('foto_ktp')) {
            \File::delete('public/foto/' . $anggota->foto_ktp);
            $foto_ktp = $request->foto_ktp;
            $nama_file = time() . '.' . $foto_ktp->getClientOriginalExtension();
            $anggota->foto_ktp = $nama_file;
            $foto_ktp->move('public/foto/', $nama_file);
        }
        if ($request->has('pas_foto')) {
            \File::delete('public/pasfoto/' . $anggota->pas_foto);
            $pas_foto = $request->pas_foto;
            $nama_file = time() . '.' . $pas_foto->getClientOriginalExtension();
            $anggota->pas_foto = $nama_file;
            $pas_foto->move('public/pasfoto/', $nama_file);
        }
        if ($request->has('foto_kk')) {
            \File::delete('public/kk/' . $anggota->foto_kk);
            $foto_kk = $request->foto_kk;
            $nama_file = time() . '.' . $foto_kk->getClientOriginalExtension();
            $anggota->foto_kk = $nama_file;
            $foto_kk->move('public/kk/', $nama_file);
        }
        $anggota->nia = $request->nia;
        $anggota->nik = $request->nik;
        $anggota->nama = $request->nama;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->alamat_ktp = $request->alamat_ktp;
        $anggota->province_ktp = $province_ktp;
        $anggota->city_ktp = $city_ktp;
        $anggota->district_ktp = $district_ktp;
        $anggota->village_ktp = $village_ktp;
        $anggota->alamat_domisili = $request->alamat_domisili;
        $anggota->province_domisili = $province_domisili;
        $anggota->city_domisili = $city_domisili;
        $anggota->district_domisili = $district_domisili;
        $anggota->village_domisili = $village_domisili;
        $anggota->no_kontak = $request->no_kontak;
        $anggota->jk = $request->jk;
        $anggota->agama = $request->agama;
        $anggota->pendidikan = $request->pendidikan;
        $anggota->pekerjaan = $request->pekerjaan;
        $anggota->jabatan = $request->jabatan;
        $anggota->tgl_bergabung = $request->tgl_bergabung;
        $anggota->status = $request->status;
        $anggota->update();
        return redirect()->back()->with('sukses', 'Data berhasil diubah');
    }

    public function updateKK(Anggota $anggota, Request $request)
    {
        $request->validate([
            'foto_kk' => 'required',
        ]);

        \File::delete('public/foto/' . $anggota->foto_kk);
        $foto_kk = $request->foto_kk;
        $nama_file = time() . '.' . $foto_kk->getClientOriginalExtension();
        $anggota->foto_kk = $nama_file;
        $foto_kk->move('public/kk/', $nama_file);
        $kk = Kk::find($anggota->kk_id);
        $kk->file = $nama_file;
        $kk->update();
        $anggota->update();
        return redirect()->back()->with('sukses', 'Berhasil diupdate');
    }

    public function keluargaStore(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'jk' => 'required',
        ]);
        $request->request->add([
            'kk_id' => $anggota->kk_id,
        ]);
        Keluarga::create($request->all());
        return redirect()->back();
    }
    public function cetak()
    {
        $list_anggota = Anggota::all();
        return view('anggota.cetak', compact('list_anggota'));
    }
}
