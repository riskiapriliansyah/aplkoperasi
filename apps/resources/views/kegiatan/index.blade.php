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
        <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Buat artikel
        </button>
        <div class="collapse" id="collapseExample">
            <div class="card card-body my-3">
                <form action="{{route('admin.kegiatan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="foto">Thumbnail</label>
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="editor" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">-- PILIH --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </form>
            </div>
        </div>
        <table class="table mt-3" id="dataTable">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $item)
                <tr>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->slug}}</td>
                    <td>{!!$item->status()!!}</td>
                    <td>
                        <a href="{{route('admin.kegiatan.edit', $item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{route('admin.kegiatan.delete', $item->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
