<table class="table table-bordered">
    <tr>
        <th>SL</th>
        <th>Date</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach ($blogs as $sl=> $blog )
        <tr>
            <td>{{$sl+1}}</td>
            <td>{{$blog->created_at->format('d-M-Y')}}</td>
            <td>{{$blog->author->name}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->category->category}}</td>
            <td>
                <a wire:click="toggleStatus({{ $blog->id }})" class="text-white btn btn-{{$blog->status == 1?'success':'dark'}}">{{$blog->status == '1'?'On':'Off'}}</a>
            </td>
            <td>
                <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-success"> <i class="fa-solid fa-pencil"></i></a>
                <a wire:click="blogDelete({{ $blog->id }})" class="btn btn-danger text-white"> <i class="fa-solid fa-trash" ></i></a>
            </td>
        </tr>
    @endforeach
</table>