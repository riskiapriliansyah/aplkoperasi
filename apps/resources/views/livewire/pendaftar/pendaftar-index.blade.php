<div>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Berhasil</h4>
        <p>{{session('sukses')}}</p>
      </div>
    @endif
    <form action="{{route('pendaftaran.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="email">Email</label>
                <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                @error('email') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="no_kk">No KK</label>
                <input type="text" name="no_kk"  class="form-control @error('no_kk') is-invalid @enderror" value="{{old('no_kk')}}">
                @error('no_kk') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="nik">NIK</label>
                <input type="text" name="nik"  class="form-control @error('nik') is-invalid @enderror" value="{{old('nik')}}">
                @error('nik') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="nama">Nama</label>
                <input type="text" name="nama"  class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                @error('nama') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}">
                @error('tempat_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir"  class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{old('tgl_lahir')}}">
                @error('tgl_lahir') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="pendidikan">Pendidikan</label>
                <select name="pendidikan" id="pendidikan"  class="form-control @error('pendidikan') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($pendidikans as $item)
                        <option value="{{$item}}" {{old('pendidikan') == $item ? 'selected' : ''}}>{{$item}}</option>
                    @endforeach
                </select>
                @error('pendidikan') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="pekerjaan">Pekerjaan</label>
                <select name="pekerjaan" id="pekerjaan"  class="form-control @error('pekerjaan') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($pekerjaans as $item)
                        <option value="{{$item}}" {{old('pekerjaan') == $item ? 'selected' : ''}}>{{$item}}</option>
                    @endforeach
                </select>
                @error('pekerjaan') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="agama">Agama</label>
                <select name="agama" id="agama"  class="form-control @error('agama') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($agamas as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
                @error('agama') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" id="jk"  class="form-control @error('jk') is-invalid @enderror"">
                    <option value="">-- Pilih --</option>
                    @foreach ($jks as $item)
                        <option value="{{$item}}" {{old('jk') == $item ? 'selected' : ''}}>{{$item}}</option>
                    @endforeach
                </select>
                @error('jk') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="no_kontak">No HP</label>
                <input type="text" name="no_kontak"  class="form-control @error('no_kontak') is-invalid @enderror" value="{{old('no_kontak')}}">
                @error('nik') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="alamat_ktp">Alamat KTP</label>
                <input type="text" name="alamat_ktp"  wire:model="alamat_ktp" class="form-control @error('alamat_ktp') is-invalid @enderror" value="{{old('alamat_ktp')}}">
                @error('alamat_ktp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="city_id_ktp">Kota/Kabupaten</label>
                <select name="city_id_ktp" id="city_id_ktp" class="form-control @error('city_id_ktp') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($cities as $item)
                        <option value="{{$item->id}}" {{old('city_id_ktp') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
                @error('city_id_ktp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="">Kecamatan</label>
                <select class="form-control" name="district_id_ktp" id="district_id_ktp" required>
                    <option value="">-- Pilih --</option>
                </select>
                @error('district_id_ktp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="">Kelurahan/Desa</label>
                <select class="form-control" name="village_id_ktp" id="village_id_ktp" required>
                    <option value="">-- Pilih --</option>
                </select>
                @error('village_id_ktp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>



            <div class="col-md-6 mb-2">
                <label for="alamat_domisili">Alamat Domisili</label>
                <input type="text" name="alamat_domisili" id="alamat_domisili"  class="form-control @error('alamat_domisili') is-invalid @enderror">
                @error('alamat_domisili') <div class="invalid-feedback"> {{$message}}</div> @enderror
                <input type='checkbox' name="cek" onchange='sameAddress(this);' value="cek">Sama Dengan KTP
            </div>
            <div class="col-md-6 mb-2">
                <label for="city_id_domisili">Kota/Kabupaten</label>
                <select name="city_id_domisili" id="city_id_domisili" class="form-control @error('city_id_domisili') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($cities as $item)
                        <option value="{{$item->id}}" {{old('city_id_domisili') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
                @error('city_id_domisili') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="">Kecamatan</label>
                <select class="form-control" name="district_id_domisili" id="district_id_domisili" required>
                    <option value="">-- Pilih --</option>
                </select>
                @error('district_id_domisili') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="">Kelurahan/Desa</label>
                <select class="form-control" name="village_id_domisili" id="village_id_domisili">
                    <option value="">-- Pilih --</option>
                </select>
                @error('village_id_domisili') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="foto_ktp">KTP</label>
                <input type="file" name="foto_ktp" class="form-control @error('foto_ktp') is-invalid @enderror">
                <small>*Wajib</small>
                @error('foto_ktp') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="pas_foto">Pas Foto</label>
                <input type="file" name="pas_foto" class="form-control @error('pas_foto') is-invalid @enderror">
                
                @error('pas_foto') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="foto_kk">Kartu Keluarga</label>
                <input type="file" name="foto_kk" class="form-control @error('foto_kk') is-invalid @enderror">
                <small>*Wajib</small>
                @error('foto_kk') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p>Dengan penuh kesadaran mengajukan permohonan menjadi anggota Angkatan Muda Pembaharuan Indonesia AMPI Kota Samarinda</p>
                        <p>Saya berjanji dengan sungguh-sungguh bahwa saya menerima dan sanggup mengamalkan Doktrin, Anggaran Dasar, Anggaran Rumah Tangga, Program Umum, Peraturan-peraturan Organisasi, dan aktif mengikuti kegiatan-kegiatan organisasi.</p>
                        <p>Menyatakan dengan sungguh-sungguh bahwa data diri yang saya berikan adalah sebenarnya data diri saya.</p>
                        <input type="checkbox" onchange='setuju(this);'>
                        <label for="">SETUJU</label>
                        <p><button type="submit" id="submit" class="btn btn-success btn-sm mt-3" disabled>Daftar</button></p>
                    </div>
                </div>
                
                
            </div>
        </div>

    </form>
</div>
@push('script')
<script>
    //KETIKA SELECT BOX DENGAN ID province_id DIPILIH
    $('#city_id_ktp').on('change', function() {
        //MAKA AKAN MELAKUKAN REQUEST KE URL /API/CITY
        //DAN MENGIRIMKAN DATA city_id
        $.ajax({
            url: "{{ url('/api/districtKTP') }}",
            type: "GET",
            data: { city_id_ktp: $(this).val() },
            success: function(html){
                //SETELAH DATA DITERIMA, SELEBOX DENGAN ID CITY_ID DI KOSONGKAN
                $('#district_id_ktp').empty()
                //KEMUDIAN APPEND DATA BARU YANG DIDAPATKAN DARI HASIL REQUEST VIA AJAX
                //UNTUK MENAMPILKAN DATA KABUPATEN / KOTA
                $('#district_id_ktp').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id_ktp').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    //LOGICNYA SAMA DENGAN CODE DIATAS HANYA BERBEDA OBJEKNYA SAJA
    $('#district_id_ktp').on('change', function() {
        $.ajax({
            url: "{{ url('/api/villageKTP') }}",
            type: "GET",
            data: { district_id_ktp: $(this).val() },
            success: function(html){
                $('#village_id_ktp').empty()
                $('#village_id_ktp').append('<option value="">Pilih Kelurahan</option>')
                $.each(html.data, function(key, item) {
                    $('#village_id_ktp').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })
    $('#city_id_domisili').on('change', function() {
        //MAKA AKAN MELAKUKAN REQUEST KE URL /API/CITY
        //DAN MENGIRIMKAN DATA city_id
        $.ajax({
            url: "{{ url('/api/districtDomisili') }}",
            type: "GET",
            data: { city_id_domisili: $(this).val() },
            success: function(html){
                //SETELAH DATA DITERIMA, SELEBOX DENGAN ID CITY_ID DI KOSONGKAN
                $('#district_id_domisili').empty()
                //KEMUDIAN APPEND DATA BARU YANG DIDAPATKAN DARI HASIL REQUEST VIA AJAX
                //UNTUK MENAMPILKAN DATA KABUPATEN / KOTA
                $('#district_id_domisili').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id_domisili').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    //LOGICNYA SAMA DENGAN CODE DIATAS HANYA BERBEDA OBJEKNYA SAJA
    $('#district_id_domisili').on('change', function() {
        $.ajax({
            url: "{{ url('/api/villageDomisili') }}",
            type: "GET",
            data: { district_id_domisili: $(this).val() },
            success: function(html){
                $('#village_id_domisili').empty()
                $('#village_id_domisili').append('<option value="">Pilih Kelurahan</option>')
                $.each(html.data, function(key, item) {
                    $('#village_id_domisili').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    function sameAddress(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("alamat_domisili").setAttribute("disabled", "disabled");
        document.getElementById("city_id_domisili").setAttribute("disabled", "disabled");
        document.getElementById("district_id_domisili").setAttribute("disabled", "disabled");
        document.getElementById("village_id_domisili").setAttribute("disabled", "disabled");
    }else{
        document.getElementById("alamat_domisili").removeAttribute("disabled");
        document.getElementById("city_id_domisili").removeAttribute("disabled");
        document.getElementById("district_id_domisili").removeAttribute("disabled");
        document.getElementById("village_id_domisili").removeAttribute("disabled");
   }
}
    function setuju(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("submit").removeAttribute("disabled");
    }else{
        document.getElementById("submit").setAttribute("disabled", "disabled");
   }
    }

</script>
@endpush
