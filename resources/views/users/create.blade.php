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
                                <a class="btn" title="Back" href="{{ route('users.index') }}">
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
                                    <h3 class="card-title">User Details</h3>
    
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('users.store') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label>Role</label>
                                            <select  id="role" onchange="check()" name="role" class="form-control" @error('role') is-valid @enderror>
                                                <option value="" disabled selected>Select Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="teacher">Teacher</option>
                                                <option value="cashier">Cashier</option>
                                                <option value="guidance">Guidance</option>
                                                <option value="student">Student</option>
                                            </select>
                                            <span class="text-danger"><i>*Required</i></span>
                                        </div>

                                        <div class="mb-3">
                                            <label>Level</label>
                                            <select disabled id="level" name="level" class="form-control" onchange="level_check()">
                                                <option value="" disabled selected>Select</option>
                                                <option value="senior">Senior High</option>
                                                <option value="colloge">Colloge</option>
                                            </select>
                                            <span class="text-danger"><i>*Required, If Role is Student</i></span>
                                        </div>

                                        <div class="mb-3">
                                            <select disabled hidden id="senior_course" name="senior_course" class="form-control">
                                                <option value="" disabled selected>Select Senior High Course</option>
                                                @foreach($senior_courses as $data)
                                                    <option value="{{$data->id}}">{{$data->course_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <select disabled hidden id="college_course" name="college_course" class="form-control">
                                                <option value="" disabled selected>Select College Course</option>
                                                @foreach($college_courses as $data)
                                                    <option value="{{$data->id}}">{{$data->course_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label>Firstname</label>
                                            <input autofocus onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-valid @enderror" value="{{old('firstname')}}" placeholder="Type something">
                                            <span class="text-danger"><i>*Required</i></span>
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>

                                        <div class="mb-3">
                                            <label>Middlename</label>
                                            <input onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' type="text" id="middlename" name="middlename" class="form-control @error('middlename') is-valid @enderror" value="{{old('middlename')}}" placeholder="Type something">
                                        </div>

                                        <div class="mb-3">
                                            <label>Lastname</label>
                                            <input onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-valid @enderror" value="{{old('lastname')}}" placeholder="Type something">
                                            <span class="text-danger"><i>*Required</i></span>
                                        </div>

                                        <div class="mb-3">
                                            <label>Gender</label>
                                            <select  id="gender" name="gender" class="form-control @error('gender') is-valid @enderror" value="{{old('gender')}}">
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                            <span class="text-danger"><i>*Required</i></span>
                                        </div>

                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="text" id="email" name="email" class="form-control @error('email') is-valid @enderror" value="{{old('email')}}" placeholder="Type something">
                                            <span class="text-danger"><i>*Required</i></span>
                                        </div>

                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="text" class="form-control" required placeholder="Default Password: Lastname" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <input type="file" name="cover_image" id="cover_image" multiple="multiple" accept="image/*">
                                            <span><i>*If any.</i></span>
                                            <span><i>.jpg, .png</i></span>
                                        </div>

                                        <div style="text-align: right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit Form <i class="ri-send-plane-line ml-2"></i></button>
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
    function check()
    {
        if(document.getElementById('role').value == 'student'){
            document.getElementById('level').disabled=false;
            document.getElementById('senior_course').disabled=false;
        }else{
            document.getElementById('level').disabled=true;
            document.getElementById('senior_course').disabled=true;
        }
    }

    function level_check(){
        if(document.getElementById('level').value == 'senior'){
            document.getElementById('senior_course').disabled=false;
            document.getElementById('senior_course').hidden=false;
            document.getElementById('college_course').disabled=true;
            document.getElementById('college_course').hidden=true;
        }else{
            document.getElementById('senior_course').disabled=true;
            document.getElementById('senior_course').hidden=true;
            document.getElementById('college_course').disabled=false;
            document.getElementById('college_course').hidden=false;
        }
    }
</script>