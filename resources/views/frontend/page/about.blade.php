@extends('frontend.layout.master')

@section('title')
    About
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>About Us</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="index.html">Home</a>
                            </li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="about-us-area section-padding">
        <div class="container">
            <div class="row">
                <div class="about-top-inner">
                    <div class="col-md-6">
                        <div class="about-inner">
                            <div class="about-title">
                                <h2>Our Story</h2>
                            </div>
                            <div class="about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minimLorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-image">
                            <img src="{{asset('frontend/img/about/1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="about-bottom-inner">
                    <div class="col-md-6">
                        <div class="about-image">
                            <img src="{{asset('frontend/img/about/2.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-inner">
                            <div class="about-title">
                                <h2>Mission and Vission</h2>
                            </div>
                            <div class="about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minimLorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Area End -->
    <!-- Our Team Area Start -->
    <div class="our-team-area">
        <h2 class="section-title">OUR WRITER</h2>
        <div class="container">
            <div class="row">
                <div class="team-list indicator-style">
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{asset('frontend/img/about/team/1.jpg')}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">rokan tech</a>
                                <p>WRITER</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{asset('frontend/img/about/team/2.jpg')}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">mirinda</a>
                                <p>AUTHOR</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{asset('frontend/img/about/team/3.jpg')}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">jone doe</a>
                                <p>WRITER</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{asset('frontend/img/about/team/4.jpg')}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">nick kon</a>
                                <p>WRITER</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{asset('frontend/img/about/team/2.jpg')}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">mirinda</a>
                                <p>AUTHOR</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img src="{{asset('frontend/img/about/team/1.jpg')}}')}}" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#">rokan tech</a>
                                <p>WRITER</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

