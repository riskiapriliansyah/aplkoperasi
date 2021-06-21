<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'key' => 'base',
            'val1' => 'bank',
        ]);
        Config::create([
            'key' => 'base',
            'val1' => 'pendidikan',
        ]);
        Config::create([
            'key' => 'base',
            'val1' => 'pekerjaan',
        ]);
        Config::create([
            'key' => 'base',
            'val1' => 'jenis kelamin',
        ]);
        Config::create([
            'key' => 'base',
            'val1' => 'agama',
        ]);
        Config::create([
            'key' => 'base',
            'val1' => 'jabatan',
        ]);
        Config::create([
            'key' => 'pendidikan',
            'val1' => 'SD',
        ]);
        Config::create([
            'key' => 'pendidikan',
            'val1' => 'SMP',
        ]);
        Config::create([
            'key' => 'pendidikan',
            'val1' => 'SMA',
        ]);
        Config::create([
            'key' => 'pendidikan',
            'val1' => 'D3',
        ]);
        Config::create([
            'key' => 'pendidikan',
            'val1' => 'S1',
        ]);
        Config::create([
            'key' => 'pendidikan',
            'val1' => 'S2',
        ]);
        Config::create([
            'key' => 'pekerjaan',
            'val1' => 'Wirausaha',
        ]);
        Config::create([
            'key' => 'pekerjaan',
            'val1' => 'Profesional',
        ]);
        Config::create([
            'key' => 'pekerjaan',
            'val1' => 'Swasta',
        ]);
        Config::create([
            'key' => 'jenis kelamin',
            'val1' => 'L',
        ]);
        Config::create([
            'key' => 'jenis kelamin',
            'val1' => 'P',
        ]);
        Config::create([
            'key' => 'agama',
            'val1' => 'Islam',
        ]);
        Config::create([
            'key' => 'agama',
            'val1' => 'Kristen',
        ]);
        Config::create([
            'key' => 'agama',
            'val1' => 'Hindu',
        ]);
        Config::create([
            'key' => 'agama',
            'val1' => 'Budha',
        ]);
        Config::create([
            'key' => 'alamat',
            'val1' => 'Jl. Mulawarman No.3, Karang Mumus, Kec. Samarinda Kota, Kota Samarinda, Kalimantan Timur 75113',
        ]);
        Config::create([
            'key' => 'visi',
            'val1' => 'Visi',
        ]);
        Config::create([
            'key' => 'misi',
            'val1' => 'Misi',
        ]);
        Config::create([
            'key' => 'sejarah',
            'val1' => 'Sejarah',
        ]);
    }
}
