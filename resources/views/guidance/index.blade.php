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
                    <table id="alternative-page-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Violation</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle header-profile-user" src="storage/cover_images/{!!$item->user->cover_image!!}"alt="Header Avatar">
                                </td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->lastname}}, {{$item->user->firstname}} {{$item->user->middlename}}</td>
                                <td>{{$item->violations}}</td>
                                <td>
                                </td>
                                <td>
                                    <button title="Delete" type="button" class="btn waves-effect waves-light delRecord"
                                        data-record_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#delRecord">
                                            <i class="ri-delete-bin-line text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card -->

            <!-- Delete Record Modal -->
            <div class="modal fade" id="delRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Record Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('guidance.destroy') }}">
                                @csrf
                                @method('DELETE') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to delete this record?
                                    </p>
                                    <input class="form-control" type="text" name="record_id" id="record_id" hidden>
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
            <!-- /Add Record Modal -->
        </div>
    </div>
</div>
@endsection