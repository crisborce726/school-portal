<?php

namespace App\Http\Controllers;

use App\Models\GuidanceRecord;
use App\Http\Requests\StoreGuidanceRecordRequest;
use App\Http\Requests\UpdateGuidanceRecordRequest;
use Illuminate\Support\Facades\Gate;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GuidanceRecordController extends Controller
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
    public function index()
    {
        if (Gate::allows('isGuidance'))
        {
            $title = "Guidance Records";
            $data = GuidanceRecord::latest()->get();
            return view('guidance.index', compact('title', 'data'));
    
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuidanceRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuidanceRecordRequest $request)
    {
        Date_default_timezone_set('Asia/Manila');

        $new_violation = new GuidanceRecord();
        $new_violation->id = floor(time()-999999999);
        $new_violation->user_id = $request['user_id'];
        $new_violation->violations = $request['violation'];
        $new_violation->save();

        //success, error, info, warning
        Toastr::success('Violation Record added successfully :)','Success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidanceRecord  $guidanceRecord
     * @return \Illuminate\Http\Response
     */
    public function show(GuidanceRecord $guidanceRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidanceRecord  $guidanceRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidanceRecord $guidanceRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuidanceRecordRequest  $request
     * @param  \App\Models\GuidanceRecord  $guidanceRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuidanceRecordRequest $request, GuidanceRecord $guidanceRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidanceRecord  $guidanceRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $del_record = GuidanceRecord::find($request['record_id']);
        $del_record->delete();

        //success, error, info, warning
        Toastr::success('Record deleted successfully :)','Success');
        return back();
    }
}
