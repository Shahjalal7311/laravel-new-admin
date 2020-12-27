<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Session;
use Illuminate\Http\Request;

class WebuserLoginController extends Controller 
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:webuser')->except('company_logout');
    }
    
    /**
     * Show the customer's login form.
     *
     * @return \Illuminate\Http\Response
    */
    public function getUserLogin()
    {
        return view('frontend.auth.login');
    }

    /**
     * Functionalities for login
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        $messeage = null;
        $this->validate($request, [
            'user_id' => 'required',
            'user_password' => 'required',
        ]);
        if (auth()->guard('webuser')->attempt(['nickname' => $request->input('user_id'), 'password' => $request->input('user_password')]))
        {
            $user = auth()->guard('webuser')->user();
            return redirect()->route('managements/index');
        }else{
            $message = "存在しないログインIDです/パスワードが異なります";
            return redirect()->route('users/login')->with( ['message' => $message] );
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function company_logout(Request $request)
    {
        Session::flush ();
        Auth::logout ();
        return redirect('/');
    }

    public function redirectTo()
    {
        return route('user/login');
    }
}
