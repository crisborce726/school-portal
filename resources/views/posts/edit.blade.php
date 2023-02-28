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
                        
                        <div class="page-title-right">
                            <a class="" href="{{route('posts.index')}}" title="Back">
                                <i class="ri-arrow-left-s-line"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('posts.update', $edit_post->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Required</label>
                            <input type="text" class="form-control" name="title" id="tilte" value="{!!$edit_post->title!!}" >
                            @if ($errors->has('title'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label>Required</label>
                            <div>
                                <textarea class="form-control" name="body" id="body" rows="5">{!!$edit_post->body!!}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                            </div>
                        </div>
                        <div class="fallback mb-3">
                            <div class="mb-3">
                                @if(!$edit_post->post_image == NULL)
                                        <a class="" href="/storage/posts_images/{{$edit_post->post_image}}" title="{{$edit_post->post_image}}">
                                            <img class="rounded" src="/storage/posts_images/{{$edit_post->post_image}}" alt="{{$edit_post->post_image}}" width="275">
                                        </a>
                                @endif
                            </div>
                            <div>
                                <input type="file" name="post_image" id="post_image" multiple="multiple" accept="image/*">
                            </div>
                            <label><i>.jpg, .png</i></label>
                        </div>
                        <div style="text-align: right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Post <i class="ri-send-plane-line ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection