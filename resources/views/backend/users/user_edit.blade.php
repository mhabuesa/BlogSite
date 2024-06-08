@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header bg-gray">
                            <h3 class="text-white text-center">Update User</h3>
                        </div>
                        <div class="card-body demo-vertical-spacing demo-only-element mt-3">
    
                        <div class="">
                            <label for="name" class="form-label">Name</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-user"></i></span>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Your Name..." required aria-label="Your Name..." aria-describedby="basic-addon-search31" value="{{$user->name}}" />
                            </div>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            
                        </div>
    
                        <div class="">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-mail"></i></span>
                                <input id="email" type="email" name="email" class="form-control" placeholder="example@xyz.com..." aria-label="Email..." required aria-describedby="basic-addon-search31"value="{{$user->email}}" />
                            </div>
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
    
                        <div class="mt-2">
                            <label for="basic-default-password32" class="form-label">Password</label>
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-lock"></i></span>
                                <input type="password" name="password" class="form-control" id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" />
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
    
    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@if (session('update'))
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "{{session('update')}}"
    });
</script>
@endif

@endpush