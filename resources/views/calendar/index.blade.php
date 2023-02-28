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
                        <h5>School Event Calendar</h5>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-xl-4">
                            <div class="card h-100">
                                <div class="card-body">

                                    @if(auth()->user()->role != 'student')
                                        <button type="button" class="btn btn-primary waves-effect waves-light w-100"
                                            id="btn-new-event" data-bs-toggle="modal" data-bs-target="#event-modal">
                                            <i class="ri-file-add-line"></i> Create New Event
                                        </button>
                                    @endif
                                    <div id="external-events">
                                        <br>
                                        <p class="text-muted">List of Events</p>
                                        @foreach($calendars as $item)
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    {{$item->user->firstname}} {{$item->user->lastname}}
                                                        <div class="external-event fc-event {{$item->color}}" data-class="bg-success">
                                                            <button type="button" class="btn btn-sm text-white editEvent"
                                                                data-event_id={{$item->id}}
                                                                data-event_title={{$item->title}}
                                                                data-bs-toggle="modal" data-bs-target="#editEvent">
                                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>
                                                                <span>
                                                                    {{$item->title}} {{\Carbon\Carbon::parse($item->start_date)->format('d/m/Y')}} - 
                                                                    {{\Carbon\Carbon::parse($item->end_date)->format('d/m/Y')}}
                                                                </span>
                                                                
                                                                @if(auth()->user()->role == 'admin' || auth()->user()->id == $item->user_id)
                                                                    <button title="Delete" type="button" class="btn waves-effect waves-light delEvent" data-event_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#delEvent">
                                                                        <i class="mdi mdi-delete-outline text-white"></i> 
                                                                    </button>
                                                                @endif
                                                            </button>
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="d-flex justify-content-center">
                                            {!! $calendars->links() !!}
                                        </div>

                                        @if(count($calendars) == 0)
                                            <div class="d-flex justify-content-center">
                                                <span class="text-muted"><i>No Record Found.</i></span>
                                            </div>
                                        @endif
                                            
                                    </div>
                                    
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-8">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                    <div style='clear:both'></div>
        
                    @if(auth()->user()->role != 'student')
                        <!-- Add New Event MODAL -->
                        <div class="modal fade" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-3 px-4">
                                        <h5 class="modal-title" id="modal-title">Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
            
                                    <div class="modal-body p-4">
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('calendar.store') }}">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Event Name</label>
                                                            <input class="form-control" placeholder="Insert Event Name" type="text"
                                                                name="title" id="title" required value="">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid event name
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col-->
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Category</label>
                                                            <select class="form-select" name="category" id="event-category">
                                                                <option  selected> --Select-- </option>
                                                                <option value="bg-danger">Danger</option>
                                                                <option value="bg-success">Success</option>
                                                                <option value="bg-primary">Primary</option>
                                                                <option value="bg-info">Info</option>
                                                                <option value="bg-dark">Dark</option>
                                                                <option value="bg-warning">Warning</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a valid event
                                                                category</div>
                                                        </div>
                                                    </div> <!-- end col-->
                                                </div> <!-- end row-->
                                                <div class="row mt-2">
                                                    <div class="col-6">

                                                    </div> <!-- end col-->
                                                    <div class="col-6 text-end">
                                                        <button type="button" class="btn btn-light me-1"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                    </div> <!-- end col-->
                                                </div> <!-- end row-->
                                        </form>
                                    </div>
                                </div>
                                <!-- end modal-content-->
                            </div>
                            <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->

                        
                        <!-- Edit Event Modal -->
                        <div class="modal fade" id="editEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('calendar.update', auth()->user()->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event ID</label>
                                                    <input class="form-control" type="text" name="event_id" id="event_id" hidden>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid event name
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Title</label>
                                                    <input class="form-control" type="text" name="event_title" id="event_title">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid event name
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="category" id="event-category">
                                                        <option  selected> --Select-- </option>
                                                        <option value="bg-danger">Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event
                                                        category</div>
                                                </div>
                                            </div> <!-- end col-->                                        
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Edit Event Modal -->

                    @endif


                    <!-- Delete Post Modal -->
                    <div class="modal fade" id="delEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Delete Event Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('calendar.destroy') }}">
                                        @csrf
                                        @method('DELETE') 

                                        <div class="mb-3">
                                            <p class="text-center">
                                                Are you sure you want to delete this event?
                                            </p>
                                            <input class="form-control" type="text" name="event_id" id="event_id" hidden>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Add Post Modal -->


                </div>
            </div><!-- /card -->
        </div>
    </div>
</div>
@endsection