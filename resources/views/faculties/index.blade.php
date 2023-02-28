@extends('layouts.app')
@section('title',$title . ' | DCCP-Portal')

@section('content')
    @section('page_title')
        Dashboard
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
                            <th>Role</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($data  as $item)
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle header-profile-user" src="storage/cover_images/{!!$item->cover_image!!}"alt="Header Avatar">
                                </td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->role}}</td>
                                <td>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($item->status == 0)
                                        <span class="badge bg-danger">Deactivated</span>
                                    @elseif($item->status == 2)
                                        <span class="badge bg-warning">Archived</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection