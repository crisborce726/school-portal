@extends('layouts.app')
@section('title',$title . ' | DCCP-Portal')

@section('content')
    @section('page_title')
        {!!$title!!}
            @section('active')
                {!!$title!!}
            @endsection
    @endsection
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h5>{!!$title!!}</h5>

                        @can('isStudent')
                            <div class="page-title-right">
                                <a class="btn" title="Back" href="{{ route('accounts.show', auth()->user()->id) }}">
                                    <i class="ri-arrow-left-s-line"></i> Back
                                </a>
                            </div>
                        @elsecan('isCashier')
                            <div class="page-title-right">
                                <a class="btn" title="Back" href="{{ route('accounts.index') }}">
                                    <i class="ri-arrow-left-s-line"></i> Back
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <!-- ============================================================== -->
                    <!-- Start right Content here -->
                    <!-- ============================================================== -->
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Invoice</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                        <li class="breadcrumb-item active">Invoice</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <img src="assets/images/dccp.png" alt="logo" height="70"/>
                                                <h5><strong>Data Center College of the Philippies</strong></h5>
                                                <small>Statement of Account</small>
                                                <p>{{$data->sem->semester}}</p>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <address>
                                                        <strong>{{$data->student->lastname}}, {{$data->student->firstname}} {{substr($data->student->middlename, 0,1)}}</strong><br/>
                                                        {{$data->student->id}}<br>
                                                        {{$course->course_title}}
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        </thead>
                                                        <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        <tr>
                                                            <td>Tuition Fee</td>
                                                            <td class="text-end">Php {{number_format($data->tuition_fee,2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc. Fee</td>
                                                            <td class="text-end">Php {{number_format($data->misc_fee,2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lab. Fee</td>
                                                            <td class="text-end">Php {{number_format($data->lab_fee,2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Other Fee</td>
                                                            <td class="text-end">Php {{number_format($data->other_fee,2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="thick-line text-center">
                                                                <strong>Grand Total</strong></td>
                                                            <td class="thick-line text-end">Php {{number_format(($data->tuition_fee)+($data->misc_fee)+($data->lab_fee)+($data->other_fee),2)}}</td>
                                                        </tr>
                                                        <hr>
                                                        <tr>
                                                            <td class="no-line text-center" colspan="2">
                                                                <strong>Payments</strong>
                                                            </td>
                                                        </tr>
                                                        @foreach($transaction as $item)
                                                        <tr>
                                                            <td><strong>{{$item->id}}</strong></td>
                                                            <td class="no-line text-center"><h4 class="m-0">Php {{number_format($item->amount_payment,2)}}</h4></td>
                                                        </tr>
                                                            @php $item->amount_payment += $item->amount_payment; @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td><strong>Total Amount Paid</strong></td>
                                                            <td class="no-line text-end"><h4 class="m-0">Php {{number_format($total_paid,2)}}</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Current Balance</strong></td>
                                                            <td class="no-line text-end"><h4 class="m-0">Php {{number_format(($data->tuition_fee)+($data->misc_fee)+($data->lab_fee)+($data->other_fee) - ($total_paid),2)}}</h4></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="d-print-none">
                                                    <div class="float-end">
                                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-3">
                                        </div>
                                    </div> <!-- end row -->

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div> <!-- end card body content-->
                
            </div><!-- /.card -->

            
        </div>
    </div>
</div>
@endsection