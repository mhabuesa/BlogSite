@extends('layouts.frontend')
@section('content')
    <!-- Banner section -->
    <div class="banner">
        <a href="{{route('single.blog',$latest_blog->slug)}}" style="text-decoration: none; color: black;">
            <div class="card p-2 banner-card mb-4" style="width: 18rem; border: none !important;">
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <p class="post-category">{{$latest_blog->category->category}}</p>
                        </div>
                      </div>
                  <h5 class="card-title">{{$latest_blog->title}}</h5>
                  <div class="row mt-4">
                    <div class="col-md-7">
                        <a href="author.html" style="text-decoration: none; color: black;">
                            @if ($latest_blog->author->photo == null) 
                            <img class="post-img-author"  src="{{asset('frontend')}}/assets/images/post-author.png" alt="" srcset="">
                            @else
                            <img class="post-img-author"  src="{{asset('uploads')}}/profile/{{$latest_blog->author->photo}}" alt="" srcset="">
                            @endif
                            <p class="post-author">{{$latest_blog->author->name}}</p>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <p class="post-date mt-2">{{$latest_blog->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                </div>
            </div>
        </a>           
      </div>

      <!-- Ad section -->
      <div class="row justify-content-center">
        <div class="col-md-12 ad-section text-center">
            <div class="ad-section-txt">
                <p>Advertisement</p>
                <h4>You can place ads</h4>
                <p>750x100</p>
            </div>
        </div>
      </div>
      <!-- Blog section -->
      <!-- Row-1 -->
      <div class="row mb-3">
        <h3 class="my-5 post-header">Latest Post</h3>

        @foreach ($blogs as $blog )
            
        <div class="col-md-4 mb-4">
            <a href="{{route('single.blog',$blog->slug)}}" style="text-decoration: none; color: black;">
                <div class="card p-3">
                    <img class="card-img-top" src="{{asset('uploads')}}/blog/{{$blog->image}}" height="300px" alt="Card image cap"> 
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <p class="post-category">{{$blog->category->category}}</p>
                            </div>
                        </div>
                      <h5 class="card-title">{{$blog->title}}</h5>
                        <div class="row mt-4">
                        <div class="col-md-7">
                            <a href="{{route('single.blog',$blog->slug)}}" style="text-decoration: none; color: black;">
                                @if ($blog->author->photo == null) 
                                <img class="post-img-author"  src="{{asset('frontend')}}/assets/images/post-author.png" alt="" srcset="">
                                @else
                                <img class="post-img-author"  src="{{asset('uploads')}}/profile/{{$blog->author->photo}}" alt="" srcset="">
                                @endif
                                <p class="post-author">{{$blog->author->name}}</p>
                            </a>                               
                        </div>
                        <div class="col-md-5">
                            <p class="post-date mt-2">{{$blog->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </a>                          
        </div>
        @endforeach

        
      </div>

      <!-- View all button -->
            <div class="view-btn mt-4">
                <button><a href="{{route('all.blog')}}" style="text-decoration: none; color: black;">View All Post</a></button>
            </div>
            <!-- Ad section -->

            
@endsection