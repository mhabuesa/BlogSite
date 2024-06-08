<?php

namespace App\Livewire;

use App\Models\BlogModel;
use Livewire\Component;
use Livewire\WithPagination;

class AllBlogs extends Component
{
    use WithPagination;
    public function render()
    {
        $blogs = BlogModel::where('status', '1')->latest()->paginate(9);
        return view('livewire.all-blogs',[
            'blogs'=>$blogs,
        ]);
    }
}
