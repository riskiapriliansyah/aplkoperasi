@extends('layouts.app')
@section('content')
    
  

  <!-- ======= Hero Section ======= -->
  {{-- <section id="hero"> --}}
    <div id="carouselExampleFade" class="carousel slide carousel-fade mt-5" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($sliders as $item)
        <div class="carousel-item @if($loop->iteration == 1) active @endif">
          <img src="{{asset('slider/'. $item->val1)}}" class="d-block w-100" alt="...">
        </div> 
        @endforeach
        
        {{-- <div class="carousel-item ">
          <img src="{{asset('assets/img/foto1.jpeg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item ">
          <img src="{{asset('assets/img/foto2.jpeg')}}" class="d-block w-100" alt="...">
        </div> --}}
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox"> -->

        <!-- Slide 1 -->
        <!-- <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>Company</span></h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam.
                Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus
                deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div> -->

        <!-- Slide 2 -->
        <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Lorem Ipsum Dolor</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam.
                Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus
                deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div> -->

        <!-- Slide 3 -->
        <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Sequi ea ut et est quaerat</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam.
                Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus
                deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div> -->

      <!-- </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div> -->
  {{-- </section> --}}
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us projects-section bg-light">
      <div class="container">
        <div class="" data-aos="fade-up">

          <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6" data-aos="fade-right">
              <img class="img-fluid float-right" src="{{asset('assets/img/ditoAMPI.png')}}" width="300" alt="" />
            </div>
            <div class="col-lg-6 order-lg-first" data-aos="fade-left">
              <div class="bg-black text-center h-100 project">
                <div class="d-flex h-100">
                    <div class="project-text w-100 my-auto text-center text-lg-left">
                        <h4 class="text-uppercase">Sejarah AMPI</h4>
                        <p class="mb-0">{!!  Str::limit($sejarah, 200, '...') !!}</p>
                        <hr class="d-none d-lg-block mb-0 ml-0" />
                        <a href="{{route('sejarah')}}" class="btn btn-info mt-2">Selengkapnya</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center no-gutters">
            <div class="col-lg-6 text-center" data-aos="fade-left"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}" alt="" /></div>
            <div class="col-lg-6" data-aos="fade-right">
              <div class="bg-black text-center h-100 project">
                  <div class="d-flex h-100">
                      <div class="project-text w-100 my-auto text-center text-lg">
                          <p><h3>Misi :</h3> {!!Str::limit($misi, 100, '...')!!}</p>
                          <p class="mb-0 "><h3>Misi :</h3> {!!Str::limit($visi, 500, '...')!!} </p>
                          
                          <hr class="d-none d-lg-block mb-0 mr-0" />
                          <a href="{{route('visiMisi')}}" class="btn btn-info mt-2">Selengkapnya</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
      </div>
      
    </section><!-- End About Us Section -->
    
    <div class="container my-4">
      <div class="row ">
        <div class="col-md-4">
          <div id="carouselExampleFade1" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              @foreach ($slidersMini as $item)
              <div class="carousel-item @if($loop->iteration == 1) active @endif">
                <img src="{{asset('slider/'. $item->val1)}}" class="d-block w-100" alt="...">
              </div> 
              @endforeach
              
              {{-- <div class="carousel-item ">
                <img src="{{asset('assets/img/foto1.jpeg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item ">
                <img src="{{asset('assets/img/foto2.jpeg')}}" class="d-block w-100" alt="...">
              </div> --}}
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade1" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-md-8">
          <div class="jumbotron" style="height: 100;">
            <h4 class="text-center">Daftar Sebagai Calon Pengurus dan Kader AMPI</h4>
            <div class="row justify-content-center">
              <div class="col-md-2">
                <a href="{{route('pendaftaran')}}" class="btn btn-info btn-block">Daftar</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <section id="profil" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profil Pimpinan</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="{{asset('gallery/tes5.jpeg')}}" width="250"  class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>H. RUDY MASUD</h4>
                <span>KETUA DPD TK 1</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{asset('gallery/tes4.jpeg')}}" width="250" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>&nbsp</h4>
                <span>Sekjen</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="{{asset('gallery/1613880226Foto Pertama.jpeg')}}" width="150"  class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>H. HENDRA</h4>
                <span>KETUA DPD TK 2</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="{{asset('gallery/tes6.jpeg')}}" width="174" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>DITO ARIOTEDJO</h4>
                <span>KETUA UMUM DPP AMPI</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="{{asset('gallery/1613728934Arie Wibowo.jpeg')}}" width="200" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>ARIE WIBOWO</h4>
                <span>KETUA DPD AMPI SAMARINDA</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-title">
          <h2>KEGIATAN</strong></h2>
        </div>

        <div class="row">
          @foreach ($kegiatans as $item)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <a href="{{route('kegiatan.show', $item->slug)}}">
            <div class="card h-100">
              @if (isset($item->foto))
              <img class="card-img-top" src="{{asset('xkegiatan/'.$item->foto)}}" width="10" alt="">
              @else
              <img class="card-img-top" src="{{asset('xkegiatan/no-thumbnail.jpg')}}" width="10" alt="">
              @endif
                <div class="card-body">
                  <h5><a href="{{route('kegiatan.show', $item->slug)}}">{{$item->judul}}</a></h5>
                   <small>{{$item->created_at->format('d M Y')}}</small>
                </div>
            </div>
            </a>
          </div>   
          @endforeach

        </div>
        <a href="{{route('kegiatan')}}" class="btn btn-info btn-block mt-2">Selengkapnya</a>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="min-height: 1000px">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Galery</h2>
        </div>

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

    

        <a href="{{route('gallery')}}" class="btn btn-info btn-block">Selengkapnya</a>
      </div>
    </section><!-- End Portfolio Section -->


  </main><!-- End #main -->
@endsection

