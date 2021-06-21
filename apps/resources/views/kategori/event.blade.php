@extends('layouts.master')
@section('title', 'Event')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item">Event</div>
{{-- <div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
@php
    $jenis = 'event';
@endphp
    <livewire:kategori.kategori-index :jenis="$jenis"/>
@endsection