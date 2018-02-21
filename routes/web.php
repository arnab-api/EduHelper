<?php

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

use App\Tag;
use App\Course;
use App\User;
use App\Lecture;

Route::get('/query' , function(){
    $tag_arr = Tag::all();
    foreach ($tag_arr as $tag){
        echo ">".$tag->name."<"."<br>";
    }
});

Route::get('/', function () {
    return view('Homepage');
});

Route::get('/master1', function () {
    return view('MasterLayout1');
});

Route::get('/master2', function () {
    return view('MasterLayout2');
});


Route::get('/searchResult/{key}', 'CourseController@showSearchResult');
Route::post('/getSearchKey', 'CourseController@getSearchKey');

Route::get('/allcourses', function () {
    $course_arr = Course::orderBy('title')->paginate(1);
    $num_lecture = [];
    $uploaded_by = [];
    foreach ($course_arr as $course){
        $uploader = User::find($course->uploaded_by);
        $uploaded_by = array_prepend($uploaded_by , $uploader);
        $lecture_count = Lecture::where('target_course' , $course->_id)->count();
        $num_lecture = array_prepend($num_lecture , $lecture_count);
    }

    $num_lecture = array_reverse($num_lecture);
    $uploaded_by = array_reverse($uploaded_by);

    return view('AllCourses' , compact('course_arr' , 'num_lecture' , 'uploaded_by'));
});


Route::get('/updatecourse/{id}', 'CourseController@showUpdateForm');

Route::get('/showcourse', function () {
    return view('ShowCourse');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('Homepage');
Route::resource('user' , 'UserController');
Route::resource('course' , 'CourseController');
Route::resource('lecture' , 'LectureController');