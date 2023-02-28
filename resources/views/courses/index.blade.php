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
    
                            @can('isAdmin')
                                <div class="page-title-right">
                                    <button title="Add Course" type="button" class="btn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addCourse">
                                        <i class="dripicons-plus"></i>
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('courses.senior*') ? 'active' : null }}" href="{{route('courses.index')}}" role="tab">
                                    <span class="d-none d-sm-block">Senior High</span> 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('courses.college*') ? 'active' : null }}" href="{{route('courses.college')}}" role="tab">
                                    <span class="d-none d-sm-block">College</span> 
                                </a>
                            </li>
                        </ul>
                        </div>

                        <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course</th>
                                <th>Title</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
    
    
                            <tbody>
                                @foreach($data  as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->course_code}}</td>
                                        <td>{{$item->course_title}}</td>
                                        <td>{{$item->level}}</td>
                                        <td>
        
                                            <a class="btn" title="Show" href="{{ route('courses.show',$item->id) }}">
                                                <i class="ri-eye-line text-info"></i>
                                            </a>
        
                                            <a class="btn" title="Edit" href="{{ route('courses.edit',$item->id) }}">
                                                <i class="ri-edit-2-line text-success"></i>
                                            </a>
        
                                            <button title="Delete" type="button" class="btn waves-effect waves-light delCourse"
                                                data-course_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#delCourse">
                                                    <i class="ri-delete-bin-5-line text-dark"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            <!-- Add Course Modal -->
            <div class="modal fade" id="addCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('courses.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label>Required</label>
                                    <select  id="level" name="level" class="form-control @error('level') is-valid @enderror" value="{{old('level')}}" required>
                                        <option value="" disabled selected>Select Level</option>
                                        <option value="Senior High">Senior High</option>
                                        <option value="College">College</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Required</label>
                                    <input type="text" class="form-control" name="course_code" id="course_code" placeholder="Course Code" required>
                                </div>
                                <div class="mb-3">
                                    <label>Required</label>
                                    <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Course Title" required>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Course Modal -->

            <!-- Delete Course Modal -->
            <div class="modal fade" id="delCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Course Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('courses.destroy') }}">
                                @csrf
                                @method('DELETE') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to delete this course?
                                    </p>
                                    <input type="text" name="course_id" id="course_id" hidden>
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
            <!-- /Add Course Modal -->
        </div>
    </div>
</div>
@endsection