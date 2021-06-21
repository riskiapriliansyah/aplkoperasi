@extends('layouts.master')
@section('title', 'Gallery')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Gallery</div>
<div class="breadcrumb-item">Edit</div>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('admin.gallery.update', $gallery->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <img src="{{asset('gallery/'.$gallery->foto)}}" width="300" alt="" class="img-fluid mb-2">
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
        </div>
        <div class="form-group">
            <label for="ket">Keterangan</label>
            <input type="text" name="ket" id="ket" value="{{$gallery->ket}}" class="form-control @error('ket') is-invalid @enderror">
        </div>
        <button class="btn btn-warning btn-sm" type="submit">UPDATE</button>
        
        </form>
    </div>
</div>


 
@endsection