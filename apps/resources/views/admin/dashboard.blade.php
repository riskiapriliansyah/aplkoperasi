@extends('layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb')
<div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
{{-- <div class="breadcrumb-item"><a href="#">Posts</a></div>
<div class="breadcrumb-item">Create New Post</div> --}}
@endsection
@section('content')
<div class="row">
    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.pendaftar')}}">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Pendaftar Baru</h4>
                </div>
                <div class="card-body">
                  {{$sumNewPendaftar}}
                </div>
              </div>
            </div>
        </a>
    </div> --}}
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.anggota')}}">
            <div class="card card-statistic-1">
            <div class="card-icon" style="background-color: #e9ca1b;">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Anggota</h4>
                </div>
                <div class="card-body">
                {{$sumAnggota}}
                </div>
            </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-body">
        <canvas id="rayonChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
      <div class="card-body">
        <canvas id="jkChart"></canvas>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <canvas id="pekerjaanChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <canvas id="pendidikanChart"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
        var ctx = document.getElementById('rayonChart').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
        labels: <?= $districts;?>,
        datasets: [{
            label: ['Anggota'],
            backgroundColor: ['rgb(198, 226, 255)', '#c6e2ff', '#008080', '#4e5337', '#7b911e', '#abca99', '#898694', '#7c96b3', '#996539', '#743708'],
            borderColor: '#eaeaea',
            data: <?= $anggotas;?>
        }]
        },

        // Configuration options go here
        options: {}
        });


        var ctx = document.getElementById('jkChart').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
        labels: ['LAKI-LAKI', 'PEREMPUAN'],
        datasets: [{
            label: 'Anggota',
            backgroundColor: ['#8ba5c0', '#cc3433'],
            borderColor: '#eaeaea',
            data: <?= $jk;?>
        }]
        },

        // Configuration options go here
        options: {}
        });

        var ctx = document.getElementById('pekerjaanChart').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
        labels: <?= $xpekerjaans;?>,
        datasets: [{
            backgroundColor: ['#8ba5c0', '#cc3433', 'salmon'],
            borderColor: '#eaeaea',
            data: <?= $pekerjaans;?>
        }]
        },

        // Configuration options go here
        options: {}
        });


        var ctx = document.getElementById('pendidikanChart').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
        labels: <?= $xpendidikans;?>,
        datasets: [{
            label: 'Anggota',
            backgroundColor: ['#743708', '#c6e2ff', '#008080', '#4e5337', '#7b911e', '#abca99'],
            borderColor: '#eaeaea',
            data: <?= $pendidikans;?>
        }]
        },

        // Configuration options go here
        options: {}
        });
    </script>
@endpush