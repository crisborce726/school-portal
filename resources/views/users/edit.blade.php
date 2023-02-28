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
                        
                        <div class="page-title-right">
                            <a class="" href="{{route('users.index')}}" title="Back">
                                <i class="ri-arrow-left-s-line"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                            <div class="col-md-6">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                            <div class="form-group row mb-3" style="text-align: center">
                                                <a class="" href="/storage/cover_images/{{$user->cover_image}}" title="{{$user->cover_image}}">
                                                    <img class="rounded" src="/storage/cover_images/{{$user->cover_image}}" alt="{{$user->cover_image}}" width="150">
                                                </a>
                                                <input type="file" name="cover_image" id="cover_image" multiple="multiple" accept="image/*">
                                            </div>
                                            <label><i>.jpg, .png</i></label>

                                            <div class="form-group row mb-3">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" name="firstname" id="firstname" value="{!!$user->firstname!!}" 
                                                onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))'>
                                                @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Middlename</label>
                                                <input type="text" class="form-control" name="middlename" id="middlename" value="{!!$user->middlename!!}" 
                                                onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))'>
                                                @error('middlename')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" name="lastname" id="lastname" value="{!!$user->lastname!!}" 
                                                onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))'>
                                                @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="{!!$user->email!!}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Role</label>
                                                <input type="text" class="form-control" name="title" id="tilte" value="{!!$user->role!!}" readonly>
                                            </div>
                                        

                                            <div style="text-align: right">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update <i class="ri-send-plane-line ml-2"></i></button>
                                            </div>
                                        </div>
                                    
                                </form>
                            </div>
                        <div class="col-md-3">
                        </div>
                    </div><!-- /row -->  

                </div><!-- /card body -->  
            </div>
        </div>
    </div>
</div>
@endsection