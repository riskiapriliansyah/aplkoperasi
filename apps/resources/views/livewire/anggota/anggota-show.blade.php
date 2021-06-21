<div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Keluarga</a>
        </div>
    </nav>
    @if ($addMode == true)
    <livewire:anggota.keluarga-create :anggota="$anggota"/>
    @endif
    @if ($updateMode == true)
    <livewire:anggota.keluarga-update/>
    @endif
    @if (session()->has('sukses'))
    <div class="alert alert-success mt-2">
        {{ session('sukses') }}
    </div>
    @endif
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card mb-3 col-lg-12 overflow-auto">
                <div class="row no-gutters">
                    <div class="card-body col-md-4">
                    <form action="{{route('admin.anggota.update', $anggota->id)}}" method="POST" enctype="multipart/form-data">
                        @if(isset($anggota->pas_foto))
                        <img src="{{asset('pasfoto/'.$anggota->pas_foto)}}" class="card-img img-thumbnail">
                        @else
                                @if($anggota->jk == 'L')
                                <img src="{{asset('pasfoto/dummymale.jpg')}}" class="card-img">
                                @else
                                <img src="{{asset('pasfoto/dummyfemale.jpg')}}" class="card-img">
                                @endif
                        @endif
                        <input type="file" name="pas_foto" class="form-control">
                        <img src="{{asset('foto/'.$anggota->foto_ktp)}}" class="card-img img-thumbnail mt-2">
                        <input type="file" name="foto_ktp" class="form-control">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                                @csrf
                                @method('patch')
                            <table class="table table-striped">
                                <tr>
                                    <td>No Anggota</td>
                                    <td>:</td>
                                    <td><input type="text" name="nia" class="form-control" value="{{$anggota->nia}}"></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><input type="text" name="nik" class="form-control" value="{{$anggota->nik}}"></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" class="form-control" value="{{$anggota->nama}}"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><input type="text" name="meial" class="form-control" value="{{$anggota->email}}"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{$anggota->tempat_lahir}}">
                                        <input type="date" name="tgl_lahir" class="form-control" value="{{$anggota->tgl_lahir->format('Y-m-d')}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td><input type="text" name="no_kontak" class="form-control" value="{{$anggota->no_kontak}}"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>
                                        <select name="jk" id="jk" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($jk as $item)
                                                <option value="{{$item}}" {{$item == $anggota->jk ? 'selected' : ''}}>{{$item}}</option>
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
                                                <option value="{{$item}}" {{$item == $anggota->agama ? 'selected' : ''}}>{{$item}}</option>
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
                                                <option value="{{$item}}" {{$item == $anggota->pendidikan ? 'selected' : ''}}>{{$item}}</option>
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
                                                <option value="{{$item}}" {{$item == $anggota->pekerjaan ? 'selected' : ''}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat KTP</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="alamat_ktp" id="alamat_ktp" cols="30" rows="2" class="form-control">{{$anggota->alamat_ktp}}</textarea>
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
                                        <textarea name="alamat_domisili" id="alamat_domisili" cols="30" rows="2" class="form-control">{{$anggota->alamat_domisili}}</textarea>
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
                                    <td>Jabatan Struktural</td>
                                    <td>:</td>
                                    <td>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{$item}}" {{$item == $anggota->jabatan ? 'selected' : ''}}>{{$item}}</option>
                                            @endforeach
                                        </select>   
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" name="tgl_bergabung" class="form-control" value="{{$anggota->tgl_bergabung}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">-- PILIH --</option>
                                            <option value="1" {{$anggota->status == 1 ? 'selected' : ''}}>Aktif</option>
                                            <option value="0" {{$anggota->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row no-gutters">
                <div class="card-body col-md-4">
                <form action="{{route('admin.anggota.updateKK', $anggota->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <a href="{{asset('kk/'.$anggota->foto_kk)}}" target="_blank"><img src="{{asset('kk/'.$anggota->foto_kk)}}" class="card-img img-thumbnail"></a>
                    
                    <input type="file" name="foto_kk" class="form-control">
                    <button class="btn btn-success btn-sm">Update</button>
                </div>
                </form>
                <div class="col-md-8">
                    <div class="card overflow-auto">
                        <div class="card-body">
                           <h3>No KK: {{$anggota->kk->no_kk}}</h3> 
                           <button class="btn btn-primary btn-sm my-3" wire:click="addKeluarga"><i class="fas fa-plus"></i></button>
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>NIK</th>
                                       <th>Nama</th>
                                       <th>Jenis Kelamin</th>
                                       <th>Status</th>
                                       <th>Aksi</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($keluargas as $item)
                                       <tr>
                                           <td>{{$item->nik}}</td>
                                           <td>{{$item->nama}}</td>
                                           <td>{{$item->jk}}</td>
                                           <td>{{$item->status}}</td>
                                           <td>
                                            <button class="btn btn-warning btn-sm" wire:click="getAnggota({{$item->id}})">Edit</button>
                                            <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteAnggota({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
    </div>    
</div>

