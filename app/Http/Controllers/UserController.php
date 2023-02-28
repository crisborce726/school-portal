<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use App\Models\Faculty;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
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

        if (Gate::allows('isAdmin')){
            $title = "Users";
            $data = User::all();
            return view('users.index', compact('title', 'data'));
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
    public function create(){

        if (Gate::allows('isAdmin')){
            $title = "Add User";
            
            //Senior High Courses
            $senior_courses = Course::where('level', 'Senior High')->get();
            //College Courses
            $college_courses = Course::where('level', 'College')->get();


            return view('users.create', compact('title', 'senior_courses', 'college_courses'));

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        Date_default_timezone_set('Asia/Manila');

        $request->validate([
            'role' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'email|unique:users'
        ]);

        if(!User::where('email', $request['email'])->exists()){

            //Handle File Upload
            if($request->hasFile('cover_image')){

                //How to get a  file name with the Extension
                $filenameWihtExt = $request->file('cover_image')->getClientOriginalName();
                //Get just the filename
                $filename  = pathinfo($filenameWihtExt, PATHINFO_FILENAME);
                //Get just the extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload  the image
                $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
                //Storage::disk('public')->putFileAs('images',$request->file('image'), $fileNameToStore);
        
                //Storage::disk('public')->put('cover_images', $request->file('cover_image'));
                //php artisan storage:link to link the storage directory into public directory
            }else{

                if($request['gender'] == 'M'){
                    $fileNameToStore = "male.jpg";
                }else{
                    $fileNameToStore = "female.jpg";
                }
            }

            $new_user = new User();
            $new_user->role = $request['role'];
            $new_user->firstname = $request['firstname'];
            $new_user->middlename = $request['middlename'];
            $new_user->lastname =  $request['lastname'];
            $new_user->gender = $request['gender'];
            $new_user->email = $request['email'];
            $new_user->password = Hash::make($request['lastname']);
            $new_user->cover_image = $fileNameToStore;
            $new_user->status = '1';
            $new_user->save();

            $get_id = DB::table('users')->latest('id')->first();

            if($request['role'] == 'student'){

                if(!empty($request['senior_course'])){
                    $course = $request['senior_course'];
                }else{
                    $course = $request['college_course'];
                }

                $new_student = new Student();
                $new_student->id =floor(time()-999999999);
                $new_student->user_id = $get_id->id;

                $new_student->course_id = $course;
                $new_student->save();
            }else{
                $new_faculty = new Faculty();
                $new_faculty->id = floor(time()-999999999);
                $new_faculty->user_id = $get_id->id;
                $new_faculty->save();
            }
        
            //success, error, info, warning
            Toastr::success('User details added successfully :)','Success');  
            return back();
        }
        //success, error, info, warning
        Toastr::warning('Email has been taken already, Please provide another email :)','Info');  
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        if (Gate::allows('isAdmin')){

            $title = "View User";
            
            $user = User::find($id);

            if($user->role == 'student'){

                $student = Student::where('user_id', $id)->first();

                $profile = Student::find($student->id);
                return view('users.student', compact('title', 'student', 'profile', 'user'));
            }else{
                $faculty = Faculty::where('user_id', $id)->first();

                $profile = Student::find($faculty->id);
                return view('users.faculty', compact('title', 'faculty', 'profile', 'user'));
            }

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        if (Gate::allows('isAdmin')){

            $title = "Edit User";
            $user = User::find($id);

            return view('users.edit', compact('title', 'user'));
            
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        Date_default_timezone_set('Asia/Manila');

        $update_user = User::find($id);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //How to get a  file name with the Extension
            $filenameWihtExt = $request->file('cover_image')->getClientOriginalName();
            //Get just the filename
            $filename  = pathinfo($filenameWihtExt, PATHINFO_FILENAME);
            //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload  the image
            $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            //Storage::disk('public')->putFileAs('images',$request->file('image'), $fileNameToStore);
    
            //Storage::disk('public')->put('cover_images', $request->file('cover_image'));
            //php artisan storage:link to link the storage directory into public directory
        }

        if($request->hasFile('cover_image')){

            if($update_user->gender == "M"){

                if($update_user->cover_image != "male.jpg"){

                    //Delete the image
                    File::delete(public_path('storage/cover_images/'. $update_user->cover_image));
                }
            }

            if($update_user->gender == "F"){

                if($update_user->cover_image != "female.jpg"){
                    //Delete the image
                    File::delete(public_path('storage/cover_images/'. $update_user->cover_image));
                }
            }

            $update_user->cover_image = $fileNameToStore;
            $update_user->save();
            //success, error, info, warning
            Toastr::success('User details updated successfully :)','Success');  
            
            return back();
        }

        if(
            $update_user->firstname != $request['firstname'] || 
            $update_user->middlename != $request['middlename'] || 
            $update_user->lastname != $request['lastname'] ||
            $update_user->email != $request['email'])
        {
            $update_user->firstname = $request['firstname'];
            $update_user->middlename = $request['middlename'];
            $update_user->lastname = $request['lastname'];
            $update_user->email = $request['email'];
            $update_user->save();
            //success, error, info, warning
            Toastr::success('User details updated successfully :)','Success');

            return back();

        }else{
            //success, error, info, warning
            Toastr::info('Nothing changes :)','Info');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function archive(Request $request){

        Date_default_timezone_set('Asia/Manila');

        if (Gate::allows('isAdmin')){

            $archive_user = User::find($request['user_id']);
            $archive_user->status = 2;
            $archive_user->save();

            //success, error, info, warning
            Toastr::success('User archived successfully :)','Success');

            return back();

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    public function restore(Request $request){

        Date_default_timezone_set('Asia/Manila');

        if (Gate::allows('isAdmin')){

            $archive_user = User::find($request['user_id']);
            $archive_user->status = 1;
            $archive_user->save();

            //success, error, info, warning
            Toastr::success('User archived successfully :)','Success');

            return back();

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    public function deactivate(Request $request)
    {
        if (Gate::allows('isAdmin'))
        {
            $archive_user = User::find($request['user_id']);
            $archive_user->status = 0;
            $archive_user->save();

            //success, error, info, warning
            Toastr::success('User deactivated successfully :)','Success');

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

    public function activate(Request $request)
    {
        if (Gate::allows('isAdmin'))
        {
            $archive_user = User::find($request['user_id']);
            $archive_user->status = 1;
            $archive_user->save();

            //success, error, info, warning
            Toastr::success('User activated successfully :)','Success');

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

    public function archived(){
        
        Date_default_timezone_set('Asia/Manila');

        if (Gate::allows('isAdmin')){
            $title = "Archived Users";
            $data = User::where('status', 2)->get();
            return view('users.archived', compact('title', 'data'));

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    public function deactivated(){

        Date_default_timezone_set('Asia/Manila');

        if (Gate::allows('isAdmin')){

            $title = "Deactivated Users";
            $data = User::where('status', 0)->get();
            return view('users.deactivated', compact('title', 'data'));

        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }


    //Own Profile
    public function profile($id){

        if (auth()->user()->role != 'student'){
            if(auth()->user()->id == $id){

                $title = "User Profile";
                $faculty = Faculty::where('user_id', $id)->first();

                $user = User::find($id);
                $profile = Faculty::find($faculty->id);

                return view('profile.index', compact('title','user', 'profile'));

            }else{
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
    
        }elseif (auth()->user()->role == 'student'){
            if(auth()->user()->id == $id){

                $title = "User Profile";
                $student = Student::where('user_id', $id)->first();

                $user = User::find($id);
                $profile = Student::find($student->id);
                $course = Course::find($profile->course_id);

                return view('profile.index', compact('title','user', 'profile', 'course'));

            }else{
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
            
        }else{
            //401 Unauthorized
            //403 Forbidden
            //Not Found
            abort(401);
        }
    }

    public function account($id){

        Date_default_timezone_set('Asia/Manila');

        
            if(auth()->user()->id == $id){

                $title = "My Account";
                $user = User::find($id);

                if(auth()->user()->role != 'student'){
                    return view('profile.edit', compact('title','user'));
                }else{
                    $student = Student::where('user_id', $id)->first();
                    $course = Course::find($student->course_id);
                    return view('profile.edit', compact('title','user', 'course'));
                }
                
                

            }else{
                //401 Unauthorized
                //403 Forbidden
                //Not Found
                abort(401);
            }
    }

    public function change_password(Request $request, $id){

        if(request('password') == request('password_confirmation')){

            if(Hash::check($request->input('current_password'), auth()->user()->password)){

                $user = User::find($id);
                $user->password = Hash::make(request('password'));
                $user->save();

                //success, error, info, warning
                Toastr::success('Change Password successfully :)','Success');

                return back();

            }else{

                //success, error, info, warning
                Toastr::error('Please check your old password :)','Warning');

                return back();

            }
            
        }else{
            //success, error, info, warning
            Toastr::error('New Password did not match :)','Warning');

            return back();
        }
    }

    public function my_profile(Request $request, $id){

        Date_default_timezone_set('Asia/Manila');

        $update_user = User::find($id);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //How to get a  file name with the Extension
            $filenameWihtExt = $request->file('cover_image')->getClientOriginalName();
            //Get just the filename
            $filename  = pathinfo($filenameWihtExt, PATHINFO_FILENAME);
            //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload  the image
            $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            //Storage::disk('public')->putFileAs('images',$request->file('image'), $fileNameToStore);
    
            //Storage::disk('public')->put('cover_images', $request->file('cover_image'));
            //php artisan storage:link to link the storage directory into public directory
        }

        if($request->hasFile('cover_image')){

            if($update_user->gender == "M"){

                if($update_user->cover_image != "male.jpg"){

                    //Delete the image
                    File::delete(public_path('storage/cover_images/'. $update_user->cover_image));
                }
            }

            if($update_user->gender == "F"){

                if($update_user->cover_image != "female.jpg"){
                    //Delete the image
                    File::delete(public_path('storage/cover_images/'. $update_user->cover_image));
                }
            }

            $update_user->cover_image = $fileNameToStore;
            $update_user->save();
            //success, error, info, warning
            Toastr::success('User details updated successfully :)','Success');  
            
            return back();
        }

        if($update_user->email != $request['email'])
        {
            $update_user->email = $request['email'];
            $update_user->save();

            //success, error, info, warning
            Toastr::success('User details updated successfully :)','Success');

            return back();

        }else{
            //success, error, info, warning
            Toastr::info('Nothing changes :)','Info');

            return back();
        }

        
    }
}
