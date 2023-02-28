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
                        <h5>{!!$course->title!!}</h5><br/>
                        <strong>{!!$subject->title!!}</strong><br/>
                        <small>{!!$lec->lec_schedule!!}</small><br/>
                        <small>{!!$lec->lab_schedule!!}</small>
                        
                    </div>
                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" enctype="multipart/form-data" action="{{ route('schedules.store') }}">
                            @csrf
                                <div class="row mb-3">
                                    <input class="form-control" id="class_id" name="class_id" value="{!!$id!!}" hidden>
                                    <div class="col-md-3 text-end">
                                        <input class="form-control" id="student_id" name="student_id" 
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Insert</button>
                                    </div>
                                </div>
                        </form>
                    
                        <div class="row">
                            <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Section</th>
                                    <th>Name</th>
                                    <th>Prelim</th>
                                    <th>Midterm</th>
                                    <th>Final</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->section}}</td>
                                        <td>{{$item->lastname}}, {{$item->firstname}} {{substr($item->middlename, 0, 1)}}</td>
                                        <td>
                                            {{$item->prelims}}
                                        </td>
                                        <td>
                                            {{$item->midterms}}
                                        </td>
                                        <td>
                                            {{$item->finals}}
                                        </td>
                                        <td>
                                            @php
                                                $status = ($item->prelims + $item->midterms + $item->finals) / 3;
                                            @endphp
                                            
                                            
                                            @if(!empty($item->prelims) && !empty($item->midterms) && !empty($item->finals))
                                                @if($item->level == "College")
                                                    @if($status >= 1 && $status <= 3)
                                                        <span>Passed</span>
                                                    @elseif($status == 4)
                                                        <span class="text-warning">Conditional</span>
                                                    @elseif($status == 5)
                                                        <span class="text-danger">Failed</span>
                                                    @endif
                                                @elseif($item->level == "Senior High")
                                                    @if($status >= 75 && $status <= 99)
                                                        <span>Passed</span>
                                                    @elseif($status >= 73 && $status <= 74)
                                                        <span class="text-warning">Conditional</span>
                                                    @elseif($status >= 70 && $status <= 72)
                                                        <span class="text-danger">Failed</span>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->level == "College")
                                                <button title="Grades" type="button" class="btn waves-effect waves-light updateGradeCollege"
                                                    data-class_id={{$item->studClass_id}}
                                                    data-student_id={{$item->student}}
                                                    
                                                    data-bs-toggle="modal" data-bs-target="#updateGradeCollege">
                                                        <i class="ri-survey-line text-primary"></i>
                                                </button>
                                            @elseif($item->level == "Senior High")
                                                <button title="Grades" type="button" class="btn waves-effect waves-light updateGradeSenior"
                                                    data-class_id={{$item->studClass_id}}
                                                    data-student_id={{$item->student}}
                                                    
                                                    data-bs-toggle="modal" data-bs-target="#updateGradeSenior">
                                                        <i class="ri-survey-line text-primary"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div><!-- / card body -->
                </div><!-- Card body -->

                <!-- Student Grade Modal College -->
                <div class="modal fade" id="updateGradeCollege" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update Grade</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('college.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="class_id" id="class_id" hidden>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="student_id" id="student_id" hidden>
                                    </div>

                                    <div class="mb-3">
                                        <label>Prelims</label>
                                        <input type="text" class="form-control" name="prelim_grade" id="prelim_grade"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46))">
                                        <small><i>e.g.[1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 4.00, 5.00]</i></small>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Midterms</label>
                                        <input type="text" class="form-control" name="midterm_grade" id="midterm_grade"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46))">
                                        <small><i>e.g.[1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 4.00, 5.00]</i></small>
                                    </div>
                                    <div class="mb-3">
                                        <label>Final</label>
                                        <input type="text" class="form-control" name="final_grade" id="final_grade"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46))">
                                        <small><i>e.g.[1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 4.00, 5.00]</i></small>
                                    </div>

                                    
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Student Grade Modal College -->

                <!-- Student Grade Modal Senior -->
                <div class="modal fade" id="updateGradeSenior" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update Grade</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('senior.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="class_id" id="class_id" hidden>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="student_id" id="student_id" hidden>
                                    </div>

                                    <div class="mb-3">
                                        <label>Prelims</label>
                                        <input type="text" class="form-control" name="prelim_grade" id="prelim_grade"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                    <div class="mb-3">
                                        <label>Midterms</label>
                                        <input type="text" class="form-control" name="midterm_grade" id="midterm_grade"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                    <div class="mb-3">
                                        <label>Final</label>
                                        <input type="text" class="form-control" name="final_grade" id="final_grade"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>

                                    
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Student Grade Modal Senior -->

            </div>
        </div>
    </div>
</div>
@endsection