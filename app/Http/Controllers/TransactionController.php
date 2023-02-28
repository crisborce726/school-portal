<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Gate;
use Brian2694\Toastr\Facades\Toastr;

class TransactionController extends Controller
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
            $title = "Trasactions";
            $data = Transaction::latest()->get();
            return view('transactions.index', compact('title', 'data'));
    
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
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        Date_default_timezone_set('Asia/Manila');

        if(StudentAccount::where('student_id', $request['student_id'])->where('sem_id', $request['sem_id'])->exists()){

            $account = StudentAccount::where('student_id', $request['student_id'])->first();

            $stud_account = StudentAccount::find($account->id);

            $new_transaction = new Transaction();
            $new_transaction->id = floor(time()-999999999);
            $new_transaction->account_id = $stud_account->id;
            $new_transaction->amount_payment = $request['amount_payment'];
            $new_transaction->date_of_payment = $request['date_of_payment'];
            $new_transaction->payment_method = $request['mode_of_payment'];
            $new_transaction->type_of_payment = $request['type_of_payment'];
            $new_transaction->save();

            //success, error, info, warning
            Toastr::success('New transaction added successfully :)','Success');

            return back();

        }else{
            //success, error, info, warning
            Toastr::warning('Please add Student Account First, before making any transaction :)','Info');

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
