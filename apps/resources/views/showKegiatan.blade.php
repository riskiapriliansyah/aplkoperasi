@extends('layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs bg-light">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="font-weight-bolder" style="color: black;">Blog</h2>
          <ol>
            <li class="font-weight-bolder" style="color: black;"><a href="{{route('home')}}">Home</a></li>
            <li class="font-weight-bolder" style="color: black;">Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single" data-aos="fade-up">

                <div class="entry-img">
                    @if (isset($kegiatan->foto))
                    <img class="card-img-top" src="{{asset('xkegiatan/'.$kegiatan->foto)}}" width="10" alt="">
                    @else
                    <img class="card-img-top" src="{{asset('xkegiatan/no-thumbnail.jpg')}}" width="10" alt="">
                    @endif
                  </div>

              <h2 class="entry-title">
                {{$kegiatan->judul}}
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$kegiatan->created_at->format('d M Y')}}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! $kegiatan->content !!}
              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($rKegiatans as $item)
                <div class="post-item clearfix">
                  @if (isset($item->foto))
                  <img src="{{asset('xkegiatan/'.$item->foto)}}" alt="">
                  @else
                  <img src="{{asset('xkegiatan/no-thumbnail.jpg')}}" alt="">
                  @endif
                  <h4><a href="{{route('kegiatan.show', $item->slug)}}">{{$item->judul}}</a></h4>
                  <time datetime="2020-01-01">{{$item->created_at->format('d M Y')}}</time>
                </div>

                @endforeach

              </div><!-- End sidebar recent posts-->


            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection

