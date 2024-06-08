<?php

namespace App\Livewire;

use App\Models\BlogModel;
use Livewire\Component;

class BlogStatus extends Component
{

    public function toggleStatus($id){
        $status = BlogModel::find($id)->status;

        if($status == 1){
            BlogModel::find($id)->update(['status'=>0]);
        }
        else{
            BlogModel::find($id)->update(['status'=>1]);
        }
        return back()->with('status', ' Blog Status Changed');
    }

    public function blogDelete($id){

        $user = BlogModel::find($id);
        BlogModel::find($id)->delete();
        request()->session()->flash('trash', 'Blog Move to Trash');
    }


    public function render()
    {        
        $blogs = BlogModel::latest()->get();
        return view('livewire.blog-status',[
            'blogs'=>$blogs,
        ]);
    }
}
