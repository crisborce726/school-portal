<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Brian2694\Toastr\Facades\Toastr;

class FacultyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Array portion is for you to except pages.
        //$this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
        $this->middleware('check_user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Gate::allows('isAdmin')){
            $title = "Faculties";
            $data = User::where('role', '!=', 'student')->get();

            return view('faculties.index', compact('title', 'data'));
    
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacultyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacultyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    //For Teacher View
    public function show($id){
        if (auth()->user()->role != 'student'){

            $title = "Edit Profile";
            $profile = Faculty::where('user_id', $id)->first();

            return view('profile.faculty', compact('title', 'profile'));
            
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacultyRequest  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacultyRequest $request, $id)
    {
        Date_default_timezone_set('Asia/Manila');

        $update_profile = Faculty::find($id);
        $update_profile->birthday = $request['birthday'];
        $update_profile->birthplace = $request['birthplace'];
        $update_profile->religion = $request['religion'];
        $update_profile->civil_status = $request['civil_status'];
        $update_profile->nationality = $request['nationality'];
        $update_profile->mobile_no = $request['mobile_no'];
        $update_profile->address = $request['address'];
        $update_profile->save();

        //success, error, info, warning
        Toastr::success('Your profile has been updated successfully :)','Success');

        return redirect()->route('profile.user',auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        //
    }


    //For Teacher View
    public function profile($id){
        if (auth()->user()->role != 'student'){

            $title = "Edit Profile";
            $profile = Faculty::where('user_id', $id)->first();

            return view('profile.faculty', compact('title', 'profile'));
            
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }
}
