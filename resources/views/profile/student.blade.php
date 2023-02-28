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
                    <div id="progrss-wizard" class="twitter-bs-wizard">
                        <ul class="twitter-bs-wizard-nav nav-justified">
                            <li class="nav-item">
                                <a href="#progress-perso-detail" class="nav-link" data-toggle="tab">
                                    <span class="step-number">01</span>
                                    <span class="step-title">Personal Information</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#progress-contact-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">02</span>
                                    <span class="step-title">Contact Information</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#progress-background-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">03</span>
                                    <span class="step-title">Educational Background</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#progress-guardian-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">04</span>
                                    <span class="step-title">Guaridan Information</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#progress-parents-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">05</span>
                                    <span class="step-title">Parents Information</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#progress-confirm-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">06</span>
                                    <span class="step-title">Confirm Detail</span>
                                </a>
                            </li>
                        </ul>

                        <div id="bar" class="progress mt-4">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('student.update', $profile->id) }}">
                            @csrf
                            @method('PUT')
                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="progress-perso-detail">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Birthday</label>
                                                    <input type="date" class="form-control" id="birthday" name="birthday" max="@php echo date('Y-m-d'); @endphp" value="{{$profile->birthday}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Birthplace</label>
                                                    <input type="text" class="form-control" id="birthplace" name="birthplace" value="{{$profile->birthplace}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion</label>
                                                    <input type="text" class="form-control" id="religion" name="religion" value="{{$profile->religion}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control" value="{{$profile->user->gender}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Civil Status</label>
                                                    <input type="text" class="form-control" id="civil_status" name="civil_status" value="{{$profile->civil_status}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Religion</label>
                                                    <input type="text" class="form-control" id="nationality" name="nationality" value="{{$profile->nationality}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="progress-contact-details">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{$profile->mobile_no}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$profile->address}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="progress-background-details">
                                        <div class="row mb-3">
                                            <strong>Elementary</strong>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">School</label>
                                                    <input type="text" class="form-control" id="elementary_school" name="elementary_school" value="{{$profile->elementary_school}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="elementary_address" name="elementary_address" value="{{$profile->elementary_address}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="elementary_year_graduated" name="elementary_year_graduated" value="{{$profile->elementary_year_graduated}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <strong>High School</strong>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">School</label>
                                                    <input type="text" class="form-control" id="highschool_school" name="highschool_school" value="{{$profile->highschool_school}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="highschool_address" name="highschool_address" value="{{$profile->highschool_address}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="highschool_year_graduated" name="highschool_year_graduated" value="{{$profile->highschool_year_graduated}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="progress-guardian-details">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Guardian Name</label>
                                                    <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{$profile->guardian_name}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="guardian_contact" name="guardian_contact" value="{{$profile->guardian_contact}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Occupation</label>
                                                    <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="{{$profile->guardian_occupation}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="guardian_address" name="guardian_address" value="{{$profile->guardian_address}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Relationship</label>
                                                    <input type="text" class="form-control" id="guardian_relationship" name="guardian_relationship" value="{{$profile->guardian_relationship}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="progress-parents-details">
                                        <div class="row mb-3">
                                            <strong>Mothers Information</strong>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="mothers_name" name="mothers_name" value="{{$profile->mothers_name}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control" id="mothers_contact" name="mothers_contact" value="{{$profile->mothers_contact}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="mothers_email" name="mothers_email" value="{{$profile->mothers_email}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Occupation</label>
                                                    <input type="text" class="form-control" id="mothers_occupation" name="mothers_occupation" value="{{$profile->mothers_occupation}}">
                                                </div>
                                            </div>
    
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="mothers_address" name="mothers_address" value="{{$profile->mothers_address}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <strong>Fathers Information</strong>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="fathers_name" name="fathers_name" value="{{$profile->fathers_name}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control" id="fathers_contact" name="fathers_contact" value="{{$profile->fathers_contact}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="fathers_email" name="fathers_email" value="{{$profile->fathers_email}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Occupation</label>
                                                    <input type="text" class="form-control" id="fathers_occupation" name="fathers_occupation" value="{{$profile->fathers_occupation}}">
                                                </div>
                                            </div>
    
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="fathers_address" name="fathers_address" value="{{$profile->fathers_address}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="progress-confirm-details">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5>Confirm Detail</h5>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit Form
                                                            <i class="ri-send-plane-line ml-2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>

                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                            <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                            <li class="next"><a href="javascript: void(0);">Next</a></li>
                        </ul>
                    </div>

                </div><!-- /card body --> 

            </div><!-- /card -->
        </div>
    </div>
</div>
@endsection