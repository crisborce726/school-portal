<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Http\Requests\StoreClassScheduleRequest;
use App\Http\Requests\UpdateClassScheduleRequest;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Semester;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ClassScheduleController extends Controller
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
            $data = ClassSchedule::join('courses', 'class_schedules.course_id', '=', 'courses.id')
                                    ->join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                                    ->join('semesters', 'class_schedules.sem_id', '=', 'semesters.id')
                                    ->join('users', 'class_schedules.teacher_id', '=', 'users.id')
                                    ->select(
                                        'class_schedules.id as class_id',
                                        'courses.course_title as course',
                                        'subjects.subject_title as subject',
                                        'class_schedules.section as section',
                                        'class_schedules.lec_schedule as lec',
                                        'class_schedules.lab_schedule as lab',
                                        'users.firstname as firstname',
                                        'users.middlename as middlename',
                                        'users.lastname as lastname',
                                        'class_schedules.status as stat',
                                    )
                                    ->get();
            return view('classes.index', compact('title', 'data'));
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    //Teacher Role
    //$id here is the id from User Table Table
    public function teacherClass($id){
        if(Gate::allows('isTeacher')){

            $title = "My Classes";
            $data = ClassSchedule::join('courses', 'class_schedules.course_id', '=', 'courses.id')
                                    ->join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                                    ->where('class_schedules.status', 1)
                                    ->where('class_schedules.teacher_id', $id)
                                    ->select(
                                        'class_schedules.id as class_id',
                                        'courses.course_title as course',
                                        'courses.level as level',
                                        'subjects.subject_title as subject',
                                        'class_schedules.section as section',
                                        'class_schedules.lec_schedule as lec',
                                        'class_schedules.lab_schedule as lab',
                                        'class_schedules.status as stat',
                                    )
                                    ->get();

            return view('classes.teacher_class', compact('title', 'data'));
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    //For Teacher Role
    //$id here is the id from ClassSchedule Table
    public function myStudentClass($id){

        $check_user = ClassSchedule::find($id);

        if($check_user != NULL){

            if(Gate::allows('isTeacher') && $check_user->teacher_id == auth()->user()->id){
                $title = "Student List";

                //Add Student Here or Separate Variable
                $data = ClassSchedule::join('courses', 'class_schedules.course_id', '=', 'courses.id')
                                        ->join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                                        ->join('semesters', 'class_schedules.sem_id', '=', 'semesters.id')
                                        ->join('student_classes', 'class_schedules.id', '=', 'student_classes.classes_id')
                                        ->join('users', 'student_classes.student_id', '=', 'users.id')
                                        ->join('grades', 'student_classes.id', '=', 'grades.student_class_id')
                                        ->where('class_schedules.id', $id)
                                        ->select(
                                            'class_schedules.id as class_id',
                                            'courses.course_title as course',
                                            'courses.level as level',
                                            'subjects.subject_title as subject',
                                            'class_schedules.section as section',
                                            'class_schedules.lec_schedule as lec',
                                            'class_schedules.lab_schedule as lab',
                                            'users.*',
                                            'student_classes.id as studClass_id',
                                            'student_classes.student_id as student',
                                            'grades.*'
                                        )
                                        ->get();

                $course = ClassSchedule::join('courses', 'class_schedules.course_id', '=', 'courses.id')
                                        ->where('class_schedules.id', $id)
                                        ->select('courses.course_title as title')
                                        ->first();
                $subject = ClassSchedule::join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                                        ->where('class_schedules.id', $id)
                                        ->select('subjects.subject_title as title')
                                        ->first();

                $lec = ClassSchedule::where('id', $id)->first();
                $lab = ClassSchedule::where('id', $id)->first();
               
               return view('classes.show_student', compact('title','id', 'data', 'course', 'subject', 'lec', 'lab'));

            }else{
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
        }else{
            return redirect()->route('my.class',auth()->user()->id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        if (Gate::allows('isAdmin')){
            $title = "Add Class";
            $senior = Course::where('level', 'Senior High')->get();
            $college = Course::where('level', 'College')->get();
    
            $subject = Subject::where('course_id', ">=", '100')->where('course_id', "<=", 1000)->get();

            $data = $request->all();

            return view('classes.create', compact('title', 'senior', 'college', 'subject'));

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassScheduleRequest $request){

        Date_default_timezone_set('Asia/Manila');

        $new_class = new ClassSchedule();
        $new_class->id = floor(time()-999999999);
        $new_class->course_id = $request['course_id'];
        $new_class->subject_id = $request['subject_id'];
        $new_class->section = $request['class_section'];
        $new_class->sem_id = $request['sem_id'];
        $new_class->lec_schedule = strtoupper($request['lec_days']) . ' | ' . $request['lec_from'] . ' - ' . $request['lec_to'] . ' | ' . strtoupper($request['lec_room']);
        if(!empty(strtoupper($request['lab_days']))){
        
            $new_class->lab_schedule = strtoupper(strtoupper($request['lab_days'])) . ' | ' . $request['lab_from'] . ' - ' . $request['lab_to'] . ' - ' . strtoupper($request['lab_room']);
        }
        $new_class->sem_id = $request['sem_id'];
        $new_class->teacher_id = $request['teacher_id'];
        $new_class->status = $request['class_stat'];
        $new_class->save();

        //success, error, info, warning
        Toastr::success('New class added successfully :)','Success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSchedule $classSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        if (Gate::allows('isAdmin')){

            $title = "Edit Class";
            $class = ClassSchedule::find($id);

            if($class->status == 1){
                $teacher = User::find($class->teacher_id);
                $new_teacher = User::where('role', 'teacher')->get();

                return view('classes.edit', compact('title', 'class', 'teacher', 'new_teacher'));
            }else{
                return redirect()->route('classes.index');
            }
            
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassScheduleRequest  $request
     * @param  \App\Models\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassScheduleRequest $request, $id){
        Date_default_timezone_set('Asia/Manila');

        $request->validate([
            'class_section' => 'required',
            'new_teacher' => 'nullable',
        ]);

        $update_class = ClassSchedule::find($id);
        $update_class->section = $request['class_section'];
        $update_class->teacher_id = $request['new_teacher'];
        $update_class->save();

        //success, error, info, warning
        Toastr::success('Class updated successfully :)','Success');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $delete_class = ClassSchedule::find($request['class_id']);
        $delete_class->delete();

        //success, error, info, warning
        Toastr::success('Class deleted successfully :)','Success');

        return back();
    }

    public function end(Request $request)
    {
        
        $delete_class = ClassSchedule::find($request['class_id']);
        $delete_class->status = 0;
        $delete_class->save();

        //success, error, info, warning
        Toastr::success('Class deleted successfully :)','Success');

        return back();
    }
}
