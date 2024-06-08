@extends('layouts.backend')
@push('header')
<style>
    .modal {
        --bs-modal-width: 28rem;
    }

</style>
@endpush
@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-gray">
                <h3 class="text-white text-center">Category List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered mt-3">
                    <tr class="table-dark">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($categories as $sl=> $category)
                    <tr>
                        <td>{{$sl+1}}</td>
                        <td>{{$category->category}}</td>
                        <td>
                            <a class="" data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <a href="" class="btn" data-bs-toggle="modal"
                                data-bs-target="#modalToggle{{$category->id}}">
                                <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                            </a>
                        </td>
                    </tr>



                    <!-- Category Delete 1-->
                    <div class="modal fade" id="modalToggle{{$category->id}}" aria-labelledby="modalToggleLabel"
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
                                        <a href="{{route('category.delete',$category->id)}}"
                                            class="btn btn-danger mx-5">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Edit Modal --}}
                    <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('category.update', $category->id)}}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="category" class="form-label">Category </label>
                                                <input type="text" id="category" name="category" class="form-control" placeholder="Enter Category" value="{{$category->category}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-gray">
                <h3 class="text-white text-center">Add Category</h3>
            </div>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category" id="category"
                            placeholder="Category Name">
                        @error('category')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mt-4 text-end">
                        <button class="btn btn-primary " type="submit"> Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
@if (session('created'))
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
        title: "{{session('created')}}"
    });

</script>
@endif
@if (session('delete'))
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
        title: "{{session('delete')}}"
    });

</script>
@endif

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





