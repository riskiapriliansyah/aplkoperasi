@extends('layouts.master')
@section('title', 'Anggota')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
{{-- <div class="breadcrumb-item"><a href="#">Posts</a></div> --}}
<div class="breadcrumb-item">Anggota</div> 
@endsection
@section('content')
    <livewire:anggota.anggota-index/>
@endsection