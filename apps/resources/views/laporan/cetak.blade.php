
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @php
        $alamat = App\Models\Config::where('key', 'alamat')->pluck('val1')->first();
    @endphp
    <div class="container my-4">
      <div class="row justify-content-between">
        <div class="col-md-6">
          <table>
            <tr>
              <th rowspan="2"><img src="{{asset('stisla/assets/img/logo.png')}}" alt="" width="90" height="90"></th>
            </tr>
            <tr>
              <th>AMPI SAMARINDA <br> <small>{!!$alamat!!}</small></th>
            </tr>
          </table>
        </div>
        <div class="col-md-3">
          @if($bank == 'all')
          <h4 class="mt-4">SEMUA BANK</h4>
          @else
          <h4 class="mt-4">{{$bank}}</h4>
          @endif
          <p>{{date('d/m/Y', strtotime($tgl_awal))}} s/d {{date('d/m/Y', strtotime($tgl_akhir))}}</p>
        </div>
      </div>
    </div>
    <div class="container">
      
    </div>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2" class="text-center" width='5'>NO</th>
                <th rowspan="2" class="text-center">TANGGAL</th>
                @if($bank == 'all')
                <th rowspan="2" class="text-center">BANK</th>
                @endif
                <th rowspan="2" class="text-center">KATEGORI</th>
                <th rowspan="2" class="text-center">KETERANGAN</th>
                <th rowspan="2" class="text-center">NO BUKTI</th>
                <th colspan="2" class="text-center">JENIS</th>
            </tr>
            <tr>
                <th class="text-center">DEBIT</th>
                <th class="text-center">KREDIT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>1</td>
              <td>{{date('d/m/Y', strtotime($tgl_awal))}}</td>
              @if($bank == 'all')
              <td>{{$bank}}</td>
              @endif
              <td>Saldo Awal</td>
              <td>Saldo Awal</td>
              <td>-</td>
              <td>Rp. {{number_format($sumSaldoAwal)}}</td>
              <td>-</td>
            </tr>
            @foreach ($laporan as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->tgl->format('d/m/Y')}}</td>
                @if($bank == 'all')
                <td>{{$item->bank}}</td>
                @endif
                <td>{{$item->kategori->kategori}}</td>
                <td>{{$item->ket}}</td>
                <td>{{$item->no_bukti}}</td>
                <td>
                    @if($item->jenis == 'I')
                    Rp. {{number_format($item->nilai)}}
                    @else
                    -
                    @endif
                </td>
                <td>@if($item->jenis == 'O')
                    Rp. {{number_format($item->nilai)}}
                    @else
                    -
                    @endif</td>
            </tr>
            @endforeach
            <tr>
              @if($bank == 'all')
              <td colspan="6" class="text-right  font-weight-bolder">TOTAL</td>
              @else
              <td colspan="5" class="text-right  font-weight-bolder">TOTAL</td>
              @endif
              <td class=" font-weight-bolder">Rp. {{number_format($sumDebit)}}</td>
              <td class=" font-weight-bolder">Rp. {{number_format($sumKredit)}}</td>
            </tr>
            <tr>
              @if($bank == 'all')
              <td colspan="6" class="text-right  font-weight-bolder">Saldo Akhir</td>
              @else
              <td colspan="5" class="text-right  font-weight-bolder">Saldo Akhir</td>
              @endif
              <td colspan="2" class=" font-weight-bolder text-center">Rp. {{number_format($sumSaldoAkhir)}}</td>
            </tr>
        </tbody>
    </table>

  </body>
</html>
