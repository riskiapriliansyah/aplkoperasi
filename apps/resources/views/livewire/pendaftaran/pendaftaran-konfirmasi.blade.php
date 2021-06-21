<div>
    <div class="card mb-3 col-lg-12">
        <div class="row no-gutters">
            <div class="card-body col-md-4">
            <form action="{{route('admin.pendaftar.konfirm', $pendaftar->id)}}" method="POST" enctype="multipart/form-data">
                @if(isset($pendaftar->pas_foto))
                <img src="{{asset('pasfoto/'.$pendaftar->pas_foto)}}" class="card-img img-thumbnail">
                @else
                        @if($pendaftar->jk == 'L')
                        <img src="{{asset('pasfoto/dummymale.jpg')}}" class="card-img">
                        @else
                        <img src="{{asset('pasfoto/dummyfemale.jpg')}}" class="card-img">
                        @endif
                @endif
                <input type="file" name="pas_foto" class="form-control">
                <img src="{{asset('foto/'.$pendaftar->foto_ktp)}}" class="card-img img-thumbnail mt-2">
                <input type="file" name="foto_ktp" class="form-control">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                        @csrf
                    <table class="table table-striped">
                        <tr>
                            <td>No Anggota</td>
                            <td>:</td>
                            <td><input type="text" name="nia" class="form-control" placeholder="AUTO" readonly></td>
                        </tr>
                        <tr>
                            <td>NO KK</td>
                            <td>:</td>
                            <td><input type="text" name="no_kk" class="form-control" value="{{$pendaftar->no_kk}}"></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><input type="text" name="nik" class="form-control" value="{{$pendaftar->nik}}"></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><input type="text" name="nama" class="form-control" value="{{$pendaftar->nama}}"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{$pendaftar->tempat_lahir}}">
                                <input type="date" name="tgl_lahir" class="form-control" value="{{$pendaftar->tgl_lahir->format('Y-m-d')}}">
                            </td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td><input type="text" name="no_kontak" class="form-control" value="{{$pendaftar->no_kontak}}"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($jk as $item)
                                        <option value="{{$item}}" {{$item == $pendaftar->jk ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($agama as $item)
                                        <option value="{{$item}}" {{$item == $pendaftar->agama ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($pendidikan as $item)
                                        <option value="{{$item}}" {{$item == $pendaftar->pendidikan ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>
                                <select name="pekerjaan" id="pekerjaan" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($pekerjaan as $item)
                                        <option value="{{$item}}" {{$item == $pendaftar->pekerjaan ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat KTP</td>
                            <td>:</td>
                            <td>
                                <textarea name="alamat_ktp" id="alamat_ktp" cols="30" rows="2" class="form-control">{{$pendaftar->alamat_ktp}}</textarea>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td>
                                <select name="province_id_ktp" id="province_id_ktp" wire:model="province_id_ktp" class="form-control @error('province_id_ktp') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($provinces_ktp as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kota/Kabupaten</td>
                            <td>:</td>
                            <td>
                                <select name="city_id_ktp" id="city_id_ktp" wire:model="city_id_ktp" class="form-control @error('city_id_ktp') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($cities_ktp as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>
                                <select name="district_id_ktp" id="district_id_ktp" wire:model="district_id_ktp" class="form-control @error('district_id_ktp') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($districts_ktp as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td>
                                <select name="village_id_ktp" id="village_id_ktp" wire:model="village_id_ktp" class="form-control @error('village_id_ktp') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($villages_ktp as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Domisili</td>
                            <td>:</td>
                            <td>
                                <textarea name="alamat_domisili" id="alamat_domisili" cols="30" rows="2" class="form-control">{{$pendaftar->alamat_domisili}}</textarea>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td>
                                <select name="province_id_domisili" id="province_id_domisili" wire:model="province_id_domisili" class="form-control @error('province_id_domisili') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($provinces_domisili as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kota/Kabupaten</td>
                            <td>:</td>
                            <td>
                                <select name="city_id_domisili" id="city_id_domisili" wire:model="city_id_domisili" class="form-control @error('city_id_domisili') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($cities_domisili as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>
                                <select name="district_id_domisili" id="district_id_domisili" wire:model="district_id_domisili" class="form-control @error('district_id_domisili') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($districts_domisili as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td>
                                <select name="village_id_domisili" id="village_id_domisili" wire:model="village_id_domisili" class="form-control @error('village_id_domisili') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($villages_domisili as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="jabatan" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Bergabung</td>
                            <td>:</td>
                            <td>
                                <input type="date" name="tgl_bergabung" class="form-control"></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
