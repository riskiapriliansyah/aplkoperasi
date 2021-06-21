@extends('layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs bg-light">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="font-weight-bolder" style="color: black;">Visi dan Misi</h2>

        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col entries">

            <article class="entry entry-single" data-aos="fade-up">
              <h2 class="entry-title">
                Misi
              </h2>
              <div class="entry-content">
                {!!$misi!!}
              </div>
              <h2 class="entry-title">
                Visi
              </h2>
              <div class="entry-content">
                {!!$visi!!}
              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->


        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection

