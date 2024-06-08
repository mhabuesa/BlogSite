<div class="card text-center" style="width: 18rem; border: none !important;">
    <div class="card-body">
      <h5 class="card-title">Weekly Newsletter</h5>
      <p class="card-text">Get blog articles and offers via email</p>
        @if (session('subscribed'))
            <span class="alert alert-success" >{{session('subscribed')}}</span>
        @endif
      <form wire:submit="subscribe"class="form-inline my-2 my-lg-0 newsletter-email">
        <div class="input-group mb-2">
            <input wire:model="email" class="form-control mr-sm-2" type="email" placeholder="Your Email" aria-label="email">
            <div class="input-group-text">
                <a href="#"><button class="search-btn"><i class="fa-regular fa-envelope"></i></button></a>
            </div>
        </div>
        @error('email')
            <small class="text-danger">{{$message}}</small>
        @enderror
        <button type="submit" href="#" class="btn btn-primary" style="width: 100% !important;">Subscribe</button>
    </form>
    </div>
  </div>