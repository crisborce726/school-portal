<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Http\Requests\StoreStudentClassRequest;
use App\Http\Requests\UpdateStudentClassRequest;
use App\Models\ClassSchedule;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Brian2694\Toastr\Facades\Toastr;

class StudentClassController extends Controller
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

            $title = "Classes";
            $data = StudentClass::all();
            return view('classes.index', compact('title', 'data'));
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    public function studentSchedule($id){

        if (Gate::allows('isStudent')){

            $title = "Schedule";
            $data = StudentClass::where('student_id', $id)->get();
            $level = Student::where('user_id', $id)->first();

            return view('schedules.index', compact('title', 'data', 'level'));
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
    public function create(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentClassRequest $request){
        Date_default_timezone_set('Asia/Manila');

        if(User::where('role', 'student')->where('id', $request['student_id'])->exists()){
            if(!StudentClass::where('classes_id', $request['class_id'])->where('student_id', $request['student_id'])->exists()){

                $check_course = ClassSchedule::find($request['class_id']);
                $check_student_course = Student::where('user_id', $request['student_id'])->first();
                $course = Course::find($check_course->course_id);

                if($check_course->course_id == $check_student_course->course_id){
                    $new_student_class = new StudentClass();
                    $new_student_class->id = floor(time()-999999999);
                    $new_student_class->classes_id = $request['class_id'];
                    $new_student_class->student_id = $request['student_id'];
                    $new_student_class->save();

                    $lastinsertedId = $new_student_class->id;

                    $new_grade = new Grade();
                    $new_grade->id = floor(time()-999999999);
                    $new_grade->student_class_id = $lastinsertedId;
                    $new_grade->save();

                    //success, error, info, warning
                    Toastr::success('New student added to your Class successfully :)','Success');
                
                    return back();
                }else{
                    //success, error, info, warning
                    Toastr::error("Student is not enrolled under $course->course_title course :) ","Info");
                
                    return back();
                }
            }else{
                //success, error, info, warning
                Toastr::warning('Student is already added in your Class :)','Warning');
                return back();
            }
        }else{
            //success, error, info, warning
            Toastr::warning('Student number does not exists :)','Warning');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $studentClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentClassRequest  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentClassRequest $request, StudentClass $studentClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $studentClass)
    {
        //
    }
}
