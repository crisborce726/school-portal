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

                        @if(auth()->user()->role = 'admin')
                            <div class="page-title-right">
                                <a class="" href="{{route('courses.index')}}" title="Back">
                                    <i class="ri-arrow-left-s-line"></i> Back
                                </a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                            <div class="col-md-6">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('courses.update', $data->id) }}">
                                    @csrf
                                    @method('PUT')

                                            <div class="form-group row mb-3">
                                                <label>Course Code</label>
                                                <input type="text" class="form-control" name="course_code" id="course_code" value="{!!$data->course_code!!}" >
                                                @error('course_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Course Title</label>
                                                <input type="text" class="form-control" name="course_title" id="course_title" value="{!!$data->course_title!!}" >
                                                @error('course_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                      

                                        

                                            <div style="text-align: right">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update <i class="ri-send-plane-line ml-2"></i></button>
                                            </div>
                                    
                                </form>
                            </div>
                        <div class="col-md-3">
                        </div>
                    </div><!-- /row -->
                </div> <!-- /.card body -->

            </div><!-- /.card -->

        </div>
    </div>
</div>
@endsection