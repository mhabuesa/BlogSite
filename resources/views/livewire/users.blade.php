<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-gray">
                <h3 class="text-white text-center">User List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered mt-3">
                    <tr class="table-dark">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        
                    </tr>

                    @foreach ($users as $sl=> $user )
                        <tr>
                            <td>{{$sl+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                <a wire:click="userDelete({{ $user->id }})" class="btn">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </a>
                            </td>
                        </tr>


                        <!-- Category Delete 1-->
                    <div class="modal fade" id="modalToggle{{$user->id}}" aria-labelledby="modalToggleLabel"
                        tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="modal-title text-center text-danger" id="modalToggleLabel">WORNING</h3>
                                    <h5 class="text-center">Are yoy Sure?</h5>

                                    <div class="button d-flex justify-content-center">
                                        <button type="button" class="btn btn-label-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>


                                            <button type="button" wire:click="userDelete({{ $user->id }})" wire:confirm="Are you sure you want to delete this post?" >
                                        Delete post 
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-body demo-vertical-spacing demo-only-element">
            <form wire:submit="user">
                @csrf
                <div class="card mb-4">
                    <div class="card-header bg-gray text-center">
                        <h3 class="text-white">Add User</h3>
                        @if (session('created'))
                            <span class="alert alert-success" >{{session('created')}}</span>
                        @endif
                    </div>
                    <div class="card-body demo-vertical-spacing demo-only-element mt-3">

                    <div class="">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-user"></i></span>
                            <input id="name" type="text" wire:model="name" class="form-control" placeholder="Your Name..." required aria-label="Your Name..." aria-describedby="basic-addon-search31" />
                        </div>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        
                    </div>

                    <div class="">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-mail"></i></span>
                            <input id="email" type="email" wire:model="email" class="form-control" placeholder="example@xyz.com..." aria-label="Email..." required aria-describedby="basic-addon-search31" />
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
                            <input type="password" wire:model="password" required class="form-control" id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" />
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
