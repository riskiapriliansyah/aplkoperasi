@extends('layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs bg-light">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="font-weight-bolder" style="color: black;">Sejarah</h2>

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
                SEJARAH
              </h2>
              <div class="entry-content">
                {!!$sejarah!!}
              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->


        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection

