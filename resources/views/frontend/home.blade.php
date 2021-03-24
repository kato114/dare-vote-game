@extends('layout.front')
@section('content')
    <!-- ========== Start Banner Area ============= -->
    <section id="particles-js" class="banner_area">
        <div class="swiper_content">
            <div class="custom_container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="">
                    </div>
                    <div class="col-sm-12">
                        <div class="slider_left">
                            <h1><span>Welcome to the Dare Platform</span></h1>
                            <h2>The first game show on the blockchain!</h2>
                        </div>
                    </div>
                </div>
                <div class="social-items text-center">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-medium-m"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-discord"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-telegram-plane"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
