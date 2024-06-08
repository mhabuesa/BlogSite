@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="text-center text-white">Info Update</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('info.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="logo" class="form-label">Logo</label>
                            <input class="form-control" type="file" name="logo" id="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img class="mt-2" id="blah" src="{{asset('uploads')}}/logo/{{$info->logo}}"  width="100" />
                        </div>   

                        <div class="mt-2">
                            <label for="banner" class="form-label">Banner Image</label>
                            <input class="form-control" type="file" name="banner" id="banner" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                            <img class="mt-2" id="blah2" src="{{asset('uploads')}}/banner/{{$info->banner}}"  width="150" />
                        </div>                      

                        <div class="mt-2">
                            <label for="about" class="form-label">About Info</label>
                           <textarea class="form-control" name="about" id="about" cols="30" rows="5" placeholder="About Info Here">{{$info->about}}</textarea>
                            @error('about')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Your Email Address" value="{{$info->email}}">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="Your Contact Number" value="{{$info->number}}">
                            @error('number')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-4 text-end">
                            <button class="btn btn-primary " type="submit"> Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @if (session('updated'))
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
            title: "{{session('updated')}}"
            });
        </script>
    @endif
@endpush    