<div>
    <div class="card overflow-auto">
        <div class="card-header bg-info text-white font-weight-bolder">
            <div class="row justify-content-between">
                <div class="col-md-10">Tambah Anggota Keluarga</div>
                <div class="col-md-1"><button class="btn btn-danger btn-sm" wire:click='close'>X</button></div>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="create">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" wire:model="nik" class="form-control  @error('nik') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" wire:model="nama" class="form-control  @error('nama') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" wire:model="tempat_lahir" class="form-control  @error('tempat_lahir') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" wire:model="tgl_lahir" class="form-control  @error('tgl_lahir') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select wire:model="jk" id="jk" class="form-control @error('jk') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    <option value="L" {{old('jk') == 'L' ? 'selected' : ''}}>L</option>
                    <option value="P" {{old('jk') == 'P' ? 'selected' : ''}}>P</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" wire:model="alamat" class="form-control  @error('alamat') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" wire:model="agama" class="form-control  @error('agama') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" wire:model="status" class="form-control  @error('status') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
