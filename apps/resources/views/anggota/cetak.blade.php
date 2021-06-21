
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Anggota</title>
  </head>
  <body>
    @php
    $alamat = App\Models\Config::where('key', 'alamat')->pluck('val1')->first();
@endphp
      <table class="table table-sm table-bordered">
        <thead class="text-center">
            <tr>
                <th>No Anggota</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>No Kontak</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Alamat KTP</th>
                <th>Provinsi</th>
                <th>Kota/Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Alamat Domisili</th>
                <th>Provinsi</th>
                <th>Kota/Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Jabatan Struktural</th>
                <th>Tanggal Bergabung</th>
                <th>Pas Foto</th>
                <th>KK</th>
                <th>KTP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_anggota as $item)
            <tr>
                <td>{{$item->nia}}</td>
                <td>'{{$item->nik}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->tempat_lahir}}, {{$item->tgl_lahir->format('d M Y')}}<br></td>
                <td>{{$item->jk}}</td>
                <td>{{$item->agama}}</td>
                <td>{{$item->no_kontak}}</td>
                <td>{{$item->pendidikan}}</td>
                <td>{{$item->pekerjaan}}</td>
                <td>{{$item->alamat_ktp}}</td>
                <td>{{$item->province_ktp}}</td>
                <td>{{$item->city_ktp}}</td>
                <td>{{$item->district_ktp}}</td>
                <td>{{$item->village_ktp}}</td>
                <td>{{$item->alamat_domisili}}</td>
                <td>{{$item->province_domisili}}</td>
                <td>{{$item->city_domisili}}</td>
                <td>{{$item->district_domisili}}</td>
                <td>{{$item->village_domisili}}</td>
                <td>{{$item->jabatan}}</td>
                <td>{{$item->tgl_bergabung}}</td>
                <td>http://ampi-samarinda.id/public/pasfoto/{{$item->pas_foto}}</td>
                <td>http://ampi-samarinda.id/public/kk/{{$item->foto_kk}}</td>
                <td>http://ampi-samarinda.id/public/foto/{{$item->foto_ktp}}</td>   
            </tr>
            @endforeach
            <tr>
              
            </tr>
        </tbody>
    </table>

  </body>
</html>
