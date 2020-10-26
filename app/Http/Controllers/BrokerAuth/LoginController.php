<?php

namespace App\Http\Controllers\BrokerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Broker;
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
    public $redirectTo = 'broker/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('broker.guest', ['except' => 'logout']);
        //parent::__construct();
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('Broker.auth.login');
    }

    public function login(Request $request){
        if(Auth::guard('broker')->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::guard('broker')->user()->id;
            $broker = Broker::where('userid',$user)->first();
            // dd($broker->status);
            if($broker->status == "Active"){
                return redirect('broker/home');
            }else{
                Auth::logout();
                Session::flush();
                return redirect('broker/login')->withErrors(['You are temporary blocked,please contact admin']);
            }
            
        }else{
            Auth::logout();
            Session::flush();
            return redirect('broker/login')->withErrors(['email' => trans('auth.failed')]);
        }
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('broker');
    }
    public function logout(){
        // dd(Auth::guard('broker')->user());
        Auth::logout();
        Session::flush();
        return redirect('broker/login');
        
    }
}
