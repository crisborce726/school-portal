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

                    @foreach($data  as $item)
                    <table id="table-responsive" class="table table-striped table-bordered dt-responsive nowrap mb-3 bg-dark text-white"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    @php $get_name = DB::table('semesters')->where('id', $item->sem_id)->first(); @endphp
                                    {{$get_name->semester}}
                                </td>
                                <td>
                                    <a class="btn" title="View Invoice" href="{{ route('view.invoice', $item->id) }}">
                                        <i class="ri-eye-line text-success"></i>
                                    </a>
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                    @endforeach

                    @if(count($data) == 0)
                        <p class="text-center">No Record Found</p>
                    @endif
                </div> <!-- end card body content-->
                
            </div><!-- /.card -->

            
        </div>
    </div>
</div>
@endsection