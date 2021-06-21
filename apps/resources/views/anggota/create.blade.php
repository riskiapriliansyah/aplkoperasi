@extends('layouts.master')
@section('title', 'Tambah Anggota')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item"><a href="{{route('admin.anggota')}}">Anggota</a></div>
<div class="breadcrumb-item">Tambah</div> 
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.anggota.store')}}" method="POST">
                @csrf
                .row
            </form>
        </div>
    </div>
@endsection