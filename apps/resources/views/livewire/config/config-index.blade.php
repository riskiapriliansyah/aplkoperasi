<div>
    <div class="card overflow-auto">
        <div class="card-body">
            @if (session()->has('sukses'))
            <div class="alert alert-success">
            {{ session('sukses') }}
            </div>
            @endif
            <form @if($addMode == true) wire:submit.prevent="create" @endif @if($updateMode == true) wire:submit.prevent="update({{$config_id}})" @endif>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select wire:model="key" id="key" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach ($baseConfig as $item)
                                <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <input type="text" wire:model="val1" class="form-control" placeholder="Value" hidden>
                            <input type="text" wire:model="val1New" class="form-control" placeholder="Value">
                        </div>
                    </div>
                </div>
                @if($addMode == true)<button class="btn btn-primary btn-sm">Simpan</button>@endif
                @if($updateMode == true)<button class="btn btn-warning btn-sm">Update</button>@endif
            </form>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Value</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listVal as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->val1}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" wire:click="getItem({{$item->id}})">Edit</button>
                            <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
