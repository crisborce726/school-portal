<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;


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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['status'] = 1;

        return $credentials;
    }
    
    public function username()
    {
        $login = request()->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'idno';
        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    function authenticated(Request $request, $user)
    {
        date_default_timezone_set('Asia/Manila');

        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email'=> $email,'password'=> $password, 'status'=> '1'])) 
        {
            Toastr::success('Login successfully :)','Success');
        }
        else 
        {
            Toastr::error('fail, WRONG EMAIL OR PASSWORD :)','Error');
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        // forget login session

        auth()->guard()->logout();
        Toastr::success('Logout successfully :)','Success');
        return redirect('/login');
    }

}