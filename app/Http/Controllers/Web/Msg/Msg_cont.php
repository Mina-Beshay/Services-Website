<?php

namespace App\Http\Controllers\Web\Msg;

use App\Http\Controllers\Controller;
use App\Lib\MsgContent;
use App\Models\User;
use App\Notifications\Msg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class Msg_cont extends Controller
{
    public function send(Request $request){
        if($request->isMethod('post')){
            $users=User::where('role','admin')->get();
            $msg=new MsgContent($request->input('email'),$request->input('name'),$request->input('phone'),$request->input('content'));
            Notification::send($users,new Msg($msg));
            return redirect()->back();


        }else{
            $arr['users']=User::select('name','id')->where('role','admin')->get();
            return view('Web.Msg.Msg_view',$arr);
        }
    }

}
