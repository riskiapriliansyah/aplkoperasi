<div>
    <div class="card overflow-auto">
        <div class="card-body">
            @if (session()->has('sukses'))
            <div class="alert alert-success">
            {{ session('sukses') }}
            </div>
            @endif
            <form method="POST" action="{{route('admin.config.web.update')}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group row">
                    <label for="visi" class="col-sm-2 col-form-label">VISI</label>
                    <div class="col-sm-10">
                      <textarea name="visi" id="editor" cols="30" rows="10">{{$valVisi}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="misi" class="col-sm-2 col-form-label">MISI</label>
                    <div class="col-sm-10">
                      <textarea name="misi" id="editor" cols="30" rows="10">{{$valMisi}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sejarah" class="col-sm-2 col-form-label">SEJARAH</label>
                    <div class="col-sm-10">
                      <textarea name="sejarah"  id="editor" cols="30" rows="10">{{$valSejarah}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                    <div class="col-sm-10">
                     <input type="text" name="alamat" class="form-control" value="{{$valAlamat}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">STRUKTUR ORGANISASI</label>
                    <div class="col-sm-10">
                     <input type="file" name="file" class="form-control" value="{{$valAlamat}}">
                    </div>
                </div>
                <button class="btn btn-warning btn-sm">Update</button>
            </form>

            
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <script>
        $(document).ready(function(){
            CKEDITOR.replace('visi');
            CKEDITOR.replace('misi');
            CKEDITOR.replace('sejarah');
        }) 
    </script>
    
@endpush
