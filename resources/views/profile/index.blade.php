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

                        @can('isAdmin')
                            <div class="page-title-right">
                                <a href="{{route('users.index')}}" title="Back">
                                    <i class="ri-arrow-left-s-line"></i> Back
                                </a>
                            </div>
                        @endcan

                    </div>
                </div>

                @if(auth()->user()->role == 'student')
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <a href="{{route('student', auth()->user()->id)}}" title="Edit Profile">
                                <i class="ri-user-settings-line"></i> Edit
                            </a>
                        </div>
                        <!-- row -->
                        <!-- Image Name Course -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-2 text-end">
                                                <img src="storage/cover_images/{{$user->cover_image}}" alt="{{$user->cover_image}}" class="img-thumbnail rounded avatar-xl">
                                            </div>
                                            <div class="col-md-10">
                                                <h5 class="card-title">{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</h5>
                                                <small>{{$user->id}}</small>
                                                <p class="card-text">{{$course->course_title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Personal and Contact Information -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Personal Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{\Carbon\Carbon::parse($profile->birthday)->format('m/j/Y')}}</strong>
                                                    <p><small>Birthday</small></p>
                                                </div>
                                                
                                                <div class="mb-1">
                                                    <strong>{{$profile->birthplace}}</strong>
                                                    <p><small>Birthplace</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$profile->religion}}</strong>
                                                    <p><small>Religion</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$user->gender}}</strong>
                                                    <p><small>Gender</small></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{$profile->status}}</strong>
                                                    <p><small>Civil Status</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$profile->nationality}}</strong>
                                                    <p><small>Nationality</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /card -->
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Contact Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{$profile->mobile_no}}</strong>
                                                    <p><small>Mobile Number</small></p>
                                                </div>
                                                
                                                <div class="mb-1">
                                                    <strong>{{$user->email}}</strong>
                                                    <p><small>Email Address</small></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{$profile->address}}</strong>
                                                    <p><small>Current Address</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$profile->address}}</strong>
                                                    <p><small>Permanent Address</small></p>
                                                </div>
                                            </div>
                                        </div>              
                                    </div>
                                </div><!-- /card -->
                            </div>
                        </div><!-- end row -->

                        <!-- Educational Background and Guardian Information -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Educational Background</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>ELEMENTARY</strong>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <strong>{{$profile->elementary_school}}</strong>
                                                            <p><small>School</small></p>
                                                        </div>
                                                        
                                                        <div class="mb-1">
                                                            <strong>{{$profile->elementar_address}}</strong>
                                                            <p><small>Address</small></p>
                                                        </div>

                                                        <div class="mb-1">
                                                            <strong>{{$profile->elementary_year_graduated}}</strong>
                                                            <p><small>Year Graduated</small></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-md-6">
                                                <strong>SECONDARY</strong>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-1">
                                                                <strong>{{$profile->highschool_school}}</strong>
                                                                <p><small>School</small></p>
                                                            </div>
                                                            
                                                            <div class="mb-1">
                                                                <strong>{{$profile->highschool_address}}</strong>
                                                                <p><small>Address</small></p>
                                                            </div>

                                                            <div class="mb-1">
                                                                <strong>{{$profile->highschool_year_graduated}}</strong>
                                                                <p><small>Year Graduated</small></p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /card -->
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Guardian Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_name}}</strong>
                                                            <p><small>Guardian Name</small></p>
                                                        </div>
                                                        
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_contact}}</strong>
                                                            <p><small>Conact Number</small></p>
                                                        </div>

                                                        <div class="mb-1">
                                                            <strong>{{$profile->guaridan_occupation}}</strong>
                                                            <p><small>Occupation</small></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_address}}</strong>
                                                            <p><small>Address</small></p>
                                                        </div>
                                                        
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_relasioship}}</strong>
                                                            <p><small>Relationship</small></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /card -->
                            </div>
                        </div><!-- end row -->

                        <!-- Parents Information -->
                        <div class="row">
                            <div class="col--12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Parents Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong><i class="ri-women-line"></i> Mother Information</strong>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->mothers_name}}</strong>
                                                                    <p><small>Name</small></p>
                                                                </div>
                                                                
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->mothers_contact}}</strong>
                                                                    <p><small>Conact Number</small></p>
                                                                </div>
            
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->mothers_email}}</strong>
                                                                    <p><small>Email Address</small></p>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
            
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->mothers_occupation}}</strong>
                                                                    <p><small>Occupatioon</small></p>
                                                                </div>
                                                                
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->mothers_address}}</strong>
                                                                    <p><small>Address</small></p>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <strong><i class="ri-men-line"></i> Father Information</strong>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->fathers_name}}</strong>
                                                                    <p><small>Name</small></p>
                                                                </div>
                                                                
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->fathers_contact}}</strong>
                                                                    <p><small>Conact Number</small></p>
                                                                </div>
            
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->fathers_email}}</strong>
                                                                    <p><small>Email Address</small></p>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
            
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->fathers_occupation}}</strong>
                                                                    <p><small>Occupation</small></p>
                                                                </div>
                                                                
                                                                <div class="mb-1">
                                                                    <strong>{{$profile->fathers_address}}</strong>
                                                                    <p><small>Address</small></p>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                
                                    </div>
                                </div><!-- /card -->
                            </div>
                        </div><!-- end row -->



                    </div><!-- /card body -->  
                @else
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <a href="{{route('edit.profile', auth()->user()->id)}}" title="Edit Profile">
                                <i class="ri-user-settings-line"></i> Edit
                            </a>
                        </div>
                        <!-- row -->
                        <!-- Image Name Course -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-2 text-end">
                                                <img src="storage/cover_images/{{$user->cover_image}}" alt="{{$user->cover_image}}" class="img-thumbnail rounded avatar-xl">
                                            </div>
                                            <div class="col-md-10">
                                                <h5 class="card-title">{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</h5>
                                                <small>{{$user->id}}</small>
                                                <p class="card-text">{{ucfirst($user->role)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Personal and Contact Information -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Personal Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{\Carbon\Carbon::parse($profile->birthday)->format('m/j/Y')}}</strong>
                                                    <p><small>Birthday</small></p>
                                                </div>
                                                
                                                <div class="mb-1">
                                                    <strong>{{$profile->birthplace}}</strong>
                                                    <p><small>Birthplace</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$profile->religion}}</strong>
                                                    <p><small>Religion</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$user->gender}}</strong>
                                                    <p><small>Gender</small></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{$profile->status}}</strong>
                                                    <p><small>Civil Status</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$profile->nationality}}</strong>
                                                    <p><small>Nationality</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /card -->
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Contact Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{$profile->mobile_no}}</strong>
                                                    <p><small>Mobile Number</small></p>
                                                </div>
                                                
                                                <div class="mb-1">
                                                    <strong>{{$user->email}}</strong>
                                                    <p><small>Email Address</small></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <strong>{{$profile->address}}</strong>
                                                    <p><small>Current Address</small></p>
                                                </div>

                                                <div class="mb-1">
                                                    <strong>{{$profile->address}}</strong>
                                                    <p><small>Permanent Address</small></p>
                                                </div>
                                            </div>
                                        </div>              
                                    </div>
                                </div><!-- /card -->
                            </div>
                        </div><!-- end row -->

                        <!-- Educational Background and Guardian Information -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Educational Background</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>ELEMENTARY</strong>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <strong>{{$profile->elementary_school}}</strong>
                                                            <p><small>School</small></p>
                                                        </div>
                                                        
                                                        <div class="mb-1">
                                                            <strong>{{$profile->elementar_address}}</strong>
                                                            <p><small>Address</small></p>
                                                        </div>

                                                        <div class="mb-1">
                                                            <strong>{{$profile->elementary_year_graduated}}</strong>
                                                            <p><small>Year Graduated</small></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-md-6">
                                                <strong>SECONDARY</strong>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-1">
                                                                <strong>{{$profile->highschool_school}}</strong>
                                                                <p><small>School</small></p>
                                                            </div>
                                                            
                                                            <div class="mb-1">
                                                                <strong>{{$profile->highschool_address}}</strong>
                                                                <p><small>Address</small></p>
                                                            </div>

                                                            <div class="mb-1">
                                                                <strong>{{$profile->highschool_year_graduated}}</strong>
                                                                <p><small>Year Graduated</small></p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                            </div>
                                        </div>
                                    </div>student
                                </div><!-- /card -->
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <small class="text-white">Guardian Information</small>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_name}}</strong>
                                                            <p><small>Guardian Name</small></p>
                                                        </div>
                                                        
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_contact}}</strong>
                                                            <p><small>Conact Number</small></p>
                                                        </div>

                                                        <div class="mb-1">
                                                            <strong>{{$profile->guaridan_occupation}}</strong>
                                                            <p><small>Occupation</small></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_address}}</strong>
                                                            <p><small>Address</small></p>
                                                        </div>
                                                        
                                                        <div class="mb-1">
                                                            <strong>{{$profile->guardian_relasioship}}</strong>
                                                            <p><small>Relationship</small></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /card -->
                            </div>
                        </div><!-- end row -->

                    </div><!-- /card body --> 
                @endif

            </div><!-- /card -->
        </div>
    </div>
</div>
@endsection