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
                        <h5>Events, News and Announcement</h5>
                        
                        @if(auth()->user()->role != 'student')
                            <div class="page-title-right">
                                <button title="Add Post" type="button" class="btn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addPost">
                                    <i class="dripicons-plus"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">

                    @if(count($posts) == 0)
                        <p class="text-center">No Record Found</p>
                    @endif
                    @foreach($posts as $item)
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <label></label>
                                        
                                    @if(auth()->user()->role == 'admin' || $item->user_id == auth()->user()->id)
                                        <div class="page-title-right">
                                            <button title="Delete" type="button" class="btn waves-effect waves-light delPost" data-post_id={{$item->id}} data-bs-toggle="modal" data-bs-target="#delPost">
                                                <i class="mdi mdi-delete-outline"></i> 
                                            </button>
                                        </div>
                                    @endif

                                </div>
                                <div class="card-body">

                                    <img class="avatar-sm" src="/storage/cover_images/{{$item->user->cover_image}}" alt="img-3" >
                                    Written on {{\Carbon\Carbon::parse($item->updated_at)->format('F j, Y @ g:i:a')}}
                                    by {{$item->user->firstname}} {{$item->user->lastname}}

                                    <a href="{{ route('posts.edit', $item->id ) }}" title="Edit">
                                        <h3 class="mt-3">{{$item->title}}</h3>
                                    </a>
                                    <p>{{$item->body}}</p>
                                    
                                    @if(!$item->post_image == NULL)
                                        <div class="zoom-gallery">
                                            <a class="float-start" href="/storage/posts_images/{{$item->post_image}}" title="{{$item->post_image}}">
                                                <img class="rounded" src="/storage/posts_images/{{$item->post_image}}" alt="{{$item->post_image}}" width="275">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    

                </div>
            </div>
            
            <!-- Add Post Modal -->
            <div class="modal fade" id="addPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label>Required</label>
                                    <input type="text" class="form-control" name="title" id="tilte" placeholder="Title" required>
                                </div>
                                <div class="mb-3">
                                    <label>Required</label>
                                    <div>
                                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="Body" required></textarea>
                                    </div>
                                </div>
                                <div class="fallback mb-3">
                                    <div>
                                        <input type="file" name="post_image" id="post_image" multiple="multiple" accept="image/*">
                                    </div>
                                    <label><i>.jpg, .png</i></label>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Post Modal -->


            <!-- Delete Post Modal -->
            <div class="modal fade" id="delPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Post Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('posts.destroy') }}">
                                @csrf
                                @method('DELETE') 

                                <div class="mb-3">
                                    <p class="text-center">
                                        Are you sure you want to delete this post?
                                    </p>
                                    <input type="text" name="post_id" id="post_id" hidden>
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
    </div>
</div>
@endsection