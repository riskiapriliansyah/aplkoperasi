@extends('layouts.master')
@section('title', 'Data Transaksi')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Data Transaksi</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
    <livewire:kas.kas-index/>
@endsection