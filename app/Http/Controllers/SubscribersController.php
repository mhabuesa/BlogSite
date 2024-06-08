<?php

namespace App\Http\Controllers;

use App\Models\SubscribersModel;
use App\Models\SubscribersReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberReply;


class SubscribersController extends Controller
{
    function subscribers(){
        $subscribers = SubscribersModel::latest()->get();
        return view('backend.subscribers.subscribers',[
            'subscribers'=>$subscribers,
        ]);
    }

    function subscribers_reply($id){
        $sub = SubscribersModel::find($id);
        $email = $sub->email;
        $replies = SubscribersReply::where('email', $email)->get();

        SubscribersModel::find($id)->update([
            'view'=>1
        ]);
        return view('backend.subscribers.subscribers_reply', [
            'sub'=>$sub,
            'replies'=>$replies,
        ]);
    }

    function subscribers_reply_store(Request $request, $id){
        $request->validate([
            'reply'=>"required",
        ]);

        $email = SubscribersModel::find($id)->email;
        $reply = $request->reply;
        SubscribersReply::create([
            'email'=>$email,
            'reply'=>$request->reply,
        ]);

        SubscribersModel::find($id)->update([
            'status'=>1
        ]);

        Mail::to($email)->send(new SubscriberReply($reply));

        return back()->with('reply', 'Reply Sended Successfully');
    }
}
