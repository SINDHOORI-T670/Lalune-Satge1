<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use  App\Models\Agent;
use  App\Models\User;
use Validator;
use File;
class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
        
    }
    public function index(){
        // dd(Auth::User());
        return view('Agent.home');
    }
    public function editprofile(){
        return view('Agent.editprofile');
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
            $request->file('image')->move(public_path('storage/Admin/Agent'),$extension);
            File::delete(public_path('storage/Admin/Agent'.Auth::User()->agent->image));
        }else{
            $extension = Auth::User()->agent->image;
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
        Agent::where('id',Auth::User()->agent->id)->update($data);
        return redirect()->back()->with('success','Your details are updated successfully');
    }
}
