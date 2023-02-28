<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Array portion is for you to except pages.
        //$this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
        $this->middleware('check_user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Gate::allows('isAdmin') || Gate::allows('isTeacher') || Gate::allows('isCashier') || Gate::allows('isGuidance') || Gate::allows('isStudent')){
            $title = "Posts";
            $posts = Post::latest()->get();
            return view('posts.index', compact('title', 'posts'));
    
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request){
        Date_default_timezone_set('Asia/Manila');

        if (Gate::allows('isAdmin') || Gate::allows('isTeacher') || Gate::allows('isCashier') || Gate::allows('isGuidance')){
            //Handle File Upload
            if($request->hasFile('post_image')){
                //How to get a  file name with the Extension
                $filenameWihtExt = $request->file('post_image')->getClientOriginalName();
                //Get just the filename
                $filename  = pathinfo($filenameWihtExt, PATHINFO_FILENAME);
                //Get just the extension
                $extension = $request->file('post_image')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload  the image
                $request->file('post_image')->storeAs('public/posts_images', $fileNameToStore);
                //Storage::disk('public')->putFileAs('images',$request->file('image'), $fileNameToStore);
        
                //Storage::disk('public')->put('cover_images', $request->file('cover_image'));
                //php artisan storage:link to link the storage directory into public directory
            }else{
                $fileNameToStore = NULL;
            }

            $new_post = new Post();
            $new_post->id = floor(time()-999999999);
            $new_post->user_id = auth()->user()->id;
            $new_post->title = $request['title'];
            $new_post->body = $request['body'];
            $new_post->post_image = $fileNameToStore;
            $new_post->save();

            //success, error, info, warning
            Toastr::success('New post added successfully :)','Success');

            return back();
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isTeacher') || Gate::allows('isCashier') || Gate::allows('isGuidance'))
        {

            $edit_post = Post::find($id);

            if($edit_post->user_id == auth()->user()->id || Gate::allows('isAdmin'))
            {
                $title = "Edit Posts";
                return view('posts.edit', compact('edit_post', 'title'));
            }
            else
            {
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
        }
        else
        {
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        Date_default_timezone_set('Asia/Manila');
        
         //Handle File Upload
         if($request->hasFile('post_image'))
         {
            //How to get a  file name with the Extension
            $filenameWihtExt = $request->file('post_image')->getClientOriginalName();
            //Get just the filename
            $filename  = pathinfo($filenameWihtExt, PATHINFO_FILENAME);
            //Get just the extension
            $extension = $request->file('post_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload  the image
            $request->file('post_image')->storeAs('public/posts_images', $fileNameToStore);
            //Storage::disk('public')->putFileAs('images',$request->file('image'), $fileNameToStore);
    
            //Storage::disk('public')->put('cover_images', $request->file('cover_image'));
            //php artisan storage:link to link the storage directory into public directory
        }

        $update_post = Post::find($id);
        $update_post->title = $request['title'];
        $update_post->body = $request['body'];

        if($request->hasFile('post_image'))
        {
            //Delete the image
            File::delete(public_path('storage/posts_images/'. $update_post->post_image));

            $update_post->post_image = $fileNameToStore;
        }

        $update_post->save();

        //success, error, info, warning
        Toastr::success('Post updated successfully :)','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isTeacher') || Gate::allows('isCashier') || Gate::allows('isGuidance'))
        {
            $del_post = Post::find($request['post_id']);

            if($del_post->user_id == auth()->user()->id || Gate::allows('isAdmin'))
            {
                $del_post->delete();

                //success, error, info, warning
                Toastr::success('Post deleted successfully :)','Success');
                return back();
            }
            else
            {
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
        }
        else
        {
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }
}
