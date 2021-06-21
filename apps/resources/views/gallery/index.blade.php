@extends('layouts.master')
@section('title', 'Gallery')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Gallery</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')

<livewire:gallery.gallery-index/>



 
@endsection