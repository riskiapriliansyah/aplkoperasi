<div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset('slider/'.$item->val1)}}" alt="" width="300"></td>
                        <td>
                            <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
