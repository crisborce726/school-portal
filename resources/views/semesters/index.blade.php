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

                        @if(auth()->user()->role = 'admin')
                            <div class="page-title-right">
                                <button title="Add Semester" type="button" class="btn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addSem">
                                    <i class="dripicons-plus"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->semester}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('m/j/Y')}}</td>
                                <td>
                                    @if($item->status == 0)
                                        <span class="badge bg-danger">Ended</span>
                                    @elseif($item->status == 1)
                                        <span class="badge bg-success">Current</span>
                                    @elseif($item->status == 2)
                                        <span class="badge bg-primary">Active</span>
                                    @elseif($item->status == 3)
                                        <span class="badge bg-info">Incomming</span>
                                    @endif
                                </td>
                                <td>

                                    @if($item->status == 2 || $item->status == 3)
                                        <a class="btn" title="Edit Semester" href="{{ route('semesters.edit',$item->id) }}">
                                            <i class="ri-edit-2-line text-success"></i>
                                        </a>
                                    @endif

                                    @if($item->status == 1)
                                        <button title="End Semester" type="button" class="btn waves-effect waves-light endSem"
                                            data-sem_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#endSem">
                                                <i class="ri-archive-line text-info"></i>
                                        </button>
                                    @endif

                                    @if($item->status != 0)
                                        <button title="Add Semester" type="button" class="btn waves-effect waves-light delSem"  data-sem_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#delSem">
                                            <i class="dripicons-trash text-danger"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card -->

            <!-- Add Sem Modal -->
            <div class="modal fade" id="addSem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Semester</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('semesters.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="id" id="id" value="{{floor(time()-999999999)}}" hidden>
                                </div>

                                <div class="mb-3">
                                    <label>Required</label>
                                    <input type="text" class="form-control" name="semester" id="semester" placeholder="Title" required autofocus>
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <select id="sem_stat" name="sem_stat" class="form-control" required>
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="1">Current</option>
                                        <option value="2">Active</option>
                                        <option value="3">Incomming</option>
                                    </select>
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
            <!-- /Add Sem Modal -->

            <!-- End Sem Modal -->
            <div class="modal fade" id="endSem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">End Semester Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('end.sem', auth()->user()->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to end this semester?
                                    </p>
                                    <input type="text" id="sem_id" name="sem_id" class="form-control" hidden>
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
            <!-- /End Sem Modal -->

            <!-- Delete Sem Modal -->
            <div class="modal fade" id="delSem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Semester Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('semesters.destroy') }}">
                                @csrf
                                @method('DELETE') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to delete this semester?
                                    </p>
                                    <input type="text" class="form-control" name="sem_id" id="sem_id" hidden>
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
            <!-- /Del Sem Modal -->

        </div>
    </div>
</div>
@endsection