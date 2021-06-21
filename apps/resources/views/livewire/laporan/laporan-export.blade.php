<div>
    <table>
        <tr>
          <th colspan="6">AMPI SAMARINDA <br> <small>Jl. Mulawarman No.3, Karang Mumus, Kec. Samarinda Kota <br> Kota Samarinda, Kalimantan Timur 75113</small></th>
        </tr>
      </table>
    
    <table>
        <thead>
            <tr>
                <th rowspan="2" width='5'>NO</th>
                <th rowspan="2">TANGGAL</th>
                <th rowspan="2">BANK</th>
                <th rowspan="2">KATEGORI</th>
                <th rowspan="2">KETERANGAN</th>
                <th rowspan="2">NO BUKTI</th>
                <th colspan="2">JENIS</th>
            </tr>
            <tr>
                <th>DEBIT</th>
                <th>KREDIT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>1</td>
              <td>{{date('d/m/Y', strtotime($tgl_awal))}}</td>
              <td>SEMUA</td>
              <td>Saldo Awal</td>
              <td>Saldo Awal</td>
              <td>-</td>
              <td>Rp. {{number_format($sumSaldoAwal)}}</td>
              <td>-</td>
            </tr>
            @foreach ($laporans as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{date('d/m/Y', strtotime($item->tgl))}}</td>
                <td>{{$item->bank}}</td>
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
              <td colspan="6" >TOTAL</td>
              <td >Rp. {{number_format($sumDebit)}}</td>
              <td >Rp. {{number_format($sumKredit)}}</td>
            </tr>
            <tr>
              <td colspan="6" >Saldo Akhir</td>
              <td colspan="2" >Rp. {{number_format($sumSaldoAkhir)}}</td>
            </tr>
        </tbody>
    </table>
</div>
