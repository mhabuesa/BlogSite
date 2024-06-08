<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $categories = CategoryModel::all();
        $blogs = BlogModel::where('status', '1')->latest()->take(9)->get();
        $latest_blog = BlogModel::latest()->first();
        return view('frontend.index',[
            'blogs'=>$blogs,
            'latest_blog'=>$latest_blog,
            'categories'=>$categories,
        ]);
    }

    function single_blog($slug){
        $blog = BlogModel::where('slug',$slug)->get()->first();
        return view('frontend.single_blog',[
            'blog'=>$blog,
        ]);
    }

    function all_blog(){

        
        $latest_blog = BlogModel::latest()->first();
        return view('frontend.all_blog',[
            'latest_blog'=>$latest_blog,
        ]);
    }

    function search(){
        return view('frontend.search');
    }
}
