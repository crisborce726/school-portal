<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Charts\UsersChart as ChartsUsersChart;
use App\Charts\AvtiveClassChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth', ['except' => ['welcome']]);
        $this->middleware('check_user');
    }
    
    public function welcome()
    {
        if(!Auth::guest())
        {
            return redirect()->route('home');
        }
        else
        {
            return view('welcome');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ChartsUsersChart $chart, AvtiveClassChart $pie)
    {
        if (Gate::allows('isAdmin'))
        {
            return view('home', ['chart' => $chart->build(), 'pie' => $pie->build()]);
        }
        elseif (Gate::allows('isTeacher') || Gate::allows('isCashier') || Gate::allows('isGuidance')|| Gate::allows('isStudent'))
        {
            return redirect()->route('posts.index');
        }
        else
        {
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
        
    }
}
