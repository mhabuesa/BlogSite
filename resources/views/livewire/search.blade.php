<div class="row mb-3">
    <h3 class="my-5 post-header">Search Result</h3>

   @foreach ($blogs as $blog )
   <div class="col-md-4 mb-4">
    <a href="{{route('single.blog',$blog->slug)}}" style="text-decoration: none; color: black;">
        <div class="card p-3">
            <img class="card-img-top" height="300px" src="{{asset('uploads')}}/blog/{{$blog->image}}" alt="Card image cap"> 
            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <p class="post-category">{{$blog->category->category}}</p>
                    </div>
                </div>
              <h5 class="card-title">{{$blog->title}}</h5>
                <div class="row mt-4">
                <div class="col-md-7">
                    <a href="author.html" style="text-decoration: none; color: black;">
                        <img class="post-img-author" src="{{asset('uploads')}}/profile/{{$blog->author->photo}}" alt="" srcset="">
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

   {{ $blogs->links('vendor.livewire.bootstrap') }}


  </div>