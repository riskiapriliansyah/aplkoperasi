<div>
    <div class="row">
        <div class="col-md-4">  
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Tambah</h5>

                    <form method="POST" action="{{route('admin.bidang.store', $bidang->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="anggota_id">Nama</label>
                            <select name="anggota_id" class="form-control" id="anggota_id">
                                <option value="">Pilih</option>
                                @foreach ($anggota as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                        </div>
                        <button class="btn btn-success btn-sm float-right">Add</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-8">
                @if (session()->has('sukses'))
                <div class="alert alert-success">
                {{ session('sukses') }}
                </div>
                @endif
            <div class="card overflow-auto">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bidang->anggota as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->pivot->jabatan}}</td>
                                <td>
                                    <form action="{{route('admin.bidang.delete', [$bidang->id, $item->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
    $('#anggota_id').select2();
});
    </script>
@endpush
