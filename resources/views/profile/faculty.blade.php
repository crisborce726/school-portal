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
                                <a href="#progress-confirm-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">03</span>
                                    <span class="step-title">Confirm Detail</span>
                                </a>
                            </li>
                        </ul>

                        <div id="bar" class="progress mt-4">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('faculties.update', $profile->id) }}">
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