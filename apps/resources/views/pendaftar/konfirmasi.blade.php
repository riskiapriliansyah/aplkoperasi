@extends('layouts.master')
@section('title', 'Konfirmasi Pendaftar Baru')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Pendaftar Baru</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
    <livewire:pendaftaran.pendaftaran-konfirmasi :pendaftar="$pendaftar" />
@endsection