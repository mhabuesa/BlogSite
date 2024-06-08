@extends('layouts.frontend')
@section('content')
    <!-- Banner section -->
    <div class="banner mb-5">
        <a href="single-post.html" style="text-decoration: none; color: white;">
            <div class="card latest p-2 banner-card-blog-listing mb-4" style="width: 18rem; border: none !important;">
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <p class="post-category-blog-listing">{{$latest_blog->category->category}}</p>
                        </div>
                      </div>
                  <h5 class="card-title">{{$latest_blog->title}}</h5>
                  <div class="row mt-4">
                    <div class="col-md-7">
                            <a href="author.html" style="text-decoration: none; color: black;">
                                <img width="40px" class="rounded-circle" src="{{asset('uploads')}}/profile/{{$latest_blog->author->photo}}" alt="" srcset="">
                                <p class="post-author-blog-listing">{{$latest_blog->author->name}}</p>
                            </a>
                    </div>
                    <div class="col-md-5">
                        <p class="post-date-blog-listing">{{$latest_blog->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                </div>
            </div>
        </a>
      </div>
      <!-- Blog section -->
      <!-- Row-1 -->
      @livewire('AllBlogs')

      
@endsection