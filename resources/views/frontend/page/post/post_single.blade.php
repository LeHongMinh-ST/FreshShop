@extends('frontend.layout.master')

@section('title')
    Blogs
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Blog</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Blogs</li>
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
                <div class="about-top-inner" style="text-align: center">
                    <h1>{{$post->title}}</h1>
                </div>
                <div style="text-align: center">
                    <img src="{{asset('storage/images/post/'.$post->thumbnail)}}" alt="">
                </div>
                <div>
                    <h4>{{$post->description}}</h4>
                </div>
                <div class="about-bottom-inner">
                    <div>
                        {!! $post->content !!}
                    </div>
                </div>
                <div id="product-comments-block-tab">
                    @guest
                        Đăng nhập để bình luận
                    @else
                        <form action="{{route('frontend.post_comment',$post->id)}}" class="form-row"
                              method="post">
                            @csrf
                            <i class="fa fa-pen"></i>
                            <label for="">Viết bình luận: </label>
                            <textarea style="resize: vertical" class="form-control" name="comment" id=""
                                      cols="30" rows="3"></textarea>
                            <button class="btn btn-default" type="submit">Gửi</button>
                        </form>
                    @endguest
                    @if($comments->count() == 0)
                        <h3>Chưa có bình luận!</h3>
                    @else
                        @foreach($comments as $comment)
                            <div class="media">
                                <div>
                                    @if(Auth::user()->id == $comment->user_id || Auth::user()->role ==1)
                                        <form action="{{route('frontend.post_comment.destroy',$comment->id)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="close" aria-label="Close">
                                                <span aria-hidden="true" style="color:red;">&times;</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <img style="width: 64px; height: 64px; border-radius: 50%; "
                                     class="align-self-start mr-3"
                                     src="{{asset('storage/images/user/avatar/default-avatar.png')}}"
                                     alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$comment->User->name}}</h5>
                                    <p>{{$comment->comment}}</p>
                                </div>

                            </div>

                        @endforeach
                    @endif
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


