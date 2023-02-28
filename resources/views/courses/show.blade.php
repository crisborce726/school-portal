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
                        <h5>{!!$course->course_title!!}</h5>
                    </div>
                </div>

                <div class="card-body">
                    <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject Code</th>
                            <th>Title</th>
                                @if($course->level == "College")
                                    <th>Lec</th>
                                    <th>Lab</th>
                                    <th>Total</th>
                                @endif
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects  as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->subject_code}}</td>
                                    <td>{{$item->subject_title}}</td>
                                    @if($course->level == "College")
                                        <td>{{$item->lec_unit}}</td>
                                        <td>{{$item->lab_unit}}</td>
                                        <td><b>{{$item->lec_unit + $item->lab_unit}}</b></td>
                                    @endif
                                    <td>
                                        <a class="btn" title="Edit" href="{{ route('subjects.edit',$item->id) }}">
                                            <i class="ri-edit-2-line text-success"></i>
                                        </a>

                                        <button title="Delete" type="button" class="btn waves-effect waves-light delSubject"
                                            data-subject_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#delSubject">
                                                <i class="ri-delete-bin-5-line text-dark"></i>
                                        </button>

                                        @php
                                            $count_course = DB::table('courses')->count();
                                            $count_subject = DB::table('subjects')->count();
                                            $count_sem = DB::table('semesters')->where('status', '1')->count();
                                            $count_teacher = DB::table('users')->where('role', 'teacher')->count();
                                        @endphp
                                        @if($count_course != 0 && $count_subject != 0 && $count_sem != 0 && $count_teacher != 0)
                                            <button title="Add Class" type="button" class="btn waves-effect waves-light addClass"
                                                data-course_id={{$item->course_id}}
                                                data-subject_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#addClass">
                                                    <i class="ri-file-add-line text-primary"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /card -->


            <!-- Delete Subject Modal -->
            <div class="modal fade" id="delSubject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Subject Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('subjects.destroy') }}">
                                @csrf
                                @method('DELETE') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to delete this subject?
                                    </p>
                                    <input type="text" class="form-control" name="subject_id" id="subject_id" hidden>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Del Subject Modal -->

            <!-- Add Class Modal -->
            <div class="modal fade" id="addClass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Class</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('classes.store') }}">
                                @csrf

                                <input type="text" class="form-control" name="course_id" id="course_id" hidden>

                                <input type="text" class="form-control" name="subject_id" id="subject_id" hidden>

                                @php $cur_sem = DB::table('semesters')->where('status', 1)->first() @endphp
                                
                                @if(!empty($cur_sem))
                                    <input type="text" class="form-control" name="sem_id" id="sem_id" value="{{$cur_sem->id}}" hidden>
                                @else
                                    <span class="text-danger mb-3">Please make sure to add semester as Current.</span>
                                @endif

                                <input type="text" class="form-control" name="class_stat" id="class_stat" value="1" hidden>

                                <div class="mb-3">
                                    <label>Section</label>
                                    <input type="text" class="form-control" name="class_section" id="class_section" placeholder="Enter Section">
                                </div>

                                <div class="mb-3">
                                    <label>Lec Schedule</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Room</label>
                                            <input type="text" class="form-control" name="lec_room" id="lec_room" placeholder="Enter Room No"required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Day</label>
                                            <input type="text" class="form-control" name="lec_days" id="lec_days" placeholder="Enter Days"required>
                                            <small><i>(*e.g. M/W)</i></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label>From</label>
                                            <input class="form-control" type="time" name="lec_from" id="lec_from" required>
                                            <small><i>(*e.g. 08:00 am)</i></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label>To</label>
                                            <input class="form-control" type="time" name="lec_to" id="lec_to"required>
                                            <small><i>(*e.g. 09:00 am)</i></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Lab Schedule</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Room</label>
                                            <input type="text" class="form-control" name="lab_room" id="lab_room" placeholder="Enter Room No">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Days</label>
                                            <input type="text" class="form-control" name="lab_days" id="lab_days" placeholder="Enter Days">
                                            <small><i>(*e.g. M/W)</i></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label>From</label>
                                            <input class="form-control" type="time" name="lab_from" id="lab_from">
                                            <small><i>(*e.g. 08:00 am)</i></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label>To</label>
                                            <input class="form-control" type="time" name="lab_to" id="lab_to">
                                            <small><i>(*e.g. 09:00 am)</i></small>
                                        </div>
                                    </div>
                                </div>

                                @php $teacher = DB::table('users')->where('role', 'teacher')->get() @endphp

                                <div class="mb-3">
                                    <label>Teacher</label>
                                    <select id="teacher_id " name="teacher_id" class="form-control" required>
                                        <option value="" selected>Select Teacher</option>
                                        @foreach($teacher as $item)
                                            <option value="{{$item->id}}">{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Del Class Modal -->


        </div>
    </div>
</div>
@endsection