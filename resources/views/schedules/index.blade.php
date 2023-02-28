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
                            <th>Code</th>
                            <th>Title</th>
                            <th>Section</th>
                            @if($level->courses->level == "College")
                                <th>Lec</th>
                                <th>Lab</th>
                                <th>Unit</th>
                            @endif
                            <th>Schedule</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td>{{$item->classes->subjects->subject_code}}</td>
                                <td>{{$item->classes->subjects->subject_title}}</td>
                                <td>{{$item->classes->section}}</td>
                                @if($item->classes->course->level == "College")
                                    <td>{{$item->classes->subjects->lec_unit}}</td>
                                    <td>{{$item->classes->subjects->lab_unit}}</td>
                                    <td>{{$item->classes->subjects->lec_unit + $item->classes->subjects->lab_unit}}</td>
                                @endif

                                <td>{{$item->classes->lec_schedule}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card -->

        </div>
    </div>
</div>
@endsection