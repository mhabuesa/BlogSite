<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category(){
        $categories = CategoryModel::all();
        return view('backend.category.category',[
            'categories'=>$categories,
        ]);
    }
    function category_store(Request $request){
    $request->validate([
        'category'=>'required|unique:category_models'
        ]);

        $slug = strtolower($request->category);

        CategoryModel::create([
            'category'=>$request->category,
            'slug'=>$slug,
        ]);
        return back()->with('created', 'Category Created Successfully');

    }

    function category_delete($id){
        CategoryModel::find($id)->delete();
        return back()->with('delete', 'Category Moved to Trash');
    }

    function category_trash(){
        $category_trash = CategoryModel::onlyTrashed()->get();
        return view('backend.category.category_trash',[
            'category_trash'=>$category_trash,
        ]);
    }

    function category_restore($id){
        $category = CategoryModel::withTrashed()->where('id',$id);
        $category->restore();
        return back()->with('restore', 'Category Restored');
    }
    
    function category_per_del($id){
        $category = CategoryModel::withTrashed()->where('id',$id);
        $category->forceDelete();
        return back()->with('permanent', 'Category Permanently Delete');
    }

    function category_update(Request $request,$id){
       
       $category = CategoryModel::find($id)->update([
        'category'=>$request->category
       ]); 
        return back()->with('update', 'Category Updated Successfully');
    }
}
