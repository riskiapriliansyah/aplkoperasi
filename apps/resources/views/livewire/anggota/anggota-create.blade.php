<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <form action="{{route('admin.anggota.store')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="no_kk">No KK</label>
                        <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($pendidikans as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($pekerjaans as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($agamas as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror"">
                            <option value="">-- Pilih --</option>
                            @foreach ($jks as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="no_kontak">No HP</label>
                        <input type="text" name="no_kontak" class="form-control @error('no_kontak') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="alamat_ktp">Alamat KTP</label>
                        <input type="text" name="alamat_ktp" wire:model="alamat_ktp" class="form-control @error('alamat_ktp') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="city_id_ktp">Kota/Kabupaten</label>
                        <select name="city_id_ktp" id="city_id_ktp" wire:model="city_id_ktp" class="form-control @error('city_id_ktp') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($cities_ktp as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="district_id_ktp">Kecamatan</label>
                        <select name="district_id_ktp" id="district_id_ktp" wire:model="district_id_ktp" class="form-control @error('district_id_ktp') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($districts_ktp as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="village_id_ktp">Kelurahan</label>
                        <select name="village_id_ktp" id="village_id_ktp" wire:model="village_id_ktp" class="form-control @error('village_id_ktp') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($villages_ktp as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="alamat_domisili">Alamat Domisili</label>
                        <input type="text" name="alamat_domisili" wire:model="alamat_domisili" class="form-control @error('alamat_domisili') is-invalid @enderror">
                        <input type="checkbox" @if($selected == false) wire:click='selected'  @else wire:click='unSelected' checked  @endif>
                        <label for="">Sama dengan KTP</label>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="city_id_domisili">Kota/Kabupaten</label>
                        <select name="city_id_domisili" id="city_id_domisili" wire:model="city_id_domisili" class="form-control @error('city_id_domisili') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($cities_domisili as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="district_id_domisili">Kecamatan</label>
                        <select name="district_id_domisili" id="district_id_domisili" wire:model="district_id_domisili" class="form-control @error('district_id_domisili') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($districts_domisili as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="village_id_domisili">Kelurahan</label>
                        <select name="village_id_domisili" id="village_id_domisili" wire:model="village_id_domisili" class="form-control @error('village_id_domisili') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($villages_domisili as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror"">
                            <option value="">-- Pilih --</option>
                            @foreach ($jabatans as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tgl_bergabung">Tanggal Bergabung</label>
                        <input type="date" name="tgl_bergabung" class="form-control @error('tgl_bergabung') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="foto_ktp">KTP</label>
                        <input type="file" name='foto_ktp' class="form-control @error('foto_ktp') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pas_foto">Pas Foto</label>
                        <input type="file" name="pas_foto" class="form-control @error('pas_foto') is-invalid @enderror">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="foto_kk">Kartu Keluarga</label>
                        <input type="file" name="foto_kk" class="form-control @error('foto_kk') is-invalid @enderror">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>

            </form>
        </div>
    </div>
</div>
