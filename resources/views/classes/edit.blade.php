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
                            <a class="" href="{{route('classes.index')}}" title="Back">
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
                                <form method="POST" enctype="multipart/form-data" action="{{ route('classes.update', $class->id) }}">
                                    @csrf
                                    @method('PUT')

                                            <div class="form-group row mb-3">
                                                <label>Course</label>
                                                <input type="text" class="form-control" name="" id="" value="{!!$class->course->course_title!!}" readonly>
                                                @error('course_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="" id="" value="{!!$class->subjects->subject_title!!}" readonly>
                                                @error('course_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Section</label>
                                                <input type="text" class="form-control" name="class_section" id="class_section" value="{!!$class->section!!}">
                                                @error('class_section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Semester</label>
                                                <input type="text" class="form-control" name="" id="" value="{!!$class->sem->semester!!}" readonly>
                                                @error('course_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Teacher</label>
                                                <select id="new_teacher" name="new_teacher" class="form-control" required>
                                                    <option value="{{$teacher->id}}" selected>{!!$teacher->lastname!!}, {!!$teacher->firstname!!} {!!$teacher->middlename!!}</option>
                                                    <option disabled> Select New Teacher </option>
                                                    @foreach($new_teacher as $item)
                                                        @if($item->id != $teacher->id)
                                                            <option value="{{$item->id}}">{!!$item->lastname!!}, {!!$item->firstname!!} {!!$item->middlename!!}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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