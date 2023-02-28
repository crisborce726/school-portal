<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta content="Online Supply Inventory System" name="Chrispin B. Zamoranos" />
        <!-- Favicon -->
	    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('assets/images/dccp.png')}}">

        <!-- jquery.vectormap css -->
        <link href="{{URL::to('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{URL::to('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Plugin css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/@fullcalendar/core/main.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/libs/@fullcalendar/daygrid/main.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/libs/@fullcalendar/bootstrap/main.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/libs/@fullcalendar/timegrid/main.min.css') }}" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="{{URL::to('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{URL::to('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  
        <!-- Icons Css -->
        <link href="{{URL::to('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{URL::to('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        {{-- message toastr --}}
        <link  href="{{URL::to('assets/css/toastr.min.css')}}" rel="stylesheet">

        {{-- message toastr --}}
        <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
        <script src="{{URL::to('assets/js/toastr.min.js')}}"></script>

        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="{{ URL::to('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
        

    </head>

    <body data-topbar="dark">
    {{-- message --}}
    {!! Toastr::message() !!}
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/dccp.png" alt="logo-sm" height="45">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/dccp.png" alt="logo-dark" height="45">
                                </span>
                            </a>

                            <a href="/" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/dccp.png" alt="logo-sm" height="45">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/dccp.png" alt="logo-dark" height="45">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                        <div class="position-relative mt-4 text-white">
                            Welcome! to D.C.C.P. Student Portal
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="storage/cover_images/{!!Auth::user()->cover_image!!}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{!!Auth::user()->firstname!!} {!!Auth::user()->lastname!!}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('profile.user', Auth::user()->id)}}"><i class="ri-user-line align-middle me-1"></i> My Profile</a>
                                <a class="dropdown-item" href="{{route('account.user', Auth::user()->id)}}"><i class="ri-user-settings-line"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{!! url('/logout') !!}"
										onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                                        Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            @include('includes.sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@yield('page_title')</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active">@yield('active')</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield('content')

                        
                    </div>
                    
                </div>
                <!-- End Page-content -->
            
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <script src="{{URL::to('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/node-waves/waves.min.js')}}"></script>
        
        <!-- apexcharts -->
        <script src="{{URL::to('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{URL::to('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{URL::to('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        
        <!-- Buttons examples -->
        <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <script src="{{ URL::to('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        
        <!-- Responsive examples -->
        <script src="{{ URL::to('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::to('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ URL::to('assets/js/pages/datatables.init.js') }}"></script>

        <!-- twitter-bootstrap-wizard js -->
        <script src="{{ URL::to('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

        <script src="{{ URL::to('assets/libs/twitter-bootstrap-wizard/prettify.js')}}"></script>

        <!-- form wizard init -->
        <script src="{{ URL::to('assets/js/pages/form-wizard.init.js')}}"></script>


        <!-- plugin js -->
        <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-ui-dist/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/libs/@fullcalendar/core/main.min.js') }}"></script>
        <script src="{{ asset('assets/libs/@fullcalendar/bootstrap/main.min.js') }}"></script>
        <script src="{{ asset('assets/libs/@fullcalendar/daygrid/main.min.js') }}"></script>
        <script src="{{ asset('assets/libs/@fullcalendar/timegrid/main.min.js') }}"></script>
        <script src="{{ asset('assets/libs/@fullcalendar/interaction/main.min.js') }}"></script>

        <!-- Calendar init -->
        <script src="{{ asset('assets/js/pages/calendar.init.js') }}"></script>

        <!-- App js -->
        <script src="{{URL::to('assets/js/app.js')}}"></script>

        <!-- Right Click Disabled js -->
        <script>
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>

        <!-- F5 or Refresh Disabled js -->
        <!--
        <script>
            function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

            $(document).ready(function(){
                $(document).on("keydown", disableF5);
            });
        </script> -->

        <!-- Modal Data -->
        <script type="text/javascript">
            $(document).on("click", ".delPost", function () {
                var post_id = $(this).data('post_id');
                $(".modal-body #post_id").val( post_id );
            });

            $(document).on("click", ".archiveUser", function () {
                var user_id = $(this).data('user_id');
                $(".modal-body #user_id").val( user_id );
            });

            $(document).on("click", ".restoreUser", function () {
                var user_id = $(this).data('user_id');
                $(".modal-body #user_id").val( user_id );
            });

            $(document).on("click", ".blockUser", function () {
                var user_id = $(this).data('user_id');
                $(".modal-body #user_id").val( user_id );
            });

            $(document).on("click", ".activateUser", function () {
                var user_id = $(this).data('user_id');
                $(".modal-body #user_id").val( user_id );
            });

            $(document).on("click", ".delCourse", function () {
                var course_id = $(this).data('course_id');
                $(".modal-body #course_id").val( course_id );
            });

            $(document).on("click", ".delSubject", function () {
                var subject_id = $(this).data('subject_id');
                $(".modal-body #subject_id").val(subject_id);
            });

            $(document).on("click", ".editEvent", function () {
                var event_id = $(this).data('event_id');
                var event_title = $(this).data('event_title');
                $(".modal-body #event_id").val(event_id);
                $(".modal-body #event_title").val(event_title);
                
                $(".modal-footer #event_id").val(event_id);
            });

            $(document).on("click", ".delEvent", function () {
                var event_id = $(this).data('event_id');
                $(".modal-body #event_id").val(event_id);
            });

            $(document).on("click", ".delSem", function () {
                var sem_id = $(this).data('sem_id');

                $(".modal-body #sem_id").val(sem_id);
            });

            $(document).on("click", ".endSem", function () {
                var sem_id = $(this).data('sem_id');

                $(".modal-body #sem_id").val(sem_id);
            });

            $(document).on("click", ".delSubject", function () {
                var subject_id = $(this).data('subject_id');

                $(".modal-body #subject_id").val(subject_id);
            });

            $(document).on("click", ".addClass", function () {
                var course_id = $(this).data('course_id');
                var subject_id = $(this).data('subject_id');

                $(".modal-body #course_id").val(course_id);
                $(".modal-body #subject_id").val(subject_id);
            });

            $(document).on("click", ".endClass", function () {
                var class_id = $(this).data('class_id');

                $(".modal-body #class_id").val(class_id);
            });

            $(document).on("click", ".delClass", function () {
                var class_id = $(this).data('class_id');

                $(".modal-body #class_id").val(class_id);
            });

            $(document).on("click", ".addAccount", function () {
                var student_id = $(this).data('student_id');

                $(".modal-body #student_id").val(student_id);
            });

            $(document).on("click", ".updateGradeCollege", function () {
                var class_id = $(this).data('class_id');
                var student_id = $(this).data('student_id');

                $(".modal-body #class_id").val(class_id);
                $(".modal-body #student_id").val(student_id);

            });

            $(document).on("click", ".updateGradeSenior", function () {
                var class_id = $(this).data('class_id');
                var student_id = $(this).data('student_id');

                $(".modal-body #class_id").val(class_id);
                $(".modal-body #student_id").val(student_id);

            });

            $(document).on("click", ".addViolation", function () {
                var user_id = $(this).data('user_id');

                $(".modal-body #user_id").val(user_id);

            });

            $(document).on("click", ".delRecord", function () {
                var record_id = $(this).data('record_id');

                $(".modal-body #record_id").val(record_id);

            });
            
        </script>

    </body>

</html>