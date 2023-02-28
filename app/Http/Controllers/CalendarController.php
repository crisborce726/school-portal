<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
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
        
        $title = "Calendar";
        $calendars = Calendar::latest()->paginate(10);
        return view('calendar.index', 
        [
            'title' => $title, 
            'calendars' => $calendars
        ]);
     }
     public function store(Request $request)
     {
        if(auth()->user()->role != 'student')
        {
            $request->validate([
                'title' => 'required|string'
            ]);
    
            Calendar::create([
                'id' => floor(time()-999999999),
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDay(1),
                'color' => $request->category,
            ]);

            //success, error, info, warning
            Toastr::success('New Event added successfully :)','Success');

            return back();
        }
        else
        {
            return abort(401);
        }
     }
     public function update(Request $request, $id){

            $update_event = Calendar::find($request->event_id);

            
        if($update_event->user_id == $id){
            $update_event->title =$request->event_title;
            $update_event->start_date = Carbon::now();
            $update_event->end_date = Carbon::now()->addDay(1);
            $update_event->color = $request->category;

            $update_event->save();

            //success, error, info, warning
            Toastr::success('New Event added successfully :)','Success');

            return back();
        }
        return back();
     }

     public function destroy(Request $request)
     {
        $delete_event = Calendar::find($request['event_id']);
        $delete_event->delete();
    
        //success, error, info, warning
        Toastr::success('Event deleted successfully :)','Success');
        return back();
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
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

}
