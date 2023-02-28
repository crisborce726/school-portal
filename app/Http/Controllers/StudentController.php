<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
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

     //For Admin
    public function index(Request $request){
        if (Gate::allows('isAdmin') || Gate::allows('isCashier') || Gate::allows('isGuidance'))
        {
            $title = "Students";
            $data = User::where('role', 'student')->get();
            
            return view('students.index', compact('title', 'data'));
    
        }
        else
        {
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    //For Student View
    public function profile($id){
        if (Gate::allows('isStudent')){

            $title = "Edit Profile";
            $profile = Student::where('user_id', $id)->first();

            return view('profile.student', compact('title', 'profile'));
            
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Date_default_timezone_set('Asia/Manila');

        $update_profile = Student::find($id);
        $update_profile->birthday = $request['birthday'];
        $update_profile->birthplace = $request['birthplace'];
        $update_profile->religion = $request['religion'];
        $update_profile->civil_status = $request['civil_status'];
        $update_profile->nationality = $request['nationality'];
        $update_profile->mobile_no = $request['mobile_no'];
        $update_profile->address = $request['address'];
        $update_profile->elementary_school = $request['elementary_school'];
        $update_profile->elementary_address = $request['elementary_address'];
        $update_profile->elementary_year_graduated = $request['elementary_year_graduated'];
        $update_profile->highschool_school = $request['highschool_school'];
        $update_profile->highschool_address = $request['highschool_address'];
        $update_profile->highschool_year_graduated = $request['highschool_year_graduated'];
        $update_profile->guardian_name = $request['guardian_name'];
        $update_profile->guardian_contact = $request['guardian_contact'];
        $update_profile->guardian_occupation = $request['guardian_occupation'];
        $update_profile->guardian_address = $request['guardian_address'];
        $update_profile->guardian_relationship = $request['guardian_relationship'];
        $update_profile->mothers_name = $request['mothers_name'];
        $update_profile->mothers_contact = $request['mothers_contact'];
        $update_profile->mothers_occupation = $request['mothers_occupation'];
        $update_profile->mothers_address = $request['mothers_address'];
        $update_profile->mothers_email = $request['mothers_email'];
        $update_profile->fathers_name = $request['fathers_name'];
        $update_profile->fathers_contact = $request['fathers_contact'];
        $update_profile->fathers_occupation = $request['fathers_occupation'];
        $update_profile->fathers_address = $request['fathers_address'];
        $update_profile->fathers_email = $request['fathers_email'];
        $update_profile->save();

        //success, error, info, warning
        Toastr::success('Your profile has been updated successfully :)','Success');

        return redirect()->route('profile.user',auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


}
