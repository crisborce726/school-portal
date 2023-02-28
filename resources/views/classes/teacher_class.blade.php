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

            <div class="col-xl-12">
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
                                <th>Level</th>
                                <th>Section</th>
                                <th>Course</th>
                                <th>Subject</th>
                                <th>Schedule</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$item->level}}</td>
                                    <td>{{$item->section}}</td>
                                    <td>{{$item->course}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>
                                        {{$item->lec}}
                                        <br/>
                                        {{$item->lab}}
                                    </td>
                                    <td>
                                        @if($item->stat == 0)
                                            <span class="badge bg-danger">Ended</span>
                                        @elseif($item->stat == 1)
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" title="View Student" href="{{ route('student.class', $item->class_id) }}">
                                            <i class="ri-eye-line text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            <tbody>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection