@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Blog List</h3>
                    <a class="btn btn-primary" href="{{route('add.blog')}}"><i class="fa-solid fa-plus"></i> &nbsp; Add Blog</a>
                </div>
                <div class="card-body">
                    @livewire('BlogStatus')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@if (session('trash'))
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
        title: "{{session('trash')}}"
    });

</script>
@endif

@if (session('status'))
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
        title: "{{session('status')}}"
    });

</script>
@endif

@endpush
