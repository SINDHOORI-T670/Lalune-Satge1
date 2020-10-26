<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use App\Notifications\UserRegisteredNotification;
use App\Notifications\UpdateUserPasswordNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Route;
use Exception;
use App\Models\User;
use App\Models\Agent;
use App\Models\Broker;
use File;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertySpeciality;
use App\Models\Icon;
use App\Models\PropertyLimit;
use App\Models\PropertyLocation;
use Image;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('admin');
        
    }
    public function index(){
        $agents = Agent::where('status','Active')->count();
        $brokers = Broker::where('status','Active')->count();
        return view('Admin.home',compact('agents','brokers'));
    }
    public function editprofile(){
        return view('Admin.editprofile');
    }
    public function updateprofile(Request $request){
        // dd($request->all());
        $admin = Admin::find($request->admin);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination = ('storage/Admin_avatar');
            $name = uniqid();
            $extension = $file->getClientOriginalExtension();
            $filename = $name . '.' . $extension;
            $file->move($destination, $filename);
        }else{
            $filename =$admin->avatar;
        }
        if($request->password!=null){
            $data=[
                'password' => bcrypt($request->password)
            ];
        }
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $filename
        ];
        Admin::where('id',$request->admin)->update($data);
        return redirect()->back()->with('success','Admin profile updated successfully');
    }
    public function agentslist(){
        $agents = Agent::latest()->paginate(20);
        return view('Admin.agents.agentlist',compact('agents'));
    }
    public function addagent(){
        $agentCode = $this->getAgentId();
        return view('Admin.agents.addagent',compact('agentCode'));
    }
    public function getAgentId()
    {
        $agentId = 'A-001';

        if(Agent::count() > 0) {
            $lastAgent = Agent::orderBy('id','desc')->first();
            $lastAgentCode = explode('-', $lastAgent->code);
            $agentCount = $lastAgentCode[1] + 1;
            $numlength = strlen((string)$agentCount);
            if($numlength == 1) 
                $agentId = 'A-00'.$agentCount;
            if($numlength == 2)
                $agentId = 'A-0'.$agentCount; 
            if($numlength == 3)
                $agentId = 'A-'.$agentCount;
        }
        return $agentId;
    }
    public function storeagent(Request $request){
        // $validator  =   Validator::make($request->all(), [
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:users|email|max:255',
        //     'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'image' => 'image|max:3072',
        //     'password' => 'required|min:6'
        // ]);                                                                                                                                                                                                                               
        // if ($validator->fails()) {
        //     $messages = $validator->messages();
        //     return redirect()->back()->withErrors($messages)->withInput($request->all()); 
        // }else{
        $check = User::where('email',$request->email)->count();
        if($check == 1){
            return redirect()->back()->with('error','This E-mail already exist,Cannot register');
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->password_text = $request->password;
            $user->type = 'Agent';
            $user->phone = $request->phone;
            $user->save();
            $user->notify(new UserRegisteredNotification($user));
            $agent = new Agent();
            $agent->userid = $user->id;
            $agent->code = $request->agent;
            if($request->hasFile('image'))
            {
                $filenameWithExt=$request->file('image')->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$request->file('image')->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $request->file('image')->move(public_path('storage/Admin/Agent'),$extension);
                // File::delete(public_path('storage/candidate_images/'.$oldimage));
            }
            $agent->image = $extension;
            $agent->about = $request->about;
            $agent->tag = implode('*,*',$request->tags);
            $agent->twitter = $request->twitter;
            $agent->fb = $request->fb;
            $agent->google = $request->google;
            $agent->linkd = $request->linkd;
            $agent->insta = $request->insta;
            $agent->post = $request->post;
            $agent->save();

            $limit = new PropertyLimit();
            $limit->userid = $agent->id;
            $limit->type="agent";
            $limit->property_limit = $request->limit;
            $limit->save();

            return redirect()->back()->with('success','New Agent created successfully');
        }
        
    }
    public function editagent($id){
        $agent = Agent::find($id);
        return view('Admin.agents.editagent',compact('agent'));
    }
    public function updateagent(Request $request){
        $agent = Agent::find($request->agent);
        $user = User::find($agent->userid);
        $data = [
            'email' => $request->email
        ];
        $validator  = Validator::make($data, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        if ($validator->fails()) {
            // $errors = $validator->errors();
            // dd($messages);
            return redirect()->back()->withErrors($validator->errors()); 
        }else{
        
        // $check = User::where('email',$request->email)->count();
        // if($check == 1){
        //     return redirect()->back()->with('error','This E-mail already exist,Cannot register');
        // }else{
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password!=null?bcrypt($request->password):$user->password,
                "password_text" => $request->password!=null?$request->password:$user->password_text,
                "phone" => $request->phone
                
            ];
            User::where('id',$user->id)->update($data);
            if($request->hasFile('image'))
            {
                $filenameWithExt=$request->file('image')->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$request->file('image')->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $request->file('image')->move(public_path('storage/Admin/Agent'),$extension);
                File::delete(public_path('storage/Admin/Agent'.$agent->image));
            }else{
                $extension = $agent->image;
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
                "status" => $request->status,
                "post" => $request->post,
            ];
            Agent::where('id',$agent->id)->update($data);
            $oldlimit =PropertyLimit::where('userid',$request->agent)->first();
            // dd($oldlimit);
            if($oldlimit){
                // dd("jhjh");
                $oldlimit->delete();
                $limit = new PropertyLimit();
                $limit->userid = $request->agent;
                $limit->type="agent";
                $limit->property_limit = $request->limit;
                $limit->save();
            }else{
                $limit = new PropertyLimit();
                $limit->userid = $request->agent;
                $limit->type="agent";
                $limit->property_limit = $request->limit;
                $limit->save();
            }
            return redirect()->back()->with('success',$request->name.' details are updated successfully');
        }
    }
    public function deleteagent($id){
        $agent = Agent::find($id);
        User::where('id',$agent->userid)->delete();
        $agent->delete();
        return back()->with('success', 'Agent has been deleted!');
    }
    public function brokerslist(){
        $brokers = Broker::latest()->paginate(20);
        return view('Admin.brokers.brokerlist',compact('brokers'));
    }
    public function addbroker(){
        $brokerCode = $this->getBrokerId();
        return view('Admin.brokers.addbroker',compact('brokerCode'));
    }
    public function getBrokerId()
    {
        $brokerId = 'B-001';

        if(Broker::count() > 0) {
            $lastBroker = Broker::orderBy('id','desc')->first();
            $lastBrokerCode = explode('-', $lastBroker->code);
            $brokerCount = $lastBrokerCode[1] + 1;
            $numlength = strlen((string)$brokerCount);
            if($numlength == 1) 
                $brokerId = 'B-00'.$brokerCount;
            if($numlength == 2)
                $brokerId = 'B-0'.$brokerCount; 
            if($numlength == 3)
                $brokerId = 'B-'.$brokerCount;
        }
        return $brokerId;
    }
    public function storebroker(Request $request){
        // $validator  =   Validator::make($request->all(), [
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:users|email|max:255',
        //     'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'image' => 'image|max:3072',
        //     'password' => 'required|min:6'
        // ]);         
        // // dd($validator);                                                                                                                                                                                                                      
        // if ($validator->fails()) {
        //     $messages = $validator->messages();
        //     return redirect()->back()->withErrors($messages)->withInput($request->all()); 
        // }else{
        $check = User::where('email',$request->email)->count();
        if($check == 1){
            return redirect()->back()->with('error','This E-mail already exist,Cannot register');
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->type = 'Broker';
            $user->password_text = $request->password;
            $user->phone = $request->phone;
            $user->save();
            $user->notify(new UserRegisteredNotification($user));
            $broker = new Broker();
            $broker->userid = $user->id;
            $broker->code = $request->broker;
            if($request->hasFile('image'))
            {
                $filenameWithExt=$request->file('image')->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$request->file('image')->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $request->file('image')->move(public_path('storage/Admin/Broker'),$extension);
                // File::delete(public_path('storage/candidate_images/'.$oldimage));
            }
            $broker->image = $extension;
            $broker->about = $request->about;
            $broker->tag = implode('*,*',$request->tags);
            $broker->twitter = $request->twitter;
            $broker->fb = $request->fb;
            $broker->google = $request->google;
            $broker->linkd = $request->linkd;
            $broker->insta = $request->insta;
            $broker->post = $request->post;
            $broker->save();

            $limit = new PropertyLimit();
            $limit->userid = $broker->id;
            $limit->type='broker';
            $limit->property_limit = $request->limit;
            $limit->save();

            return redirect()->back()->with('success','New Broker created successfully');
        }
        
    }
    public function editbroker($id){
        $broker = Broker::find($id);
        return view('Admin.brokers.editbroker',compact('broker'));
    }
    public function updatebroker(Request $request){
        $broker = Broker::find($request->broker);
        $user = User::find($broker->userid);
        $data = [
            'email' => $request->email
        ];
        $validator  = Validator::make($data, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()); 
        }else{
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password!=null?bcrypt($request->password):$user->password,
                "password_text" => isset($request->password)?$request->password:$user->password_text,
                "phone" => $request->phone
            ];
            User::where('id',$user->id)->update($data);
            if($request->hasFile('image'))
            {
                $filenameWithExt=$request->file('image')->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$request->file('image')->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $request->file('image')->move(public_path('storage/Admin/Broker'),$extension);
                File::delete(public_path('storage/Admin/Broker'.$broker->image));
            }else{
                $extension = $broker->image;
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
                "status" => $request->status,
                "post" => $request->post,
            ];
            Broker::where('id',$broker->id)->update($data);
            $oldlimit =PropertyLimit::where('userid',$request->broker)->where('type','broker')->first();
            // dd($oldlimit);
            if($oldlimit){
                // dd("jhjh");
                $oldlimit->delete();
                $limit = new PropertyLimit();
                $limit->userid = $request->broker;
                $limit->type="broker";
                $limit->property_limit = $request->limit;
                $limit->save();
            }else{
                $limit = new PropertyLimit();
                $limit->userid = $request->broker;
                $limit->type="broker";
                $limit->property_limit = $request->limit;
                $limit->save();
            }
            return redirect()->back()->with('success',$request->name.' details are updated successfully');
        }
    }
    public function deletebroker($id){
        $broker = Broker::find($id);
        User::where('id',$broker->userid)->delete();
        $broker->delete();
        return back()->with('success', 'Broker has been deleted!');
    }
    public function propertylist(){
        $lists = Property::all();
        return view('Admin.properties.propertylist',compact('lists'));
    }
    public function addproperty(){
        $locations = PropertyLocation::all();
        $count = $locations->count();
        $icons = Icon::all();
        return view('Admin.properties.addproperty',compact('icons','locations','count'));
    }
    public function storeproperty(Request $request){
        $locations = PropertyLocation::all();
        $count = $locations->count();
        if($count==0){
            return back()->with('warning', ' Please add property location , otherwise You will not be able to add property!!');
        }else{
            $property = new Property();
            $property->heading = $request->heading;
            $property->description = $request->desc;
            $property->features = implode('*,*',$request->features);
            $property->longitude = $request->longitude;
            $property->latitude = $request->latitude;
            $property->location = $request->location;
            $property->price = $request->price;
            $property->type = $request->type;
            $property->addedBy = Auth::guard('admin')->user()->id;
            $property->user = 'admin';
            $property->save();
            $i = 0;
            foreach ($request->file('files') as $value) {
                $filenameWithExt=$value->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$value->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $value->move(public_path('storage/Property'),$extension);
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $property->id;
                $propertyImage->image = $extension;
                $propertyImage->save();
                $i++;
            }
            
            foreach($request->icons as $key1 => $icon){
                foreach($request->specs as $key2 => $spec){
                    if($key1 == $key2){
                        $propertyspec = new PropertySpeciality();
                        $propertyspec->property_id = $property->id;
                        $propertyspec->icon= $icon;
                        $propertyspec->speciality = $spec;
                        $propertyspec->save();
                        break;
                    }
                }
            }
             
            return redirect()->back()->with('success','Property details added successfully.');
        }
        
    }
    public function editproperty($id){
        $icons = Icon::all();
        $property = Property::find($id);
        $locations = PropertyLocation::all();
        $count = $locations->count();
        if($property->user == 'admin'){
            return view('Admin.properties.editproperty',compact('property','icons','locations','count'));
        }elseif($property->user == 'agent'){
            return view('Admin.properties.editagentproperty',compact('property','icons'));
        }elseif($property->user == 'broker'){
            return view('Admin.properties.editbrokerproperty',compact('property','icons'));
        }
    }
    public function updateadminproperty(Request $request){
        $location = PropertyLocation::all();
        $count = $location->count();
        if($count==0){
            return back()->with('warning', ' Please add property location , otherwise You will not be able to add property!!');
        }else{
            $data = [
                "heading" => $request->heading,
                "description" => $request->desc,
                "features" => implode('*,*',$request->features),
                "longitude" => $request->longitude,
                "latitude" => $request->latitude,
                "location" => $request->location,
                "price" => $request->price,
                "type" => $request->type
            ];
            Property::where('id',$request->property)->update($data);
            
            $imag = PropertyImage::where('property_id',$request->property)->count();
            if($imag==0){
                $data = [
                    'files' => $request->files
                ];
                $validator  = Validator::make($data, [
                    'files' => [
                        'required',
                    ]
                ]);
                // dd($validator);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors()); 
                }else{
                    $i = 0;
                    foreach ($request->file('files') as $value) {
                        $filenameWithExt=$value->getClientOriginalName();
                        $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension=time(). $i .".".$value->getClientOriginalExtension();
                        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                        $value->move(public_path('storage/Property'),$extension);
                        $propertyImage = new PropertyImage();
                        $propertyImage->property_id = $request->property;
                        $propertyImage->image = $extension;
                        $propertyImage->save();
                        $i++;
                    }
                }
                
            }else{
                $i = 0;
                if($request->hasFile('files')){
                    foreach ($request->file('files') as $value) {
                        $filenameWithExt=$value->getClientOriginalName();
                        $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension=time(). $i .".".$value->getClientOriginalExtension();
                        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                        // $path = (public_path('storage/Property/').$extension);
                        // $value = Image::make($value->getRealPath());
                        // for($i = 780, $j = 580; $i < $value->width() && $j < $value->height(); $i += 40, $j += 40) {
                        //     $value = $value->text("La-Lune", $i, $j, function($font) {
                        //         $font->file(public_path('/asset/admin_asset/app-assets/fonts/feather/fonts/feather2467.ttf'));
                        //         $font->size(28);  
                        //         $font->color('#4285F4');  
                        //         $font->align('center');
                        //         $font->valign('top');
                        //         $font->angle(45);
                        //     });
                        // }
                        // $value->save($path);
                        // Storage::put('Property',$extension, $value->encode());
                        $new_filename = Str::slug(strtolower($value->getClientOriginalName()));
                        $img = Image::make($value);
                        $width = $img->width();
                        $height = $img->height();
                        $watermarkSize = $width / 6.2;
                        $watermark = Image::make(public_path('/asset/images/logo.png'));
                        $watermark->resize($watermarkSize, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        
                        $img->insert($watermark, 'center');

                        $img->save(public_path('storage/Property/').$extension);
                        $propertyImage = new PropertyImage();
                        $propertyImage->property_id = $request->property;
                        $propertyImage->image = $extension;
                        $propertyImage->save();
                        $i++;
                    }
                }
                
            }
            
            if(isset($request->icons) && isset($request->specs)){
                foreach($request->icons as $key1 => $icon){
                    foreach($request->specs as $key2 => $spec){
                        if($key1 == $key2){
                            $propertyspec = new PropertySpeciality();
                            $propertyspec->property_id = $request->property;
                            $propertyspec->icon= $icon;
                            $propertyspec->speciality = $spec;
                            $propertyspec->save();
                            break;
                        }
                    }
                }
            }
            return redirect()->back()->with('success','Property details updated successfully.');
        }
    }
    public function updateagentproperty(Request $request){
        $data = [
            "heading" => $request->heading,
            "description" => $request->desc,
            "features" => implode('*,*',$request->features),
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
            "location" => $request->location,
            "price" => $request->price,
            "type" => $request->type
        ];
        Property::where('id',$request->property)->update($data);
        $i = 0;
        $imag = PropertyImage::where('property_id',$request->property)->count();
        if($imag==0){
            $data = [
                'files' => $request->files
            ];
            $validator  = Validator::make($data, [
                'files' => [
                    'required',
                ]
            ]);
            // dd($validator);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors()); 
            }else{
                foreach ($request->file('files') as $value) {
                    $filenameWithExt=$value->getClientOriginalName();
                    $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension=time().".".$value->getClientOriginalExtension();
                    $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                    $value->move(public_path('storage/Property'),$extension);
                    $propertyImage = new PropertyImage();
                    $propertyImage->property_id = $request->property;
                    $propertyImage->image = $extension;
                    $propertyImage->save();
                    $i++;
                }
            }
            
        }else{
            foreach ($request->file('files') as $value) {
                $filenameWithExt=$value->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$value->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $value->move(public_path('storage/Property'),$extension);
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $request->property;
                $propertyImage->image = $extension;
                $propertyImage->save();
                $i++;
            }
        }
        
        if(isset($request->icons) && isset($request->specs)){
            foreach($request->icons as $key1 => $icon){
                foreach($request->specs as $key2 => $spec){
                    if($key1 == $key2){
                        $propertyspec = new PropertySpeciality();
                        $propertyspec->property_id = $request->property;
                        $propertyspec->icon= $icon;
                        $propertyspec->speciality = $spec;
                        $propertyspec->save();
                        break;
                    }
                }
            }
        }
        return redirect()->back()->with('success','Property details updated successfully.');
    }
    public function updatebrokerproperty(Request $request){
        $data = [
            "heading" => $request->heading,
            "description" => $request->desc,
            "features" => implode('*,*',$request->features),
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
            "location" => $request->location,
            "price" => $request->price,
            "type" => $request->type
        ];
        Property::where('id',$request->property)->update($data);
        $i = 0;
        $imag = PropertyImage::where('property_id',$request->property)->count();
        if($imag==0){
            $data = [
                'files' => $request->files
            ];
            $validator  = Validator::make($data, [
                'files' => [
                    'required',
                ]
            ]);
            // dd($validator);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors()); 
            }else{
                foreach ($request->file('files') as $value) {
                    $filenameWithExt=$value->getClientOriginalName();
                    $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension=time().".".$value->getClientOriginalExtension();
                    $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                    $value->move(public_path('storage/Property'),$extension);
                    $propertyImage = new PropertyImage();
                    $propertyImage->property_id = $request->property;
                    $propertyImage->image = $extension;
                    $propertyImage->save();
                    $i++;
                }
            }
            
        }else{
            foreach ($request->file('files') as $value) {
                $filenameWithExt=$value->getClientOriginalName();
                $fileName=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=time().".".$value->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                $value->move(public_path('storage/Property'),$extension);
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $request->property;
                $propertyImage->image = $extension;
                $propertyImage->save();
                $i++;
            }
        }
        
        if(isset($request->icons) && isset($request->specs)){
            foreach($request->icons as $key1 => $icon){
                foreach($request->specs as $key2 => $spec){
                    if($key1 == $key2){
                        $propertyspec = new PropertySpeciality();
                        $propertyspec->property_id = $request->property;
                        $propertyspec->icon= $icon;
                        $propertyspec->speciality = $spec;
                        $propertyspec->save();
                        break;
                    }
                }
            }
        }
        return redirect()->back()->with('success','Property details updated successfully.');
    }
    public function deleteproperty($id){
        $property = Property::find($id);
        $property_images = PropertyImage::where('property_id',$id)->get();
        foreach($property_images as $image){
            File::delete(public_path('storage/Property'.$image->image));
            $image->delete();
        }
        $property_specs = PropertySpeciality::where('property_id',$id)->get();
        foreach($property_specs as $spec){
            $spec->delete();
        }
        $property->delete();
        return back()->with('success', 'Property has been deleted!');
    }
    public function updatepropertyspeciality(Request $request){
        // dd($request->all());
        $data = [
            'icon' => $request->icon,
            'speciality' => $request->spec
        ];
        PropertySpeciality::where('id',$request->spect)->update($data);
        return redirect()->back()->with('success','Property specilaity updated successfully.');
    }
    public function deletepropertyspeciality(Request $request){
        $spec = PropertySpeciality::find($request->id);
        $spec->delete();
            echo "delete";
    }
    public function deletepropertyimage(Request $request){
        $image = PropertyImage::find($request->id);
        File::delete(public_path('storage/Property'.$image->image));
        $image->delete();
        echo "deleted";
    }
    public function propertylocations(Request $request){
        $locations = PropertyLocation::all();
        return view('Admin.properties.mainlocation',compact('locations'));
    }
    public function addpropertylocation(){
        return view('Admin.properties.addpropertylocation');
    }
    public function storepropertylocation(Request $request){
        $location = new PropertyLocation();
        $location->name = $request->location;
        $location->save();
        return redirect()->back()->with('success','Location added successfully');
    }
    public function editpropertylocation($id){
        $location = PropertyLocation::find($id);
        return view('Admin.properties.editpropertylocation',compact('location'));
    }
    public function updateapropertylocation(Request $request){
        $location = [
            "name" => $request->location
        ];
        PropertyLocation::where('id',$request->id)->update($location);
        return redirect()->back()->with('success','Location updated successfully');
    }
}
