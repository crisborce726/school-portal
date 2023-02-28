<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GuidanceRecordController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Access website/storage-link after deploying to link the storage to public
Route::get('/storage-link', function(){
  $targetFolder = storage_path('app/public');
  $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
  symlink($targetFolder,$linkFolder);
  echo "Link Success";
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

//Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//===================================================================================
//====================================POSTS==========================================
//===================================================================================
Route::controller(PostController::class)->group(function(){
  Route::get('posts', 'index')->name('posts.index');
  Route::post('posts', 'store')->name('posts.store');
  Route::get('posts.{id}.edit', 'edit')->name('posts.edit');
  Route::put('posts.{id}', 'update')->name('posts.update');
  Route::delete('posts', 'destroy')->name('posts.destroy');
});

//===================================================================================
//====================================USERS==========================================
//===================================================================================
Route::controller(UserController::class)->group(function(){
  Route::get('users', 'index')->name('users.index');
  Route::get('users.create', 'create')->name('users.create');
  Route::post('users', 'store')->name('users.store');
  Route::get('users.{id}', 'show')->name('users.show');
  Route::get('edit.{id}.user', 'edit')->name('edit.users');
  Route::put('users.{id}', 'update')->name('users.update');
  Route::delete('users', 'destroy')->name('users.destroy');

  Route::put('archive', 'archive')->name('users.archive');
  Route::put('restore', 'restore')->name('users.restore');
  Route::put('deactivate', 'deactivate')->name('users.deactivate');
  Route::put('activate', 'activate')->name('users.activate');

  Route::get('archives', 'archived')->name('archive.users');
  Route::get('deactivated', 'deactivated')->name('deactivated.users');
  Route::get('user.{id}.profile', 'profile')->name('profile.user');
  Route::get('my_account.{id}.setting', 'account')->name('account.user');
  Route::put('change.password/{id}', 'change_password')->name('change.password');
  Route::put('manage.pasprofilesword/{id}', 'my_profile')->name('manage.profile');
});

//===================================================================================
//====================================FACULTIES======================================
//===================================================================================
Route::controller(FacultyController::class)->group(function(){
  Route::get('faculties', 'index')->name('faculties.index');
  Route::get('profile.{id}', 'profile')->name('edit.profile');
  Route::put('faculty-profile.{id}', 'update')->name('faculties.update');
});

//===================================================================================
//====================================STUDENTS=======================================
//===================================================================================
Route::controller(StudentController::class)->group(function(){
  Route::get('students', 'index')->name('students.index');
  Route::get('my.profile.{id}', 'profile')->name('student');
  Route::put('student-profile.{id}', 'update')->name('student.update');
});


//===================================================================================
//====================================COURSE=========================================
//===================================================================================
Route::controller(CourseController::class)->group(function(){
  Route::get('courses.senior', 'index')->name('courses.index');
  Route::get('courses.college', 'college')->name('courses.college');
  Route::post('courses', 'store')->name('courses.store');
  Route::get('courses.{id}.edit', 'edit')->name('courses.edit');
  Route::put('courses.{id}', 'update')->name('courses.update');
  Route::get('courses.{id}.subjects', 'show')->name('courses.show');
  Route::delete('courses', 'destroy')->name('courses.destroy');
});

//===================================================================================
//====================================SUBJETC========================================
//===================================================================================
Route::controller(SubjectController::class)->group(function(){
  Route::get('subjects', 'index')->name('subjects.index');
  Route::get('subjects.create', 'create')->name('subjects.create');
  Route::post('subjects', 'store')->name('subjects.store');
  Route::get('edit.{id}.subjects', 'edit')->name('subjects.edit');
  Route::put('subjects.{id}', 'update')->name('subjects.update');
  Route::delete('subjects', 'destroy')->name('subjects.destroy');
});

//===================================================================================
//====================================SUBJETC========================================
//===================================================================================
Route::controller(SemesterController::class)->group(function(){
  Route::get('semesters', 'index')->name('semesters.index');
  Route::post('semesters', 'store')->name('semesters.store');
  Route::get('edit.{id}.semesters', 'edit')->name('semesters.edit');
  Route::put('semesters.{id}', 'update')->name('semesters.update');
  Route::delete('semesters', 'destroy')->name('semesters.destroy');
  
  Route::put('end.{id}.sem', 'end')->name('end.sem');
});

//===================================================================================
//====================================CLASSES========================================
//===================================================================================
Route::controller(ClassScheduleController::class)->group(function(){
  Route::get('classes', 'index')->name('classes.index');
  Route::post('classes', 'store')->name('classes.store');
  Route::get('edit.{id}.classes', 'edit')->name('classes.edit');
  Route::put('classes.{id}', 'update')->name('classes.update');
  Route::delete('classes', 'destroy')->name('classes.destroy');

  Route::put('end.class', 'end')->name('classes.end');
  Route::get('my.class.{id}', 'teacherClass')->name('my.class');
  Route::get('my.student.{id}.class', 'myStudentClass')->name('student.class');
});



//===================================================================================
//====================================STUDENT CLASSES================================
//===================================================================================
Route::controller(StudentClassController::class)->group(function(){
  Route::get('schedules.{id}.show', 'studentSchedule')->name('schedules.show');
  Route::post('schedules', 'store')->name('schedules.store');
});

//===================================================================================
//====================================CALENDAR=======================================
//===================================================================================
Route::controller(CalendarController::class)->group(function(){
  Route::get('calendar', 'index')->name('calendar.index');
  Route::post('calendar', 'store')->name('calendar.store');
  Route::put('calendar.{id}', 'update')->name('calendar.update');
  Route::delete('calendar', 'destroy')->name('calendar.destroy');
});

//===================================================================================
//====================================TRANSACTION====================================
//===================================================================================
Route::controller(TransactionController::class)->group(function(){
  Route::get('transactions', 'index')->name('transactions.index');
  Route::post('transactions', 'store')->name('transactions.store');
});

//===================================================================================
//====================================STUDENT ACCOUNT================================
//===================================================================================
Route::controller(StudentAccountController::class)->group(function(){
  Route::get('student.accounts', 'index')->name('accounts.index');
  Route::post('student.accounts', 'store')->name('accounts.store');
  Route::get('student.{id}.account', 'show')->name('accounts.show');

  Route::get('student.{id}.invoice', 'invoice')->name('view.invoice');
});

//===================================================================================
//====================================STUDENT ACCOUNT================================
//===================================================================================
Route::controller(GradeController::class)->group(function(){
  Route::get('grades.{id}', 'index')->name('grades.index');
  Route::put('college.update', 'updateCollege')->name('college.update');
  Route::put('senior.update', 'updateSenior')->name('senior.update');
});


//===================================================================================
//====================================GUIDANCE RECORDS===============================
//===================================================================================
Route::controller(GuidanceRecordController::class)->group(function(){
  Route::get('guidance.records', 'index')->name('guidance.index');
  Route::post('guidance', 'store')->name('guidance.store');
  Route::delete('guidance', 'destroy')->name('guidance.destroy');
});
