<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function users(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('backend.users.users', [
            'users'=>$users,
        ]);
    }

    // User Insert
    function users_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        $user_name = str_replace(' ','_',$request->name) .'_'. Auth::id();

        User::insert([
            'name'=>$request->name,
            'user_name'=>$user_name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('created', 'User Created Successfully');
    }

    // user edit
    function user_edit($id){
        $user = User::find($id);
        return view('backend.users.user_edit', compact('user'));
    }

     // user Update
    function user_update(Request $request, $id){
        $user = User::find($id);

        if($user->email == $request->email){
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
            ]);
            
            if($request->password == null){
                User::find($id)->update([
                    'name'=>$request->name,
                 ]);
            }
            else{
                User::find($id)->update([
                    'name'=>$request->name,
                    'password'=>bcrypt($request->password),
                 ]);
            }
        }
        else{
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
            ]);
            if($request->password == null){
                User::find($id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                 ]);
            }
            else{
                User::find($id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                 ]);
            }
        }


         
        return back()->with('update', 'User Update Successfully');
    }

    // User Delete
    function user_delete($id){

        $user = User::find($id);

        if($user->photo != null){
            unlink(public_path('uploads/profile/'.$user->photo));
            User::find($id)->delete();
        }
        else{
            User::find($id)->delete();
            
        }
        return back()->with('delete', 'User Deleted Successfully');
        
    }


    function roll(){
        return view('backend.users.roll');
    }
}
