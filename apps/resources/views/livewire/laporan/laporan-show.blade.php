<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <button wire:click.prevent='add' class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></button>

            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">Tanggal</th>
                        <th rowspan="2" class="text-center">Kategori</th>
                        <th rowspan="2" class="text-center">Ket</th>
                        <th colspan="2" class="text-center">Jenis</th>
                        <th rowspan="2" class="text-center">Aksi</th>
                    </tr>
                    <tr>
                        <th class="text-center">Debit</th>
                        <th class="text-center">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    {{dd($laporans)}}
                    {{-- @foreach ($laporans as $item)
                    <tr>
                        <td>{{$item->tgl->format('d/m/Y')}}</td>
                        <td>{{$item->kategori->kategori}}</td>
                        <td>{{$item->ket}}</td>
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
                        <td>
                            <button class="btn btn-warning btn-sm" wire:click="getItem({{$item->id}})">Edit</button>
                            <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
