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

                        @if(auth()->user()->role != 'student')
                            <div class="page-title-right">
                                <a class="btn" title="Create User" href="{{ route('users.create') }}">
                                    <i class="dripicons-plus"></i>
                                </a>
                            </div>
                        @endif
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
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td class="text-center">
                                    <a class="" href="/storage/cover_images/{{$item->cover_image}}" title="{{$item->cover_image}}">
                                        <img class="rounded-circle header-profile-user" src="storage/cover_images/{!!$item->cover_image!!}"alt="Header Avatar">
                                    </a>
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
                                <td>
                                    <a class="btn" title="View" href="{{ route('users.show',$item->id) }}">
                                        <i class="ri-eye-line text-info"></i>
                                    </a>

                                    <a class="btn" title="Edit" href="{{ route('edit.users',$item->id) }}">
                                        <i class="ri-edit-2-line text-success"></i>
                                    </a>

                                    @if($item->id != auth()->user()->id)                                    
                                        @if($item->status == 1)
                                            <button title="Archive" type="button" class="btn waves-effect waves-light archiveUser"
                                                data-user_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#archiveUser">
                                                    <i class="ri-archive-line text-danger"></i>
                                            </button>
                                        @elseif($item->status == 2)
                                            <button title="Restore" type="button" class="btn waves-effect waves-light restoreUser"
                                                data-user_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#restoreUser">
                                                    <i class="ri-inbox-unarchive-line text-warning"></i>
                                            </button>
                                        @endif

                                        @if($item->status == 1)
                                            <button title="Deactivate" type="button" class="btn waves-effect waves-light blockUser"
                                                data-user_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#blockUser">
                                                    <i class=" ri-user-unfollow-line text-dark"></i>
                                            </button>
                                        @elseif($item->status == 0)
                                            <button title="Activate" type="button" class="btn waves-effect waves-light activateUser"
                                                data-user_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#activateUser">
                                                    <i class=" ri-user-unfollow-line text-success"></i>
                                            </button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /card -->

            <!-- Archive User Modal -->
            <div class="modal fade" id="archiveUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Archive User Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('users.archive') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to archive this user?
                                    </p>
                                    <input type="text" name="user_id" id="user_id" hidden>
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
            <!-- /Archive User Modal -->

            <!-- Restore User Modal -->
            <div class="modal fade" id="restoreUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Restore User Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('users.restore') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to restore this user?
                                    </p>
                                    <input type="text" name="user_id" id="user_id" hidden>
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
            <!-- /Archive User Modal -->

            <!-- Deactivate User Modal -->
            <div class="modal fade" id="blockUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Deactivate User Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('users.deactivate') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to deactivate this user?
                                    </p>
                                    <input type="text" name="user_id" id="user_id" hidden>
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
            <!-- /Deactivate Modal -->

            <!-- Activate User Modal -->
            <div class="modal fade" id="activateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Activate User Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('users.activate') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to activate this user?
                                    </p>
                                    <input type="text" name="user_id" id="user_id" hidden>
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
            <!-- /Activate Modal -->
        </div>
    </div>
</div>
@endsection