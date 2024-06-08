<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;
use App\Models\SubscribersModel;

class BlogController extends Controller
{
    function blog_list(){
        $blogs = BlogModel::all();
        return view('backend.blog.blog_list', [
            'blogs'=>$blogs,
        ]);
    }

    function add_blog(){
        $categories = CategoryModel::all();
        return view('backend.blog.add_blog',[
            'categories'=>$categories,
        ]);
    }

    function blog_store(Request $request){
        $request->validate([
            'title'=>'required',
            'image'=>'required|image',
            'category_id'=>'required',
            'short_desp'=>'required',
            'long_desp'=>'required',
        ]);

        $manager = new ImageManager(new Driver());



        $clean_title = preg_replace('/[^A-Za-z0-9\- ]/', '', $request->title);
        $replace = str_replace(' ', '', $clean_title);

        $image_extension = $request->image->extension();
        $image_name = substr($replace, '0', 7). random_int('0000','9999') .'.'. $image_extension;
        $image = $manager->read($request->image);
        $image->save(public_path('uploads/blog/'.$image_name));

        $slug = substr($replace, '0', 20). random_int('0000','9999');

        $post = BlogModel::create([
            'title'=>$request->title,
            'image'=>$image_name,
            'category_id'=>$request->category_id,
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            'content'=>$request->content,
            'slug'=>$slug,
            'meta_title'=>$request->meta_title,
            'meta_desp'=>$request->meta_desp,
            'meta_keyword'=>$request->meta_keyword,
            'user_id'=>Auth::user()->id,
        ]);

        $subscribers = SubscribersModel::all();
        foreach ($subscribers as  $subscriber) {
            Mail::to($subscriber->email)->send(new SubscriberMail($post));
        }

        return back()->with('posted', 'Content Posted Successfully');

    }

    function blog_edit(Request $request, $id){
        $blog = BlogModel::find($id);
        $categories = CategoryModel::all();
        return view('backend.blog.blog_edit',[
            'categories'=>$categories,
            'blog'=>$blog,
        ]);
    }

    function blog_update(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'short_desp'=>'required',
            'long_desp'=>'required',
        ]);

        $manager = new ImageManager(new Driver());


        $clean_title = preg_replace('/[^A-Za-z0-9\- ]/', '', $request->title);
        $replace = str_replace(' ', '', $clean_title);
        $slug = substr($replace, '0', 20). random_int('0000','9999');

        if($request->image == ''){
            BlogModel::find($id)->update([
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'short_desp'=>$request->short_desp,
                'long_desp'=>$request->long_desp,
                'slug'=>$slug,
                'meta_title'=>$request->meta_title,
                'meta_desp'=>$request->meta_desp,
                'meta_keyword'=>$request->meta_keyword,
            ]);
        }
        else{
            $current_image = BlogModel::find($id)->image;
            unlink(public_path('uploads/blog/'.$current_image));

            $image_extension = $request->image->extension();
            $image_name = substr($replace, '0', 7). random_int('0000','9999') .'.'. $image_extension;
            $image = $manager->read($request->image);
            $image->save(public_path('uploads/blog/'.$image_name));


            BlogModel::find($id)->update([
                'title'=>$request->title,
                'image'=>$image_name,
                'category_id'=>$request->category_id,
                'short_desp'=>$request->short_desp,
                'long_desp'=>$request->long_desp,
                'slug'=>$slug,
                'meta_title'=>$request->meta_title,
                'meta_desp'=>$request->meta_desp,
                'meta_keyword'=>$request->meta_keyword,
            ]);
        }
        return back()->with('update', ' Blog Updated Successfully');

    }

    function blog_delete($id){

        BlogModel::find($id)->delete();
        return back()->with('trash', ' Blog Move to Trash');
    }

    function blog_trash(){

        $blogs = BlogModel::onlyTrashed()->get();
        return view('backend.blog.trash_blog', [
            'blogs'=>$blogs,
        ]);
    }

    function blog_restore($id){

        BlogModel::withTrashed($id)->restore();
        return back()->with('restore', ' Blog Restored Successfully');

    }

    function blog_per_del($id){

        $current_image =  BlogModel::withTrashed()->findOrFail($id)->image;
        unlink(public_path('uploads/blog/'.$current_image));

        BlogModel::withTrashed()->where('id',$id)->forceDelete();
        return back()->with('permanent', ' Blog Permanently Delete');
    }

    function blog_status($id){
        $status = BlogModel::find($id)->status;

        if($status == 1){
            BlogModel::find($id)->update(['status'=>0]);
        }
        else{
            BlogModel::find($id)->update(['status'=>1]);
        }
        return back()->with('status', ' Blog Status Changed');
    }
}
