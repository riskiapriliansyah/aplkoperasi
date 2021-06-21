@extends('layouts.master')
@section('title', 'Bidang')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Bidang</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
    <livewire:bidang.bidang-index/>
@endsection
