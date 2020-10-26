<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::User()->type == "Broker"){
                return redirect('broker/home');
        }else{
            return redirect('login');
        }
        // dd(Auth::User()->type);
        // if(auth()->check() && Auth::User()->type == "Agent"){
        //     // Agent
        //     return redirect()->route('agent.Agent-Home');
        // }elseif(auth()->check() && Auth::User()->type == "Broker"){
        //     // Broker
        //     return redirect()->route('broker.Broker-Home');
        // }else{
        //     return abort(401, 'Unauthorized');
        // }
    }
}
