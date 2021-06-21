@extends('layouts.master')
@section('title', 'Slider')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Slider</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.sliderMini.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                @error('foto') <div class="invalid-feedback"> {{$message}}</div> @enderror
            </div>
            <button class="btn btn-primary btn-sm">Simpan</button>
            </form>
        </div>
    </div>
    <livewire:slider.slidermini-index/>
@endsection