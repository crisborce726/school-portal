<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class GradeController extends Controller
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
    //For Student Role
    public function index($id)
    {
        if (Gate::allows('isStudent') && auth()->user()->id == $id)
        {
            $title = "Grades";

            //Get the Record from Student Table
            $check = Student::where('user_id', $id)->first();
            //Finding the Course at Course Table
            $course = Course::find($check->course_id);

            if($check->course_id >= 1001){
                //Get all subjects with the Course id
                $subjects1 = Subject::where('course_id', $course->id)->where('level', '1')->get();
                $subjects2 = Subject::where('course_id', $course->id)->where('level', '2')->get();
                $subjects3 = Subject::where('course_id', $course->id)->where('level', '3')->get();
                $subjects4 = Subject::where('course_id', $course->id)->where('level', '4')->get();
            

                //Working, It can extract Record from Database
                #$grades = StudentClass::join('class_schedules', 'student_classes.classes_id', '=', 'class_schedules.id')
                #                       ->join('grades', 'student_classes.id', '=', 'grades.student_class_id')
                #                      ->join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                #                     ->where('student_classes.student_id', $id)
                    #                    ->select('grades.*', 'subjects.subject_code as code')
                    #                   ->get();
                

                //Subjects with Grades only.
                $grades = Grade::join('student_classes', 'student_classes.id', '=', 'grades.student_class_id')
                                    ->join('class_schedules', 'student_classes.classes_id', '=', 'class_schedules.id')
                                    ->join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                                    ->where('student_classes.student_id', $id)
                                    ->select('subjects.id as subID', 'subjects.subject_code as code', 'subjects.subject_title as title', 'grades.*')
                                    ->get();


                return view('grades.college', compact('title', 'subjects1', 'subjects2', 'subjects3', 'subjects4', 'grades'));
            }else{
                //Get all subjects with the Course id
                $subjects1 = Subject::where('course_id', $course->id)->where('level', '11')->get();
                $subjects2 = Subject::where('course_id', $course->id)->where('level', '12')->get();

                //Subjects with Grades only.
                $grades = Grade::join('student_classes', 'student_classes.id', '=', 'grades.student_class_id')
                                    ->join('class_schedules', 'student_classes.classes_id', '=', 'class_schedules.id')
                                    ->join('subjects', 'class_schedules.subject_id', '=', 'subjects.id')
                                    ->where('student_classes.student_id', $id)
                                    ->select('subjects.id as subID', 'subjects.subject_code as code', 'subjects.subject_title as title', 'grades.*')
                                    ->get();


                return view('grades.senior', compact('title', 'subjects1', 'subjects2', 'grades'));

            }
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
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeRequest  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function updateCollege(Request $request){

        Date_default_timezone_set('Asia/Manila');

        $find_grade = Grade::where('student_class_id', $request['class_id'])->first();

        $grade_range = array('1.00', '1.25', '1.50', '1.75', '2.00', '2.25', '2.50', '2.75', '3.00', '4.00', '5.00');



        if(in_array($request['prelim_grade'], $grade_range) || in_array($request['midterm_grade'], $grade_range) || in_array($request['final_grade'], $grade_range))
        {
            if(!empty($request['prelim_grade']) && !empty($request['midterm_grade']) && !empty($request['final_grade'])){
                
                if($request['final_grade'] >= 1 && $request['final_grade'] <= 5){
                    $update_grade = Grade::find($find_grade->id);
                    $update_grade->prelims = $request->input('prelim_grade');
                    $update_grade->midterms = $request->input('midterm_grade');
                    $update_grade->finals = $request->input('final_grade');
                    $update_grade->save();
                    
                    //success, error, info, warning
                    Toastr::success('Grade updated successfully :)','Success');

                    return back();
                }
                //success, error, info, warning
                Toastr::warning('Grade must be in the range of 1-5 only :)','Warning');

                return back();
            }

            if(!empty($request['prelim_grade'])){
                if($request['prelim_grade'] >= 1 && $request['prelim_grade'] <= 5){
                    $update_grade = Grade::find($find_grade->id);
                    $update_grade->prelims = $request->input('prelim_grade');
                    $update_grade->save();
                    
                    //success, error, info, warning
                    Toastr::success('Grade updated successfully :)','Success');

                    return back();
                }
                //success, error, info, warning
                Toastr::warning('Grade must be in the range of 1-5 only :)','Warning');

                return back();
            }elseif(!empty($request['midterm_grade'])){
                if($request['midterm_grade'] >= 1 && $request['midterm_grade'] <= 5){
                    $update_grade = Grade::find($find_grade->id);
                    $update_grade->midterms = $request->input('midterm_grade');
                    $update_grade->save();
                    
                    //success, error, info, warning
                    Toastr::success('Grade updated successfully :)','Success');

                    return back();
                }
                //success, error, info, warning
                Toastr::warning('Grade must be in the range of 1-5 only :)','Warning');

                return back();
            }elseif(!empty($request['final_grade'])){
            if($request['final_grade'] >= 1 && $request['final_grade'] <= 5){
                $update_grade = Grade::find($find_grade->id);
                $update_grade->finals = $request->input('final_grade');
                $update_grade->save();
                
                //success, error, info, warning
                Toastr::success('Grade updated successfully :)','Success');

                return back();
            }
            //success, error, info, warning
            Toastr::warning('Grade must be in the range of 1-5 only :)','Warning');
            return back();
        }            
        }
        //success, error, info, warning
        Toastr::warning('Please follow the grading system for college :)','Warning');
        return back()->with('error', 'Grading System [1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 4.00, 5.00]');
        
        
    }

    public function updateSenior(Request $request){

        Date_default_timezone_set('Asia/Manila');

        $find_grade = Grade::where('student_class_id', $request['class_id'])->first();

        if(!empty($request['prelim_grade']) && !empty($request['midterm_grade']) && !empty($request['final_grade'])){
            
            if($request['final_grade'] >= 70 && $request['final_grade'] <= 99){
                $update_grade = Grade::find($find_grade->id);
                $update_grade->prelims = $request->input('prelim_grade');
                $update_grade->midterms = $request->input('midterm_grade');
                $update_grade->finals = $request->input('final_grade');
                $update_grade->save();
                
                //success, error, info, warning
                Toastr::success('Grade updated successfully :)','Success');

                return back();
            }
            //success, error, info, warning
            Toastr::warning('Grade must be in the range of 70-99 only :)','Warning');

            return back();
        }

        if(!empty($request['prelim_grade'])){
            if($request['prelim_grade'] >= 70 && $request['prelim_grade'] <= 99){
                $update_grade = Grade::find($find_grade->id);
                $update_grade->prelims = $request->input('prelim_grade');
                $update_grade->save();
                
                //success, error, info, warning
                Toastr::success('Grade updated successfully :)','Success');

                return back();
            }
            //success, error, info, warning
            Toastr::warning('Grade must be in the range of 70-99 only :)','Warning');

            return back();
        }elseif(!empty($request['midterm_grade'])){
            if($request['midterm_grade'] >= 70 && $request['midterm_grade'] <= 99){
                $update_grade = Grade::find($find_grade->id);
                $update_grade->midterms = $request->input('midterm_grade');
                $update_grade->save();
                
                //success, error, info, warning
                Toastr::success('Grade updated successfully :)','Success');

                return back();
            }
            //success, error, info, warning
            Toastr::warning('Grade must be in the range of 70-99 only :)','Warning');

            return back();
        }elseif(!empty($request['final_grade'])){
        if($request['final_grade'] >= 70 && $request['final_grade'] <= 99){
            $update_grade = Grade::find($find_grade->id);
            $update_grade->finals = $request->input('final_grade');
            $update_grade->save();
            
            //success, error, info, warning
            Toastr::success('Grade updated successfully :)','Success');

            return back();
        }
        //success, error, info, warning
        Toastr::warning('Grade must be in the range of 70-99 only :)','Warning');

        return back();
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
