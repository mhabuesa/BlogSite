<?php

namespace App\Livewire;

use App\Models\SubscribersModel;
use Carbon\Carbon;
use Livewire\Component;

class Subscribe extends Component
{
    public $email = '';
    public function subscribe()
    {
        
        $this->validate([
            'email'=>'required|email|unique:subscribers_models',
        ]);

        SubscribersModel::insert([
            'email'=>$this->email,
            'created_at'=>Carbon::now(),
        ]);
        $this->reset(['email']);
        request()->session()->flash('subscribed', 'Thanks to Subscribe');
    }


    public function render()
    {
        
        return view('livewire.subscribe');
    }
}
