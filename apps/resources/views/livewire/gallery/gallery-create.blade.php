<div>
    <div class="card">
            <div class="card-body">
                <form action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" name="ket" id="ket" class="form-control @error('ket') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="foto">Gambar</label>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                </div>
                <button class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
    </div>
</div>
