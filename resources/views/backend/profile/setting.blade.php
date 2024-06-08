@extends('layouts.backend')

@push('header')


<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f03e";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 120px;
        height: 120px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

</style>

@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            @include('backend.profile.acount_nav_pills')

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <form action="{{route('profile.settings.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                            <div class="cont">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input name="photo" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>

                                    </div>
                                    <div class="avatar-preview">
                                        @if (Auth::user()->photo == null)
                                        <div id="imagePreview"
                                            style="background-image: url({{ asset('backend') }}/img/avatars/9.png);">
                                        </div>
                                        @else
                                        <div id="imagePreview"
                                            style="background-image: url({{ asset('uploads') }}/profile/{{Auth::user()->photo}});">
                                        </div>
                                        @endif
                                        @error('photo')
                                        <strong>{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-md-3 fv-plugins-icon-container">
                                <label for="firstName" class="form-label">Name</label>
                                <input class="form-control" type="text" id="firstName" name="name"
                                    value="{{Auth::user()->name}}" autofocus="">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="mb-3 col-md-3 fv-plugins-icon-container">
                                <label for="userName" class="form-label">User Name</label>
                                <input class="form-control" type="text" id="userName" name="user_name"
                                    value="{{Auth::user()->user_name}}" autofocus="">
                                    @error('user_name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="mb-3 col-md-3 fv-plugins-icon-container">
                                <label for="desig" class="form-label">Designation</label>
                                <input class="form-control" type="text" id="desig" name="desig"
                                    value="{{Auth::user()->desig}}">
                            </div>
                            <div class="mb-3 col-md-3 fv-plugins-icon-container">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{Auth::user()->email}}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-8 fv-plugins-icon-container">
                                <label for="about" class="form-label">About Me</label>
                               <textarea class="form-control" name="about" id="about" cols="30" rows="12">{{Auth::user()->about}}</textarea>

                            </div>
                            <div class="mb-3 col-md-4">
                                <div class="mb-3 col-md-12 fv-plugins-icon-container">
                                    <label for="firstName" class="form-label">Facebook</label>
                                    <input class="form-control" type="text" id="firstName" name="facebook"
                                        value="{{Auth::user()->facebook}}" autofocus="">
                                </div>
                                <div class="mb-3 col-md-12 fv-plugins-icon-container">
                                    <label for="firstName" class="form-label">Twitter</label>
                                    <input class="form-control" type="text" id="firstName" name="twitter"
                                        value="{{Auth::user()->twitter}}" autofocus="">
                                </div>
                                <div class="mb-4 col-md-12 fv-plugins-icon-container">
                                    <label for="firstName" class="form-label">Instagram</label>
                                    <input class="form-control" type="text" id="firstName" name="instagram"
                                        value="{{Auth::user()->instagram}}" autofocus="">
                                </div>
                                <div class="mb-3 col-md-12 fv-plugins-icon-container">
                                    <label for="firstName" class="form-label">Youtube</label>
                                    <input class="form-control" type="text" id="firstName" name="youtube"
                                        value="{{Auth::user()->youtube}}" autofocus="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save
                                changes</button>
                        </div>

                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>


</div>
@endsection


@push('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
    });

</script>

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
