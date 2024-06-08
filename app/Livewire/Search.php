<?php

namespace App\Livewire;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public function render(Request $request)
    {
        

        $data = $request->all();
        $blogs = BlogModel::where(function ($q) use ($data){

            if(!empty($data['key']) && $data['key'] != '' && $data['key'] != 'undefined'){
                $q->where(function ($q) use ($data){
                    $q->where('title','like', '%' .$data['key'].'%');
                    $q->orWhere('short_desp','like', '%' .$data['key'].'%');
                    $q->orWhere('long_desp','like', '%' .$data['key'].'%');
                    $q->orWhere('meta_keyword','like', '%' .$data['key'].'%');
                });
            }
        })->paginate(20);

        return view('livewire.search',[
            'blogs'=>$blogs,
        ]);
    }
}
