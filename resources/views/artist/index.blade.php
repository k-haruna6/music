@extends('layouts.layout')
@section('title', 'アーティスト')
@section('script')
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'
        const swiper = new Swiper(".swiper", {
          pagination: {
            el: ".swiper-pagination"
          },
          mousewheel: {
            invert: true,
          },
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "3",
          coverflowEffect: {
            rotate: 80,
            stretch: 0,
            depth: 10,
            modifier: 1,
            slideShadows: true
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
          }
        });
    </script>
@endsection
@section('content')
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach($artists as $artist)
                <img class="swiper-slide" src="{{ secure_asset('storage/image/' . $artist->image_path) }}">
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
@endsection