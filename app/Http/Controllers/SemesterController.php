<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use Illuminate\Support\Facades\Gate;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
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

            $title = "Semester";
            $data = Semester::all();
            return view('semesters.index', 
            [
                'title' => $title, 
                'data' => $data
            ]);

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
     * @param  \App\Http\Requests\StoreSemesterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemesterRequest $request){

        Date_default_timezone_set('Asia/Manila');

        if(!Semester::where('status', 1)->exists()){
            $new_sem = new Semester();
            $new_sem->id = floor(time()-999999999);
            $new_sem->semester = $request['semester'];
            $new_sem->status = $request['sem_stat'];
            $new_sem->save();

            //success, error, info, warning
            Toastr::success('New semester added successfully :)','Success');

            return back();
        }else{
            //success, error, info, warning
            Toastr::info('Please end the current semester first, before setting a new current semester :)','Info');

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $title = "Edit Semester";
        $data = Semester::find($id);

        if($data->status == 0 || $data->status == 1){
            return redirect()->route('semesters.index');
        }else{
            return view('semesters.edit', compact('title', 'data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSemesterRequest  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        Date_default_timezone_set('Asia/Manila');

        $update_sem = Semester::find($id);

        if(!Semester::where('status', 1)->first()){

            if($update_sem->semester != $request['title'] || $update_sem->status != $request['sem_stat']){      
            
                $update_sem->semester = $request['title'];
                $update_sem->status = $request['sem_stat'];
                $update_sem->save();

                //success, error, info, warning
                Toastr::success('Semester updated successfully :)','Success');
            }else{
                //success, error, info, warning
                Toastr::info('Nothing changes :)','Info');
            }

            return back();
        }else{

            //success, error, info, warning
            Toastr::info('Semester has Current Status, Please end first before setting a new current Semester :)','Info');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        if (Gate::allows('isAdmin')){

            $del_sem = Semester::find($request['sem_id']);
                $del_sem->delete();

                //success, error, info, warning
                Toastr::success('Semester deleted successfully :)','Success');
                return back();
            
        }else{

            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }


    public function end(Request $request, $id)
    {
        Date_default_timezone_set('Asia/Manila');

        $end_sem = Semester::find($request['sem_id']);
        $end_sem->status = 0;
        $end_sem->save();

        //success, error, info, warning
        Toastr::success('Semester ended successfully :)','Success');

        return back();
    }
}
