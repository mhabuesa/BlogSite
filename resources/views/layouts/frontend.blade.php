<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assetsresponsive.css">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google font work sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-4">
            @php
                $main = App\Models\MainInfoModel::find(1);
            @endphp
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('uploads')}}/logo/{{$main->logo}}" class="logo" alt="Logo" srcset=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>   
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('all.blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="single-post.html">Single post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('all.blog')}}">Pages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
              </ul>
              <form action="{{route('search')}}" method="GET" class="form-inline my-2 my-lg-0">
                <div class="input-group mb-2">
                    <input class="form-control mr-sm-2" type="search" name="key" placeholder="Search" aria-label="Search">
                    <div class="input-group-text">
                        <a href="#"><button class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
              </form>
              <div class="form-check form-switch">
                <input class="form-check-input ml-4" type="checkbox" id="flexSwitchCheckChecked">
              </div>
            </div>
          </nav>

          @yield('content')

          
          <div class="row justify-content-center">
            <div class="col-md-12 ad-section-next text-center">
                <div class="ad-section-txt">
                    <p>Advertisement</p>
                    <h4>You can place ads</h4>
                    <p>750x100</p>
                </div>
            </div>
          </div>

    </div>
    <footer>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3 ">
                    <h4>About</h4>
                    <p>{{$main->about}}</p>
                    <p><span style="font-weight: 600; color: black !important;">Email: </span>{{$main->email}}</p>
                    <p><span style="font-weight: 600 ; color: black !important;">Phone: </span>{{$main->number}}</p>
                </div>
                <div class="col-md-3">
                    <h4>Quick link</h4>
                    <ul class="footer-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="blog-listing.html">Blog</a></li>
                        <li><a href="#">Archieve</a></li>
                        <li><a href="author.html">Author</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Category</h4>
                    <ul class="footer-list">
                      @foreach (App\Models\CategoryModel::all() as $category )
                        
                      <li><a href="#">{{$category->category}}</a></li>

                      @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    @livewire('Subscribe')
                </div>
            </div>
            <hr>
            <div class="copyright">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#"><img src="{{asset('frontend')}}/assets/images/{{$main->logo}}" alt="Logo"></a>
                    </div>
                    <div class="col-md-8">
                        <ul class="copyright-list">
                            <li><a href="#">Terms of Use |</a></li>
                            <li><a href="#">Privacy Policy |</a></li>
                            <li><a href="#">Cookie Policy |</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>     
</footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>