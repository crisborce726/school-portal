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
                    
                    <!-- row -->
                    <!-- Image Name Course -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-2">
                                            <img src="storage/cover_images/{{$user->cover_image}}" alt="{{$user->cover_image}}" class="img-thumbnail rounded avatar-xl">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</h5>
                                                {{$user->id}}</small>
                                                @can('isStudent')
                                                    <p class="card-text">{{ucfirst($course->course_title)}}</p>
                                                    {{ucfirst($user->role)}}
                                                @endcan
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-highlight" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#change_pass" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block"><i class="ri-lock-line"></i> Change Password</span>    
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block"><i class="ri-user-settings-line"></i> Manage Profile</span>    
                                            </a>
                                        </li>
                                    </ul>
    
                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="change_pass" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form method="post" action="{{ route('change.password', $user->id) }}">
                                                        @csrf @method('put')
                        
                                                        <div class="form-group row mb-3">
                                                            <label for="current_password" class="col-lg-3 col-form-label font-weight-semibold">Current Password: <span class="text-danger">*</span></label>
                                                            <div class="col-lg-9">
                                                                <input id="current_password" name="current_password"  required type="password" class="form-control" >
                                                            </div>
                                                        </div>
                        
                                                        <div class="form-group row mb-3">
                                                            <label for="password" class="col-lg-3 col-form-label font-weight-semibold">New Password: <span class="text-danger">*</span></label>
                                                            <div class="col-lg-9">
                                                                <input id="password" name="password"  required type="password" class="form-control" >
                                                            </div>
                                                        </div>
                        
                                                        <div class="form-group row mb-3">
                                                            <label for="password_confirmation" class="col-lg-3 col-form-label font-weight-semibold">Confirm Password: <span class="text-danger">*</span></label>
                                                            <div class="col-lg-9">
                                                                <input id="password_confirmation" name="password_confirmation"  required type="password" class="form-control" >
                                                            </div>
                                                        </div>
                        
                                                        <div style="text-align: right">
                                                            <button type="submit" class="btn btn-primary">Submit form <i class="ri-send-plane-line ml-2"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form enctype="multipart/form-data" method="post" action="{{ route('manage.profile', $user->id) }}">
                                                        @csrf @method('put')
                    
                                                        <div class="form-group row mb-3">
                                                            <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Name: </label>
                                                            <div class="col-lg-9">
                                                                <input disabled="disabled" id="name" class="form-control" type="text" value="{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}">
                                                            </div>
                                                        </div>
                    
                                                        <div class="form-group row mb-3">
                                                            <label for="email" class="col-lg-3 col-form-label font-weight-semibold">Email: </label>
                                                            <div class="col-lg-9">
                                                                <input id="email" value="{{ $user->email }}" name="email"  type="email" class="form-control" >
                                                            </div>
                                                        </div>
                    
                                                        <div class="form-group row">
                                                            <label for="address" class="col-lg-3 col-form-label font-weight-semibold">Change Photo: </label>
                                                            <div class="col-lg-9">
                                                                <input  accept="image/*" type="file" name="cover_image" id="cover_image" class="form-input-styled">
                                                            </div>
                                                        </div>
                    
                                                        <div style="text-align: right">
                                                            <button type="submit" class="btn btn-primary">Submit form <i class="ri-send-plane-line ml-2"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /card body -->  

            </div><!-- /card -->
        </div>
    </div>
</div>
@endsection