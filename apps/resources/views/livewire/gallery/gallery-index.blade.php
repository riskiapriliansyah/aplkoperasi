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
    <livewire:gallery.gallery-create/>
    @endif
    @if ($updateMode == true)
    <livewire:gallery.gallery-update/>
    @endif
    <div class="card overflow-auto">
        <div class="card-body">
            <button wire:click.prevent='add' class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></button>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $item)
                        <tr>
                            <td width='200'><img src="{{asset('gallery/'.$item->foto)}}" class="img-fluid"></td>
                            <td>{{$item->ket}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{route('admin.gallery.show', $item->id)}}">Edit</a>
                                <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$galleries->links()}}
        </div>
    </div>
    
</div>
