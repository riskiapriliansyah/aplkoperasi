<div>
    <div class="card">
            <div class="card-body">
                {{dd($gallery_id)}}
                <form action="{{route('admin.gallery.update', $gallery_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" name="ket" id="ket" value="{{$ket}}" class="form-control @error('ket') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="foto">Gambar</label>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                </div>
                <button class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
    </div>
</div>
