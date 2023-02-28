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
                    </div>
                </div>

                <div class="card-body">
                    <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Semester</th>
                            <th>Name</th>
                            <th>Tuition Fee</th>
                            <th>Miscellaneous Fee</th>
                            <th>Laboratory Fee</th>
                            <th>Other Fee</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->sem_id}}</td>
                                <td>{{$item->student_id}}</td>
                                <td class="text-end">{{number_format($item->tuition_fee,2)}}</td>
                                <td class="text-end">{{number_format($item->misc_fee,2)}}</td>
                                <td class="text-end">{{number_format($item->lab_fee,2)}}</td>
                                <td class="text-end">{{number_format($item->other_fee,2)}}</td>
                                <td class="text-end">{{number_format(($item->tuition_fee)+($item->misc_fee)+($item->lab_fee)+($item->other_fee),2)}}</td>
                                <td>
                                    <a class="btn" title="View Invoice" href="{{ route('view.invoice', $item->id) }}">
                                        <i class="ri-eye-line text-success"></i> {{$item->id}}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card -->

            
        </div>
    </div>
</div>
@endsection