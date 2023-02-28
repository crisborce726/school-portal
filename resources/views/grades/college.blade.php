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

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h5>{!!$title!!}</h5>

                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Units</th>
                            <th>Grades</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: black">
                                <td style="background-color: black" colspan="5">First Year</td>
                            </tr>
                            @foreach ($subjects1 as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->subject_title}}</td>
                                <td>{{$item->lec_unit + $item->lab_unit}}</td>
                                <td>
                                    @php
                                        $grade = DB::table('class_schedules')
                                        ->join('student_classes', 'class_schedules.id', 'student_classes.classes_id')
                                        ->join('grades', 'student_classes.id', 'grades.student_class_id')
                                        ->where('class_schedules.subject_id', $item->id)
                                        ->where('student_classes.student_id', auth()->user()->id)
                                        ->select('grades.*')
                                        ->get();
                                    @endphp
                                    @foreach($grade as $item)
                                        @if(!empty($item->prelims) && !empty($item->midterms) && !empty($item->finals))
                                            {{number_format(($item->prelims + $item->midterms + $item->finals) / 3, 2)}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">Second Year</td>
                            </tr>
                            @foreach ($subjects2 as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->subject_title}}</td>
                                <td>{{$item->lec_unit + $item->lab_unit}}</td>
                                <td>
                                    @php
                                        $grade = DB::table('class_schedules')
                                        ->join('student_classes', 'class_schedules.id', 'student_classes.classes_id')
                                        ->join('grades', 'student_classes.id', 'grades.student_class_id')
                                        ->where('class_schedules.subject_id', $item->id)
                                        ->where('student_classes.student_id', auth()->user()->id)
                                        ->select('grades.*')
                                        ->get();
                                    @endphp
                                    @foreach($grade as $item)
                                        @if(!empty($item->prelims) && !empty($item->midterms) && !empty($item->finals))
                                            {{number_format(($item->prelims + $item->midterms + $item->finals) / 3, 2)}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">Third Year</td>
                            </tr>
                            @foreach ($subjects3 as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->subject_title}}</td>
                                <td>{{$item->lec_unit + $item->lab_unit}}</td>
                                <td>
                                    @php
                                        $grade = DB::table('class_schedules')
                                        ->join('student_classes', 'class_schedules.id', 'student_classes.classes_id')
                                        ->join('grades', 'student_classes.id', 'grades.student_class_id')
                                        ->where('class_schedules.subject_id', $item->id)
                                        ->where('student_classes.student_id', auth()->user()->id)
                                        ->select('grades.*')
                                        ->get();
                                    @endphp
                                    @foreach($grade as $item)
                                        @if(!empty($item->prelims) && !empty($item->midterms) && !empty($item->finals))
                                            {{number_format(($item->prelims + $item->midterms + $item->finals) / 3, 2)}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">Four Year</td>
                            </tr>
                            @foreach ($subjects4 as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->subject_title}}</td>
                                <td>{{$item->lec_unit + $item->lab_unit}}</td>
                                <td>
                                    @php
                                        $grade = DB::table('class_schedules')
                                        ->join('student_classes', 'class_schedules.id', 'student_classes.classes_id')
                                        ->join('grades', 'student_classes.id', 'grades.student_class_id')
                                        ->where('class_schedules.subject_id', $item->id)
                                        ->where('student_classes.student_id', auth()->user()->id)
                                        ->select('grades.*')
                                        ->get();
                                    @endphp
                                    @foreach($grade as $item)
                                        @if(!empty($item->prelims) && !empty($item->midterms) && !empty($item->finals))
                                            {{number_format(($item->prelims + $item->midterms + $item->finals) / 3, 2)}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- End card body -->
            </div><!-- End card -->
        </div><!-- End col -->

    </div><!-- End row -->
</div>
@endsection