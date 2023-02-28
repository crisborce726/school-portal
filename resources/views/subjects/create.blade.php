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
                                <a class="btn" title="Back" href="{{ route('subjects.index') }}">
                                    <i class="ri-arrow-left-s-line"></i> Back
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <h3 class="card-title">Subject Details</h3>

                                        <div class="page-title-right">
                                            <a class="btn" title="Reset" href="javascript:window.location.href=window.location.href"">
                                                <i class="ri-refresh-line"></i>
                                            </a>
                                        </div>
                                    </div>
    
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('subjects.store') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <strong>Please Select Only One Course</strong>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-3">
                                                    <label>Senior High Courses</label>
                                                    <select onchange="sen()"  id="senior"  name="senior" class="form-control" @error('senior') is-valid @enderror>
                                                        <option disabled selected>Select Course</option>
                                                        @foreach($senior as $item)
                                                            <option value="{{$item->id}}">{{$item->course_title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-3">
                                                    <label>College Courses</label>
                                                    <select onchange="col()"  id="college" name="college" class="form-control" @error('college') is-valid @enderror>
                                                        <option disabled selected>Select Course</option>
                                                        @foreach($college as $item)
                                                            <option value={{$item->id}}>{{$item->course_title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Subject Code</label>
                                            <input type="text" id="subject_code" name="subject_code" class="form-control @error('subject_code') is-valid @enderror" value="{{old('subject_code')}}" required placeholder="Type something">
                                            <span class="text-danger"><i>*Required</i></span>
                                            @error('subject_code')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>

                                        <div class="mb-3">
                                            <label>Subject Title</label>
                                            <input type="text" id="subject_title" name="subject_title" class="form-control @error('subject_title') is-valid @enderror" value="{{old('subject_title')}}" required placeholder="Type something">
                                            <span class="text-danger"><i>*Required</i></span>
                                            @error('subject_title')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label id="lecturename" name="lecturename">Lecture Unit</label>
                                            <input onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" type="text" id="lecture" name="lecture" class="form-control @error('lecture') is-valid @enderror" value="{{old('lec_unit')}}" placeholder="Type something">
                                            @error('lecture')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label id="labname" name="labname">Laboratory Unit</label>
                                            <input onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" type="text" id="lab" name="lab" class="form-control @error('lab') is-valid @enderror" value="{{old('lec_unit')}}" placeholder="Type something">
                                            @error('lab')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Submit</button>
                                            </div>
                                        </div>
                                    </form>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-xl-3">
                        </div>
                    </div>
                </div>
            </div><!-- /card -->
        </div>
    </div>
</div>
@endsection


<script>
    var sen = document.getElementById('senior').value;
    var col = document.getElementById('college').value;
    function sen()
    {
        if(sen <= 1000){
        }else{
            document.getElementById('college').disabled=true;
            document.getElementById('lecture').hidden=true;
            document.getElementById('lab').hidden=true;
            document.getElementById('lecturename').hidden=true;
            document.getElementById('labname').hidden=true;
        }
    }

    function col()
    {
        if(col >= 1001){
        }else{
            document.getElementById('senior').disabled=true;
            document.getElementById('lecturename').hidden=false;
            document.getElementById('labname').hidden=false;
        }
    }
</script>