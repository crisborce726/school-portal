<?php

namespace App\Http\Controllers;

use App\Models\StudentAccount;
use App\Http\Requests\StoreStudentAccountRequest;
use App\Http\Requests\UpdateStudentAccountRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class StudentAccountController extends Controller
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
        if (Gate::allows('isCashier')){

            $title = "Student Accounts";
            $data = StudentAccount::all();
            return view('student_accounts.index', compact('title', 'data'));
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
     * @param  \App\Http\Requests\StoreStudentAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentAccountRequest $request){
        Date_default_timezone_set('Asia/Manila');

        if(!empty($request['sem_id'])){
            if(!StudentAccount::where('student_id', $request['student_id'])->where('sem_id', $request['sem_id'])->exists()){

                $new_account = new StudentAccount();
                $new_account->id = floor(time()-999999999);
                $new_account->sem_id = $request['sem_id'];
                $new_account->student_id = $request['student_id'];
                $new_account->tuition_fee = $request['tuition_fee'];
                $new_account->misc_fee = $request['misc_fee'];
                $new_account->lab_fee = $request['lab_fee'];
                $new_account->other_fee = $request['other_fee'];
                $new_account->save();

                //success, error, info, warning
                Toastr::success('New account added successfully :)','Success');

                return back();
            }else{
                //success, error, info, warning
                Toastr::info('Account is Already Exists :)','Info');

                return back();
            }
        }else{
            //success, error, info, warning
            Toastr::info('Please wait for the admin to create Current Semester, Thank you :)','Info');

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAccount  $studentAccount
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if (Gate::allows('isStudent')){
            
            $title = "Statement of Accounts";
            $data = StudentAccount::where('student_id', $id)->get();

            return view('student_accounts.show', compact('title', 'data'));
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    //$id in the StudentAccount id
    public function invoice($id){

        if(Transaction::count() > 0){

            if (Gate::allows('isStudent')){
                
                $title = "Statement of Accounts";

                $data  = StudentAccount::find($id);

                $transaction = Transaction::where('account_id' ,$data->id)->get();

                $total_paid = DB::table('transactions')->where('account_id', $id)->sum('amount_payment');

                $get_course = Student::where('user_id', auth()->user()->id)->firstOrFail();

                $course = Course::find($get_course->course_id);
                
                return view('student_accounts.invoice', compact('title', 'data', 'transaction', 'total_paid', 'course'));
                
            }elseif(Gate::allows('isCashier')){

                $title = "Statement of Accounts";

                $data  = StudentAccount::find($id);

                $transaction = Transaction::where('account_id' ,$data->id)->get();

                $total_paid = DB::table('transactions')->where('account_id', $id)->sum('amount_payment');

                $get_course = Student::where('user_id', $data->student_id)->firstOrFail();

                $course = Course::find($get_course->course_id);
                
                return view('student_accounts.invoice', compact('title', 'data', 'transaction', 'total_paid', 'course'));
            }else{
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
        }else{

            //success, error, info, warning
            Toastr::info('No Transaction has been found :)','Info');
            return back();
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAccount  $studentAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAccount $studentAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentAccountRequest  $request
     * @param  \App\Models\StudentAccount  $studentAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentAccountRequest $request, StudentAccount $studentAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAccount  $studentAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAccount $studentAccount)
    {
        //
    }
}
