@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Reply To Subscribers</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-gray ">
                        <tr>
                            <th class="text-white text-center" colspan="2">Previous Reply</th>
                        </tr>
                        @foreach ($replies as $sl=> $reply )
                            
                            <tr>
                                <td class="text-white" width="10px">{{$sl+1}}</td>
                                <td class="text-white">{{$reply->reply}}</td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Reply To Subscribers</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('subscribers.reply.store',$sub->id)}}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label class="form-label">Subscribers Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{$sub->email}}">
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Reply</label>
                           <textarea name="reply" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                           <button class="btn btn-primary">Send Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    @if (session('reply'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{session('reply')}}"
        });
    
    </script>
    @endif

@endpush