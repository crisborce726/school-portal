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
                            <th>Action</th>
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
                                <td>
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
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /card -->

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