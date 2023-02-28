@extends('layouts.app')
@section('title','Dashboard | DCCP-Portal')

@section('content')
    @section('page_title')
        Dashboard
            @section('active')
                Dashboard
            @endsection
    @endsection
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container px-4 mx-auto">
                        <div class="row">
                            <div class="col-md-6 bg-white rounded shadow">
                                {!! $chart->container() !!}
                            </div>
                            <div class="col-md-6 bg-white rounded shadow">
                                {!! $pie->container() !!}
                            </div>
                        </div>
                    
                    </div>

                    <script src="{{ $chart->cdn() }}"></script>
                    {{ $chart->script() }}

                    <script src="{{ $pie->cdn() }}"></script>
                    {{ $pie->script() }}
                    

                </div>
            </div>
        </div>
    </div>
</div>


@endsection