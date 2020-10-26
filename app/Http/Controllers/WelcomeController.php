<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Agent;
use App\Models\Broker;
use App\Models\Icon;
use File;
use Session;
use App\Models\Admin;
class WelcomeController extends Controller
{

    public function index(){
        $properties = Property::with('propertyImages','propertySpecialities')->latest()->get();
        $agents = Agent::where('status','Active')->get();
        $brokers = Broker::where('status','Active')->get();
        return view('Welcome.home',compact('properties','agents','brokers'));
    }
    public function agents(){
        $agents = Agent::where('status','Active')->latest()->paginate(20);
        return view('Welcome.agents',compact('agents'));
    }
    public function brokers(){
        $brokers = Broker::where('status','Active')->latest()->paginate(20);
        return view('Welcome.brokers',compact('brokers'));
    }
    public function aboutagent($id){
        $agent = Agent::find($id);
        return view('Welcome.aboutagent',compact('agent'));
    }
    public function aboutbroker($id){
        $broker = Broker::find($id);
        return view('Welcome.aboutbroker',compact('broker'));
    }
    public function propertytype($type){
        if($type=="sell"){
            $properties = Property::where('type','For Sell')->latest()->paginate(20);
        }
        else if($type=="rent"){
            $properties = Property::where('type','For Rent')->latest()->paginate(20);
        }
        else if($type=="all"){
            $properties = Property::where('type','For Sell')->Orwhere('type','For Rent')->latest()->paginate(20);
        }
        $icons = Icon::all();
        return view('Welcome.propertylist',compact('properties','icons'));
    }
    public function propertydetails($id){
        $property = Property::find($id);
        if($property->user == 'admin'){
            $user = Admin::find($property->addedBy);
        }
        elseif($property->user == 'agent'){
            $user = Agent::find($property->addedBy);
        }
        elseif($property->user == 'broker'){
            $user = Broker::find($property->addedBy);
        }
        $icons = Icon::all();
        return view('Welcome.propertydetails',compact('property','icons','user'));
    }
}
