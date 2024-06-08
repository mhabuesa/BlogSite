<?php

namespace App\Http\Controllers;

use App\Models\MainInfoModel;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MainController extends Controller
{
    function info_edit(){
        $info = MainInfoModel::find(1);
        return view('backend.info_edit',[
            'info'=>$info,
        ]);
    }

    function info_update(Request $request){
        $request->validate([
            'about'=>'required',
            'email'=>'required',
            'number'=>'required',
        ]);

        $manager = new ImageManager(new Driver());


        if($request->logo == ''){

            if($request->banner == ''){
                MainInfoModel::find(1)->update([
                    'about'=>$request->about,  
                    'email'=>$request->email,  
                    'number'=>$request->number,
                ]);
            }

            else{

                $current_banner = MainInfoModel::find(1)->banner;
                unlink(public_path('uploads/banner/'.$current_banner));
                $banner_extension = $request->banner->extension();
                $banner_name = 'banner'.'.'. $banner_extension;
                $banner = $manager->read($request->banner);
                $banner->save(public_path('uploads/banner/'.$banner_name));

                MainInfoModel::find(1)->update([
                    'banner'=>$banner_name,  
                    'about'=>$request->about,  
                    'email'=>$request->email,  
                    'number'=>$request->number,
                ]);
            }



        }
        else{


            if($request->banner == ''){

                $current_logo = MainInfoModel::find(1)->logo;
                unlink(public_path('uploads/logo/'.$current_logo));
                $extension = $request->logo->extension();
                $logo_name = 'logo'.'.'. $extension;
                $logo = $manager->read($request->logo);
                $logo->save(public_path('uploads/logo/'.$logo_name));

                MainInfoModel::find(1)->update([
                    'logo'=>$logo_name,  
                    'about'=>$request->about,  
                    'email'=>$request->email,  
                    'number'=>$request->number,
                ]);
            }

            else{

                $current_logo = MainInfoModel::find(1)->logo;
                unlink(public_path('uploads/logo/'.$current_logo));
                $extension = $request->logo->extension();
                $logo_name = 'logo'.'.'. $extension;
                $logo = $manager->read($request->logo);
                $logo->save(public_path('uploads/logo/'.$logo_name));

                $current_banner = MainInfoModel::find(1)->banner;
                unlink(public_path('uploads/banner/'.$current_banner));
                $banner_extension = $request->banner->extension();
                $banner_name = 'banner'.'.'. $banner_extension;
                $banner = $manager->read($request->banner);
                $banner->save(public_path('uploads/banner/'.$banner_name));

                MainInfoModel::find(1)->update([
                    'banner'=>$banner_name,  
                    'logo'=>$logo_name,  
                    'about'=>$request->about,  
                    'email'=>$request->email,  
                    'number'=>$request->number,
                ]);
            }

        }

        return back()->with('updated', 'Info Updated Successfully');

        
    }
}
