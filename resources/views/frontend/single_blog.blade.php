@extends('layouts.frontend')
@section('content')
    <!-- Banner section -->
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card p-2 banner-card-single-post" style="width: 18rem; border: none !important;">
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <p class="post-category-single-post">{{$blog->category->category}}</p>
                        </div>
                      </div>
                  <h5 class="card-title" style="font-weight: bold;">{{$blog->title}}</h5>
                  <div class="row mt-4">
                    <div class="col-md-7">
                        @if ($blog->author->photo == null) 
                        <img class="post-img-author"  src="{{asset('frontend')}}/assets/images/post-author.png" alt="" srcset="">
                        @else
                        <img class="post-img-author"  src="{{asset('uploads')}}/profile/{{$blog->author->photo}}" alt="" srcset="">
                        @endif
                        <p class="post-author-single-post">{{$blog->author->name}}</p>
                    </div>
                    <div class="col-md-5">
                        <p class="post-date-single-post mt-2">{{$blog->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                </div>
            </div>


            <!-- post-img-1 -->
            <div class="mb-5">
              <img class="post-img" src="{{asset('uploads')}}/blog/{{$blog->image}}" alt="" srcset="">
            </div>

            <p>{{$blog->short_desp}}</p> <br> 
            
            <p>{!! $blog->long_desp !!}</p>

        </div>
      </div>
@endsection