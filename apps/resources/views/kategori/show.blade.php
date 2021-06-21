@extends('layouts.master')
@section('title', $kategori->kategori)
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item"><a href="{{route('admin.kategori')}}">Kategori</a></div>
<div class="breadcrumb-item">{{$kategori->kategori}}</div>
@endsection
@section('content')
    <livewire:kategori.kategoris-index :kategori="$kategori"/>
@endsection