<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{

    function profile(){
        return view('backend.profile.profile');
    }

    public function profile_setting()
    {
        return view('backend.profile.setting');
    }

    function profile_security(){
        return view('backend.profile.security');
       }



       function profile_settings_update(Request $request){
        $request->validate([
            'name'=>'required',
            'user_name'=>'required|unique:users'
        ]);

        $photo = $request->photo;
        $manager = new ImageManager(new Driver());
        $user_name = str_replace(' ','_',$request->user_name);
        



        //submit without Image
        if($photo == ''){
            User::find(Auth::id())->update([
                'name'=>$request->name,
                'user_name'=>$user_name,
                'about'=>$request->about,
                'desig'=>$request->desig,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ]);
        }

        //submit with Image
        else{

            //submit with Image, before photo empty
            if(Auth::user()->photo == null){

                $extension = $photo->extension();
                $name = str_replace(' ', '', Auth::user()->name);
                $image_name = $name. random_int('000', '999') .'.'. $extension;
                $image = $manager->read($photo);


                $image->resize(400,400)->save(public_path('uploads/profile/'.$image_name));

                User::find(Auth::id())->update([
                    'name'=>$request->name,
                    'photo'=>$image_name,
                    'about'=>$request->about,
                    'desig'=>$request->desig,
                    'facebook'=>$request->facebook,
                    'twitter'=>$request->twitter,
                    'instagram'=>$request->instagram,
                    'youtube'=>$request->youtube,
                ]);
            }

            else{

                //submit with Image, before photo exist


                $current_img = public_path('uploads/profile/'.Auth::user()->photo);
                unlink($current_img);

                $extension = $photo->extension();
                $name = str_replace(' ', '', Auth::user()->name);
                $image_name = $name. random_int('000', '999') .'.'. $extension;
                $image = $manager->read($photo);

                $image->resize(400,400)->save(public_path('uploads/profile/'.$image_name));

                User::find(Auth::id())->update([
                    'name'=>$request->name,
                    'photo'=>$image_name,
                    'about'=>$request->about,
                    'desig'=>$request->desig,
                    'facebook'=>$request->facebook,
                    'twitter'=>$request->twitter,
                    'instagram'=>$request->instagram,
                    'youtube'=>$request->youtube,
                ]);
            }


        }

        return back()->with('update', 'Profile Update Successful');


   }



       //profile security update
    function profile_security_update(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>['required', 'different:current_password',
            Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation'=>['required', 'same:password'],
        ]);
    
        $current_pass = $request->current_password;
        $pass = $request->password;
        $auth = Auth::user();
    
            if (!Hash::check($current_pass, $auth->password)){
                return back()->with('error', 'Current Password Is Wrong');
            }
            else{
    
                User::find(Auth::id())->update([
                    'password'=>bcrypt($pass),
                ]);
            }
    
        return back()->with('update', ' Password Updated Successfully');
    
        }

}
