@extends('layouts.backend')
@section('content')
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header bg-gray">
                <h3 class="text-white text-center">Categorry Trash List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered mt-3">
                    <tr class="table-dark">
                        <th>SL</th>
                        <th>Catgory</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($category_trash as $sl=> $category )
                        <tr>
                            <td>{{$sl+1}}</td>
                            <td>{{$category->category}}</td>
                            <td>
                                <a href="{{route('category.restore',$category->id)}}" title="Permanent Delete" class="btn btn-success"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                <a href="{{route('category.per.del',$category->id)}}" title="Permanent Delete" class="btn btn-danger"><i class="fa-solid fa-trash" ></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
        timerProgressBar: true,
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
        timerProgressBar: true,
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
