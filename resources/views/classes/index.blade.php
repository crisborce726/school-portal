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
                        <div class="card card-primary card-outline card-outline-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('courses.senior*') ? 'active' : null }}" href="" role="tab">
                                    <span class="d-none d-sm-block">Senior High</span> 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('courses.college*') ? 'active' : null }}" href="" role="tab">
                                    <span class="d-none d-sm-block">College</span> 
                                </a>
                            </li>
                        </ul>
                        </div>

                        <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Section</th>
                                <th>Course</th>
                                <th>Subject</th>
                                <th>Schedule</th>
                                <th>Teacher</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
    
    
                            <tbody>
                                @foreach($data  as $item)
                                    <tr>
                                        <td>{{$item->section}}</td>
                                        <td>{{$item->course}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>
                                            {{$item->lec}}
                                            <br/>
                                            {{$item->lab}}
                                        </td>
                                        <td>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</td>
                                        <td>
                                            @if($item->stat == 0)
                                                <span class="badge bg-danger">Ended</span>
                                            @elseif($item->stat == 1)
                                                <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            
                                            @if($item->stat == 1)
                                                <button title="End Class" type="button" class="btn waves-effect waves-light endClass"
                                                    data-class_id={{$item->class_id}} data-bs-toggle="modal" data-bs-target="#endClass">
                                                        <i class="ri-chat-check-line text-danger"></i>
                                                </button>
            
                                                <a class="btn" title="Edit" href="{{ route('classes.edit',$item->class_id) }}">
                                                    <i class="ri-edit-2-line text-success"></i>
                                                </a>
            
                                                <button title="Delete" type="button" class="btn waves-effect waves-light delClass"
                                                    data-class_id={{$item->class_id}} data-bs-toggle="modal" data-bs-target="#delClass">
                                                        <i class="ri-delete-bin-5-line text-dark"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- End Clases Modal -->
            <div class="modal fade" id="endClass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">End Class Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('classes.end') }}">
                                @csrf
                                @method('PUT') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to end this class?
                                    </p>

                                    <input type="text" class="form-control" name="class_id" id="class_id" hidden>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End Clases Modal -->

            <!-- Delete Clases Modal -->
            <div class="modal fade" id="delClass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Class Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('classes.destroy') }}">
                                @csrf
                                @method('DELETE') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to delete this class?
                                    </p>

                                    <input type="text" class="form-control" name="class_id" id="class_id" hidden>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Clases Modal -->
        </div>
    </div>
</div>
@endsection