@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Blog List Trash</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($blogs as $sl=> $blog )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$blog->created_at->format('d-M-Y')}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->category->category}}</td>
                                <td> 
                                    <a href="{{route('blog.restore',$blog->id)}}" title="Permanent Delete" class="btn btn-success"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                    <a href="{{route('blog.per.del',$blog->id)}}" title="Permanent Delete" class="btn btn-danger"><i class="fa-solid fa-trash" ></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')    
@if (session('restore'))
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
        title: "{{session('restore')}}"
    });

</script>
@endif

@if (session('permanent'))
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
        title: "{{session('permanent')}}"
    });

</script>
@endif

@endpush