<?php

namespace App\Http\Controllers\AgentAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Agent;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = 'agent/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('agent.guest', ['except' => 'logout']);
        //parent::__construct();
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('Agent.auth.login');
    }
    
    public function login(Request $request){
        if(Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::guard('agent')->user()->id;
            $agent = Agent::where('userid',$user)->first();
            // dd($agent->status);
            if($agent->status == "Active"){
                return redirect('agent/home');
            }else{
                Auth::logout();
                Session::flush();
                return redirect('agent/login')->withErrors(['You are temporary blocked,please contact admin']);
            }
            
        }else{
            Auth::logout();
            Session::flush();
            return redirect('agent/login')->withErrors(['email' => trans('auth.failed')]);
        }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('agent');
    }

    public function logout(){
        // dd(Auth::guard('agent')->user());
        Auth::logout();
        Session::flush();
        return redirect('agent/login');
        
    }
}
