@extends('layouts.master')
@section('title', 'Config Home')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Config Home</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
    <livewire:config.configweb-index/>
@endsection