<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="storage/cover_images/{!!Auth::user()->cover_image!!}" alt="{!!Auth::user()->cover_image!!}" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{!!Auth::user()->firstname!!} {!!Auth::user()->lastname!!}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                
                @if(auth()->user()->role == "admin")
                    @include('includes.admin')
                @elseif(auth()->user()->role == "teacher")
                    @include('includes.teacher')
                @elseif(auth()->user()->role == "cashier")
                    @include('includes.cashier')
                @elseif(auth()->user()->role == "guidance")
                    @include('includes.guidance')
                @elseif(auth()->user()->role == "student")
                    @include('includes.student')
                @endif
                
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>