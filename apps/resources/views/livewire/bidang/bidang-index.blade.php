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
    <livewire:bidang.bidang-create/>
    @endif
    @if ($updateMode == true)
    <livewire:bidang.bidang-update/>
    @endif
<div class="card overflow-auto">
    <div class="card-body">
        <button wire:click.prevent='add' class="btn btn-primary btn-sm mb-2" wire:loading.attr="disabled"><i class="fas fa-plus"></i></button>
        <div wire:loading wire:target="add">
            <i class="fas fa-spinner fa-spin"></i>
        </div>
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
                    <th>Bidang</th>
                    <th>Anggota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidangs as $item)
                <tr>
                    <td>{{$item->bidang}}</td>
                    <td>0</td>
                    <td>
                        <a href="{{route('admin.bidang.show', $item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <button class="btn btn-warning btn-sm" wire:click="getItem({{$item->id}})">Edit</button>
                        <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$bidangs->links()}}
    </div>
</div>
</div>


