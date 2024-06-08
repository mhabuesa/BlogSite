@extends('layouts.backend')
@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img style="width: 100%" src="{{ asset('backend') }}/img/pages/profile-banner.png" alt="Banner image"
                        class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n4 mx-sm-0 mx-auto">
                        @if (Auth::user()->photo == null)
                        <img width="120" src="{{ asset('backend') }}/img/avatars/9.png" alt="user image"
                        class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        @else
                        <img width="120" src="{{ asset('uploads') }}/profile/{{Auth::user()->photo}}" alt="user image"
                        class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        @endif
                    </div>
                    <div class="flex-grow-1 mt-1 mt-sm-2">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{Auth::user()->name}}</h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-calendar"></i> Joined {{Auth::user()->created_at->format('M-Y')}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    @include('backend.profile.acount_nav_pills')

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">Info</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="fa-regular fa-user"></i><span
                                class="fw-medium mx-2 text-heading">Full Name:</span> <span class="text-capitalize">{{Auth::user()->name}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="fa-solid fa-user"> </i><span
                                class="fw-medium mx-2 text-heading">User Name:</span> <span class="text-capitalize">{{Auth::user()->user_name}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="fa-brands fa-square-letterboxd"></i><span
                                class="fw-medium mx-2 text-heading">Designation:</span> <span class="text-capitalize">{{Auth::user()->desig}}</span>
                        </li>
                    </ul>

                    <small class="card-text text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-medium mx-2 text-heading">Email:</span> <span>{{Auth::user()->email}}</span>
                        </li>
                    </ul>

                    <small class="card-text text-uppercase">Social Link</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="fa-brands fa-facebook"></i><span
                                class="fw-medium mx-2 text-heading">Facebook:</span> <span><a href="{{Auth::user()->facebook}}">{{Auth::user()->facebook}}</a></span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="fa-brands fa-square-twitter"></i><span
                                class="fw-medium mx-2 text-heading">Twitter:</span> <span><a href="{{Auth::user()->twitter}}">{{Auth::user()->twitter}}</a></span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="fa-brands fa-square-instagram"></i><span
                                class="fw-medium mx-2 text-heading">Instagram:</span> <span>
                                    <a href="{{Auth::user()->instagram}}">{{Auth::user()->instagram}}</a>
                                </span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="fa-brands fa-youtube"></i><span
                                class="fw-medium mx-2 text-heading">Youtube:</span> <span>
                                    <a href="{{Auth::user()->youtube}}">{{Auth::user()->youtube}}</a>
                                </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <span class="fw-medium mx-2 text-heading">About Me</span>
                    <p>{{Auth::user()->about}}</p>
                </div>
            </div>
            <!--/ About User -->
        </div>
    </div>
    <!--/ User Profile Content -->


@endsection
