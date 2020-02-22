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
                        <h2>Giới thiệu</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Giới thiệu</li>
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
                                <h2>Về chúng tôi</h2>
                            </div>
                            <div class="about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minimLorem ipsum dolor sit amet, consectetur adipisicing elitss ed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Utes enim ad minim veniam, quis nostrud exerck itation ullam co laboris nisi ut aliquip ex ea commodo coes nsequat. Duis aute irure dolor in reprehenderit in. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-image">
                            <img src="{{asset('frontend/img/about/thuc-pham-chong-nang.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="about-bottom-inner">
                    <div class="col-md-6">
                        <div class="about-image">
                            <img src="{{asset('frontend/img/about/thucphamchaydepdaanh1-1501128021680.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-inner">
                            <div class="about-title">
                                <h2>Mục tiêu và Nhiệm vụ</h2>
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
        <h2 class="section-title">Bài viết khác</h2>
        <div class="container">
            <div class="row">
                <div class="team-list indicator-style">
                    @foreach($posts as $post)
                        <div class="col-md-3">
                            <div class="single-blog">
                                <a href="{{route('frontend.post',$post->id)}}">
                                    <img src="{{asset('storage/images/post/'.$post->thumbnail)}}" alt="">
                                </a>
                                <div class="blog-info text-center">
                                    <a href="{{route('frontend.post',$post->id)}}"><h2>{{$post->title}}</h2></a>
                                    <div class="blog-info-bottom">
                                        <span class="blog-author">BY: {{$post->User->name}}</span>
                                        <span class="blog-date">{{date_format($post->created_at,'d-m-Y')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

