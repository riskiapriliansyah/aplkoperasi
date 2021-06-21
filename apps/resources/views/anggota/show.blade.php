@extends('layouts.master')
@section('title', 'Anggota')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></div>
<div class="breadcrumb-item"><a href="{{route('admin.anggota')}}">Anggota</a></div>
<div class="breadcrumb-item">{{$anggota->nama}}</div> 
@endsection
@section('content')
<livewire:anggota.anggota-show :anggota="$anggota"/>


{{-- <div class="card">
    <div class="card-body">
        <h4>Keluarga</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>NO Keluarga</th>
                    <th>NO Anggota</th>
                    <th>Nama</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($jemaat->keluarga_id))
                @foreach ($list_keluarga as $keluarga)
                <tr>
                    <td>{{$keluarga->keluarga->no_keluarga}}</td>
                    <td>{{$keluarga->no_anggota}}</td>
                    <td>{{$keluarga->nama_lengkap}}</td>
                    @if ($keluarga->status_keluarga == 1)
                        <td>Kepala Keluarga</td>
                    @endif
                    @if ($keluarga->status_keluarga == 2)
                        <td>Istri</td>
                    @endif
                    @if ($keluarga->status_keluarga == 3)
                        <td>Anak</td>
                    @endif
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div> --}}
@endsection