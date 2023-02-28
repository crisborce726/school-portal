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
                        <h5>{{$subject->subject_title}}</h5>
                        
                        <div class="page-title-right">
                            <a class="" href="{{route('subjects.index')}}" title="Back">
                                <i class="ri-arrow-left-s-line"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body ">

                    <div class="row">
                        <div class="col-xl-3">
                        </div>
                        <div class="col-xl-6">

                        <form method="POST" enctype="multipart/form-data" action="{{ route('subjects.update', $subject->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Subject Code</label>
                                <input type="text" id="subject_code" name="subject_code" class="form-control @error('subject_code') is-valid @enderror" value="{{$subject->subject_code}}" required placeholder="Type something">
                                <span class="text-danger"><i>*Required</i></span>
                                @error('subject_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>

                            
                            <div class="mb-3">
                                <label>Subject Title</label>
                                <input type="text" id="subject_title" name="subject_title" class="form-control @error('subject_title') is-valid @enderror" value="{{$subject->subject_title}}" required placeholder="Type something">
                                <span class="text-danger"><i>*Required</i></span>
                                @error('subject_title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if($subject->course_id >= 1001)
                                <div class="mb-3">
                                    <label>Lecture Unit</label>
                                    <input type="text" id="lec_unit" name="lec_unit"  class="form-control @error('lec_unit') is-valid @enderror" value="{{old('lec_unit')}}" required placeholder="Type something">
                                    <span class="text-danger"><i>*Required</i></span>
                                    @error('lec_unit')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Laboratory Unit</label>
                                    <input type="text" id="lec_unit" name="lec_unit" class="form-control @error('lec_unit') is-valid @enderror" value="{{old('lec_unit')}}" required placeholder="Type something">
                                    <span class="text-danger"><i>*Required</i></span>
                                    @error('lec_unit')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif

                            <div style="text-align: right">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update <i class="ri-send-plane-line ml-2"></i></button>
                            </div>
                        </form>

                        </div> <!-- end col -->
                        <div class="col-xl-3">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection