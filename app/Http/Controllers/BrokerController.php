<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use  App\Models\Broker;
use  App\Models\User;
use Validator;
use File;
class BrokerController extends Controller
{
    public function __construct()
    {
        $this->middleware('broker');
        
    }
    public function index(){
        return view('Broker.home');
    }
    public function editprofile(){
        return view('broker.editprofile');
    }
    public function updateprofile(Request $request){

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password!=null?bcrypt($request->password):Auth::User()->password,
            "password_text" => $request->password!=null?$request->password:Auth::User()->password_text,
            "phone" => $request->phone
            
        ];
        User::where('id',Auth::User()->id)->update($data);
        if($request->hasFile('image'))
        {
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension=time().".".$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('storage/Admin/Broker'),$extension);
            File::delete(public_path('storage/Admin/Broker'.Auth::User()->broker->image));
        }else{
            $extension = Auth::User()->broker->image;
        }
        $data = [
            "image" => $extension,
            "about" => $request->about,
            "tag" => implode('*,*',$request->tags),
            "twitter" => $request->twitter,
            "fb" => $request->fb,
            "google" => $request->google,
            "linkd" => $request->linkd,
            "insta" => $request->insta,
            "education" => $request->education,
            "note" => $request->note,
            "post" => $request->post
        ];
        Broker::where('id',Auth::User()->broker->id)->update($data);
        return redirect()->back()->with('success','Your details are updated successfully');
    }
}
