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
                            <th>Image</th>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            @can('isCashier')
                                <th>Action</th>
                            @endcan
                            @can('isGuidance')
                                <th>Action</th>
                            @endcan
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle header-profile-user" src="storage/cover_images/{!!$item->cover_image!!}"alt="Header Avatar">
                                </td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->role}}</td>
                                <td>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($item->status == 0)
                                        <span class="badge bg-danger">Deactivated</span>
                                    @elseif($item->status == 2)
                                        <span class="badge bg-warning">Archived</span>
                                    @endif
                                </td>
                                @can('isCashier')
                                    <td>
                                        <button title="Add Student Account" type="button" class="btn waves-effect waves-light addAccount"
                                            data-student_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#addAccount">
                                                <i class="ri-folder-add-line text-success"></i>
                                        </button>
                                    </td>
                                @endcan
                                @can('isGuidance')
                                    <td>
                                        <button title="Add Guidance Record" type="button" class="btn waves-effect waves-light addViolation"
                                            data-user_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#addViolation">
                                                <i class="ri-folder-add-line text-success"></i>
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card -->

            <!-- Add Account Modal -->
            <div class="modal fade" id="addAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Student Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('accounts.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label>Semester</label>
                                    @php $data = DB::table('semesters')->where('status', '1')->first(); @endphp
                                    @if(!empty($data))
                                        <input type="text" class="form-control" name="sem_id" id="sem_id" 
                                        value="{{$data->id}}" placeholder="{{$data->semester}}" readonly>
                                    @else
                                    <br>
                                        <small>No Current Semester found in the system.</small>
                                    <br>
                                        <small>*Wait for the admin to add before adding student account.</small>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label>Student ID No.</label>
                                    <input type="text" class="form-control" name="student_id" id="student_id" readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Tuition Fee</label>
                                    <input type="text" class="form-control" 
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                     name="tuition_fee" id="tuition_fee" required>
                                </div>

                                <div class="mb-3">
                                    <label>Miscellaneous Fee</label>
                                    <input type="text" class="form-control" 
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                    name="misc_fee" id="misc_fee">
                                </div>

                                <div class="mb-3">
                                    <label>Laboratory Fee</label>
                                    <input type="text" class="form-control" 
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                    name="lab_fee" id="lab_fee">
                                </div>

                                <div class="mb-3">
                                    <label>Other Fee</label>
                                    <input type="text" class="form-control"
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                     name="other_fee" id="other_fee">
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
            <!-- /Add Account Modal -->

            <!-- Add Guidance Record Modal -->
            <div class="modal fade" id="addViolation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Guidance Record Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('guidance.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label>Student ID No.</label>
                                    <input type="text" class="form-control" name="user_id" id="user_id" readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Violation</label>
                                    <input type="text" class="form-control" name="violation" id="violation" required>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Guidance Record Modal -->
        </div>
    </div>
</div>
@endsection