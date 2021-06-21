<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <form wire:submit.prevent="create">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select wire:model="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="I">Pemasukan</option>
                                <option value="O">Pengeluaran</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select wire:model="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                @foreach ($kategoris as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="date" wire:model="tgl" class="form-control @error('tgl') is-invalid @enderror" placeholder="Rp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" wire:model="nilai" class="form-control @error('nilai') is-invalid @enderror" placeholder="Rp">
                        </div>
                    </div>            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" wire:model="ket" class="form-control @error('ket') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_bukti">No Bukti</label>
                            <input type="text" wire:model="noBukti" class="form-control @error('no_bukti') is-invalid @enderror">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
