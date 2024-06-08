@extends('layouts.backend')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Blog</h3>
            </div>
            <div class="card-body">
                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2 me-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title Here">
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="col-lg-4 mt-2 me-3">
                            <label for="title">Category</label>
                            <select name="category_id" id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
                               @foreach ($categories as $category )
                               <option value="{{$category->id}}">{{$category->category}}</option>
                               @endforeach
                            </select>
                            @error('category')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-lg-8 mt-2">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img class="mt-2" id="blah"  width="250" />
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>                        
                    </div>

                    <div class="mt-2">
                        <label for="short_desp">Short Description</label>
                        <textarea class="form-control" cols="30" rows="5"  id="short_desp" name="short_desp"></textarea>
                        @error('content')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="inp_editor1">Long Description</label>
                        <textarea id="inp_editor1" name="long_desp"></textarea>
                        @error('content')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="title">Meta Title</label>
                        <input type="text" name="meta_title" id="title" class="form-control" placeholder="Meta Title Here">
                        @error('meta_title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="title">Meta Description</label>
                        <textarea name="meta_desp" id="title" cols="30" rows="5" class="form-control"></textarea>
                        @error('meta_desp')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="input-tags">Meta Keyword</label>
                        <input type="text" name="meta_keyword" placeholder="Keyword Here"  id="input-tags" value="" />
                        @error('meta_keyword')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mt-4 text-end">
                       <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="{{asset('backend')}}/js/forms-selects.js"></script>
<script src="{{asset('backend')}}/vendor/libs/select2/select2.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

@if (session('posted'))
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
        title: "{{session('posted')}}"
    });

</script>
@endif

@endpush
