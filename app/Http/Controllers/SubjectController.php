<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Course;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
            $title = "Subjects";
            $data = Subject::all();
            return view('subjects.index', compact('title', 'data'));
    
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
        if (Gate::allows('isAdmin')){
            $title = "Add Subject";
            $senior = Course::where('level', 'Senior High')->get();
            $college = Course::where('level', 'College')->get();
            return view('subjects.create', compact('title', 'senior', 'college'));
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
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request){
        $new_subhect = new Subject();
        $new_subhect->subject_code = $request['subject_code'];
        $new_subhect->subject_title = $request['subject_title'];

        if(!empty($request['college'])){
            $new_subhect->course_id = $request['college'];
            $new_subhect->lec_unit = $request['lecture'];
            $new_subhect->lab_unit = $request['lab'];
        }else{
            $new_subhect->course_id = $request['senior'];
        }

        $new_subhect->save();

        //success, error, info, warning
        Toastr::success('New Subject added successfully :)','Success');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if (Gate::allows('isAdmin')){
            $title = "Edit Subject";
            $subject = Subject::find($id);
            return view('subjects.edit', compact('title', 'subject'));
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
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if (Gate::allows('isAdmin')){
            $subject = Subject::find($id);
            $subject->subject_code = $request['subject_code'];
            $subject->subject_title = $request['subject_title'];
            $subject->save();

            //success, error, info, warning
            Toastr::success('Subject updated successfully :)','Success');

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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $del_subject = Subject::find($request['subject_id']);
        $del_subject->delete();

        //success, error, info, warning
        Toastr::success('Subject deleted successfully :)','Success');

        return back();
    }
}
