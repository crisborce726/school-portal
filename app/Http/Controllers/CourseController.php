<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CourseController extends Controller
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
            $title = "Courses";
            $data = Course::where('level', 'Senior High')->get();
            return view('courses.index', compact('title', 'data'));
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    public function college(){
        if (Gate::allows('isAdmin')){
            $title = "Courses";
            $data = Course::where('level', 'College')->get();
            return view('courses.index', compact('title', 'data'));
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
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request){
        if($request['level'] == "Senior High"){
            $code = Course::where('level', $request['level'] )->orderBy('id', 'DESC')->first();
            $new_course = new Course();
            $new_course->id = floor(time()-999999999);
            $new_course->id = $code->id + 1;
            $new_course->course_code = strtoupper($request['course_code']);
            $new_course->course_title = $request['course_title'];
            $new_course->level = $request['level'];
            $new_course->save();
        }else{
            $code = Course::where('level', $request['level'] )->orderBy('id', 'DESC')->first();
            $new_course = new Course();
            $new_course->id = $code->id + 1;
            $new_course->course_code = strtoupper($request['course_code']);
            $new_course->course_title = $request['course_title'];
            $new_course->level = $request['level'];
            $new_course->save();
        }

        //success, error, info, warning
        Toastr::success('New course added successfully :)','Success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $title = "Course";
        $course = Course::find($id);
        $subjects = Subject::where('course_id', $id)->get();
        return view('courses.show', compact('title', 'course', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('isAdmin')){
            $title = "Edit Cours";
            $data = Course::find($id);
            return view('courses.edit', compact('title', 'data'));
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
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        if (Gate::allows('isAdmin')){

            $update_course = Course::find($id);
            if($update_course->course_code != $request['course_code'] || $update_course->course_title != $request['course_title']){
                $update_course->course_code = $request['course_code'];
                $update_course->course_title = $request['course_title'];
                $update_course->save();

                //success, error, info, warning
                Toastr::success('Course updated successfully :)','Success');

                return back();
            }
            //success, error, info, warning
            Toastr::info('Nothing Changes :)','Info');

            return back();            
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $delete_course = Course::find($request['course_id']);
        $delete_course->delete();

        //success, error, info, warning
        Toastr::success('Course deleted successfully :)','Success');

        return back();
    }
}
