<div>
    @if (session()->has('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if ($addMode == true)
    <livewire:anggota.anggota-create/>
    @endif
    @if ($updateMode == true)
    <livewire:anggota.anggota-update/>
    @endif
<div class="card overflow-auto">
    <div class="card-body">
        <button wire:click.prevent='add' class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></button>
        <button class="btn btn-success btn-sm mb-3" wire:click.prevent="exportExcel"><i class="fas fa-file-excel"></i> CETAK EXCEL</button>
        {{-- <button class="btn btn-danger btn-sm mb-3" wire:click.prevent="cetak"><i class="fas fa-print"></i> CETAK PRINT</button> --}}
        <div class="row mb-3 justify-content-between no-gutters">
            <div class="col-md-1">
                <select wire:model="filter" id="filter" class="form-control">
                    <option value="2">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> 
            </div>
            <div class="col-md-5">
                <input type="text" wire:model="search" placeholder="Search..." class="form-control">
            </div>
        </div>
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th>NIA</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>No Kontak</th>
                    <th>Jabatan</th>
                    <th>Wilayah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_anggota as $item)
                <tr>
                    <td>{{$item->nia}}</td>
                    <td>{{$item->nik}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->no_kontak}}</td>
                    <td>{{$item->jabatan}}</td>
                    <td>{{$item->district_domisili}}</td>
                    <td>{!!$item->status()!!}</td>
                    <td>
                        <a href="{{route('admin.anggota.show', $item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$list_anggota->links()}}
    </div>
</div>
</div>
