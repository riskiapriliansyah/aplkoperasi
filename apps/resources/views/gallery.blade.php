@extends('layouts.app')
@section('content')
    
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs bg-light" >
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-weight-bolder" style="color: black;">Gallery</h2>
        <ol>
          <li class="font-weight-bolder" style="color: black;"><a href="{{route('home')}}">Home</a></li>
          <li class="font-weight-bolder" style="color: black;">Gallery</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="row portfolio-container" data-aos="fade-up">
        @foreach ($galleries as $item)
        {{-- <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <a href="{{asset('gallery/'. $item->foto)}}" data-gall="portfolioGallery" class="venobox preview-link"
              title="{{$item->ket}}"> <img src="{{asset('gallery/'. $item->foto)}}" class="img-fluid" alt=""></a>
            </div>
          </div>
        </div>  --}}
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <img src="{{asset('gallery/'. $item->foto)}}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{$item->ket}}</h4>
            <a href="{{asset('gallery/'. $item->foto)}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$item->ket}}"><i class="bx bx-plus"></i></a>
          </div>
        </div>
        @endforeach
      </div>
      {{$galleries->links()}}
    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->



@endsection

