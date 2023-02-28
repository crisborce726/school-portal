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

                        @can('isCashier')
                            <button title="Add Payment" type="button" class="btn waves-effect waves-light addPayment"
                                    data-bs-toggle="modal" data-bs-target="#addPayment">
                                    <i class="ri-folder-add-line text-success"></i>
                            </button>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Semester</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Date of Payment</th>
                            <th>Mode of Payament</th>
                            <th>Type of Payament</th>
                            <th>Status</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->sem_id}}</td>
                                <td>{{$item->student_id}}</td>
                                <td>{{$item->amount_payment}}</td>
                                <td>{{$item->date_of_payment}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td>{{$item->type_of_payment}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card -->


            <!-- Add Transactions Modal -->
            <div class="modal fade" id="addPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('transactions.store') }}">
                                @csrf

                                @php $data = DB::table('semesters')->where('status', '1')->first(); @endphp
                                @if(!empty($data))
                                    <input type="text" class="form-control" name="sem_id" id="sem_id"
                                    value="{{$data->id}}" placeholder="{{$data->semester}}" hidden>
                                @else
                                    <small class="text-danger">*Please wait the admin to create Current Semester before adding transaction.</small>
                                    <br/>
                                @endif

                                <div class="mb-3">
                                    <label>Student ID</label>
                                    <input type="text" class="form-control"
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                    name="student_id" id="student_id" placeholder="Enter Student ID">
                                </div>

                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" 
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                     name="amount_payment" id="amount_payment">
                                </div>

                                <div class="mb-3">
                                    <label>Date of Payment</label>
                                    <input type="date" class="form-control" name="date_of_payment" id="date_of_payment" max="@php echo date('Y-m-d'); @endphp">
                                </div>

                                <div class="mb-3">
                                    <label>Mode of Payment</label>
                                    <input type="text" class="form-control" name="mode_of_payment" id="mode_of_payment">
                                    <small>e.g. Cash</small>
                                </div>

                                <div class="mb-3">
                                    <label>Type of Payment</label>
                                    <input type="text" class="form-control" name="type_of_payment" id="type_of_payment">
                                    <small>e.g. partial, full</small>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                @if(!empty($data))
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Transactions Modal -->

        </div>
    </div>
</div>
@endsection