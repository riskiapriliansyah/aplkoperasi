<div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No Kontak</th>
                        <th>Wilayah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pendaftar as $item)
                    <tr>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->no_kontak}}</td>
                        <td>{{$item->district_domisili}}</td>
                        <td>{!!$item->status()!!}</td>
                        <td>
                            @if($item->status == false)
                            <a href="{{route('admin.pendaftar.konfirmasi', $item->id)}}" class="btn btn-primary btn-sm">Konfirmasi</a>
                            <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            @else
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$list_pendaftar->links()}}
        </div>
    </div>
</div>
