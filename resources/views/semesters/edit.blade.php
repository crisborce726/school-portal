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
                                <a class="" href="{{route('semesters.index')}}" title="Back">
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
                                <form method="POST" enctype="multipart/form-data" action="{{ route('semesters.update', $data->id) }}">
                                    @csrf
                                    @method('PUT')

                                            <div class="form-group row mb-3">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" id="title" value="{!!$data->semester!!}" >
                                                @error('semester')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label>Status</label>
                                                @if($data->status == 1)
                                                    <select id="sem_stat" name="sem_stat" class="form-control">
                                                        <option value={!!$data->status!!} selected>Current</option>
                                                        <option value=2>Active</option>
                                                        <option value=3>Incomming</option>
                                                    </select>
                                                @elseif($data->status == 2)
                                                    <select id="sem_stat" name="sem_stat" class="form-control">
                                                        <option value=1>Current</option>
                                                        <option value={!!$data->status!!} selected>Active</option>
                                                        <option value=3>Incomming</option>
                                                    </select>
                                                @elseif($data->status == 3)
                                                    <select id="sem_stat" name="sem_stat" class="form-control">
                                                        <option value=1>Current</option>
                                                        <option value=2>Active</option>
                                                        <option value={!!$data->status!!} selected>Incomming</option>
                                                    </select>
                                            @endif

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