@extends('layouts.master')
@section('title', $bidang->bidang)
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item"><a href="{{route('admin.bidang')}}">Bidang</a></div>
<div class="breadcrumb-item">{{$bidang->bidang}}</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
    <livewire:bidang.bidang-show :bidang="$bidang"/>

@endsection