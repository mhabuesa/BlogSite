<?php

namespace App\Livewire;

use App\Models\BlogModel;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Users extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    public function user()
    {
       
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        $user_name = str_replace(' ','_',$this->name) .'_'. Auth::id();

        User::insert([
            'name'=>$this->name,
            'user_name'=>$user_name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
            'created_at'=>Carbon::now(),
        ]);



        $this->reset(['name', 'email', 'password']);
        request()->session()->flash('created', 'User Created Successfully');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.users',[
            'users'=>$users,
        ]);
    }

    public function userDelete($id){

        $user = User::find($id);
        if($user->photo != null){
            unlink(public_path('uploads/profile/'.$user->photo));
            BlogModel::where('user_id', $id)->delete();
            User::find($id)->delete();
        }
        else{
            BlogModel::where('user_id', $id)->delete();
            User::find($id)->delete();
        }
        request()->session()->flash('delete', 'User Deleted Successfully');
    }
}
