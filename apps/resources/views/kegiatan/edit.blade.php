@extends('layouts.master')
@section('title', 'Kegiatan')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Kegiatan</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
@if (session()->has('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
    @endif
<div class="card overflow-auto">
    <div class="card-body">
        <form action="{{route('admin.kegiatan.update',$kegiatan->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" value="{{$kegiatan->judul}}" class="form-control @error('judul') is-invalid @enderror">
        </div>
        <div class="form-group">
            <label for="foto">Thumbnail</label>
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="editor" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{$kegiatan->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
            <option value="">-- PILIH --</option>
            <option value="1" {{$kegiatan->status == '1' ? 'selected' : ''}}>Aktif</option>
            <option value="0" {{$kegiatan->status == '0' ? 'selected' : ''}}>Tidak Aktif</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Add</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <script>
        $(document).ready(function(){
            CKEDITOR.replace('content', {
                filebrowserUploadUrl: "{{route('admin.kegiatan.upload.image', ['_token' => csrf_token()])}}",
                filebrowserUploadMethod: 'form',
            });

            $('#dataTable').DataTable();
        });
    </script>
    
@endpush
