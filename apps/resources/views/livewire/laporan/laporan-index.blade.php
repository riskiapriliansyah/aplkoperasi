<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <h4 class="mb-4">Filter Laporan</h4>
            <form>
                <div class="row">
                    <div class="col-md-3">
                      <label for="tgl_awal">Dari Tanggal</label>  
                      <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" wire:model="tgl_awal">
                    </div>
                    <div class="col-md-3">
                      <label for="tgl_akhir">Sampai Tanggal</label>  
                      <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" wire:model="tgl_akhir">
                    </div>
                    <div class="col-md-3">
                      <label for="Kategori_id">Kategori</label>  
                      <select type="date" class="form-control @error('kategori_id') is-invalid @enderror" wire:model="kategori_id">
                            <option value="">-- Pilih --</option>
                            <option value="all">All</option>
                        @foreach ($kategoris as $item)
                            <option value="{{$item->id}}">{{$item->kategori}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="bank">Bank</label>  
                      <select type="date" class="form-control @error('bank') is-invalid @enderror" wire:model="bank">
                            <option value="">-- Pilih --</option>
                            <option value="all">All</option>
                        @foreach ($banks as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                </div>
                        <button class="btn btn-info mt-3" wire:click.prevent="show">Tampilkan</button>
            </form>
        </div>
    </div>

    @if($showMode == true)
    <div>
      <div class="card overflow-auto">
          <div class="card-body">
              <h4 class="mb-4">Laporan Data Keuangan</h4>

              <div class="row mb-3">
                <div class="col">
                  <div class="row">
                    <div class="col-2">DARI TANGGAL</div>
                    <div class="col">: {{date('d/m/Y', strtotime($tgl_awal))}}</div>
                  </div>
                  <div class="row">
                    <div class="col-2">SAMPAI TANGGAL</div>
                    <div class="col">: {{date('d/m/Y', strtotime($tgl_akhir))}}</div>
                  </div>
                  <div class="row">
                    <div class="col-2">KATEGORI</div>
                    <div class="col">: {{$kategori}}</div>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-sm" wire:click.prevent="exportExcel({{$laporans}})"><i class="fas fa-file-excel"></i> CETAK EXCEL</button>

                    <form action="{{route('admin.laporan.pdf')}}" method="POST" class="d-inline">
                    @csrf
                        <input type="date" name="tgl_awal" class="form-control @error('tgl_awal') is-invalid @enderror" wire:model="tgl_awal" hidden>
                        <input type="date" name="tgl_akhir" class="form-control @error('tgl_awal') is-invalid @enderror" wire:model="tgl_akhir" hidden>
                        <input type="text" name="kategori_id" class="form-control @error('tgl_awal') is-invalid @enderror" wire:model="kategori_id" hidden>
                        <input type="text" name="bank" class="form-control @error('tgl_awal') is-invalid @enderror" wire:model="bank" hidden>
                     
                    <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-print"></i> CETAK PRINT</button>
                    </form>
                  </div>

                </div>
              </div>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th rowspan="2" class="text-center" width='5'>NO</th>
                          <th rowspan="2" class="text-center">TANGGAL</th>
                          <th rowspan="2" class="text-center">BANK</th>
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
                        <td>{{$bank}}</td>
                        <td>Saldo Awal</td>
                        <td>Saldo Awal</td>
                        <td>-</td>
                        <td>Rp. {{number_format($sumSaldoAwal)}}</td>
                        <td>-</td>
                      </tr>
                      @foreach ($laporans as $item)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->tgl->format('d/m/Y')}}</td>
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
                        <td colspan="6" class="text-right bg-primary text-white  font-weight-bolder">TOTAL</td>
                        <td class="bg-primary text-white  font-weight-bolder">Rp. {{number_format($sumDebit)}}</td>
                        <td class="bg-primary text-white  font-weight-bolder">Rp. {{number_format($sumKredit)}}</td>
                      </tr>
                      <tr>
                        <td colspan="6" class="text-right bg-primary text-white  font-weight-bolder">Saldo Akhir</td>
                        <td colspan="2" class="bg-primary text-white  font-weight-bolder text-center">Rp. {{number_format($sumSaldoAkhir)}}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  
    @endif
</div>
