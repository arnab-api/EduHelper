<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Course;
use App\Tag;
use App\Lecture;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::check() == false) return redirect('/');
        $user_id = Auth::user()->_id;
        $user = User::find($user_id);
        if($user->role !== 'teacher'){
            echo 'you must be a teacher to upload a course';
        }
        else{
            return view('CreateCourse');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "Course store called".'<br>';
        echo $request->courseTitle."<br>";
        echo $request->tags."<br>";

        if(Auth::check() == false) return redirect('/');
        $user_id = Auth::user()->_id;
        $user = User::find($user_id);

        $course = new Course();
        $course->title = $request->courseTitle;
        $course->uploaded_by = $user_id;
        $course->description = ""; // request->courseDescription

        $course->save();
        if($request->tags !== null) {
            $tag_arr = explode(',', $request->tags);
            echo "HI" . " " . sizeof($tag_arr) . '<br>';
            for ($i = 0; $i < sizeof($tag_arr); $i++) {
                $tag_arr[$i] = trim($tag_arr[$i]);
                $tag_arr[$i] = strtoupper($tag_arr[$i]);
            }
            foreach ($tag_arr as $tag) {
                echo "--->" . $tag . "<----" . '<br>';
            }

            $tagArr = [];
            if (sizeof($tag_arr) != 0) {
                for ($i = 0; $i < sizeof($tag_arr); $i++) {
                    //echo "===============> ".$tag_arr[$i]." ".strlen($tag_arr[$i]).'<br>';
                    $exp = '/.*' . $tag_arr[$i] . '*/i';
                    $tag_match = Tag::where('name', 'regexp', $exp)->get();
                    $tag = null;
                    if (sizeof($tag_match) != 0) {
                        foreach ($tag_match as $tg) {
                            // echo "---> ".$tg->name." ".strlen($tg->name).'<br>';
                            if (strlen($tg->name) == strlen($tag_arr[$i])) {
                                $tag = $tg;
                                break;
                            }
                        }
                    }
                    if ($tag == null) {
                        $tag = new Tag();
                        $tag->name = $tag_arr[$i];
                        $tag->course_list = [];
                    }
                    $tag->course_list = array_prepend($tag->course_list, $course->_id);
                    $tag->save();
                    $tagArr = array_prepend($tagArr, $tag->_id);
                }
            }
            $tagArr = array_reverse($tagArr);
            $course->tag_arr = $tagArr;
        }

        $course->rating = 0.0;
        $course->save();


        echo "exit".'<br>';
        return redirect('/updatecourse/'.$course->_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function showUpdateForm($id){
        $course = Course::find($id);
        $tag_text = "";
        $tag_arr = [];
        $pre = "";
        foreach($course->tag_arr as $tag_id){
            $tag = Tag::find($tag_id);
            if($tag !== null){
                $tag_arr = array_prepend($tag_arr , $tag);
                $tag_text = $tag_text.$pre.$tag->name;
                $pre = ", ";
            }
        }
        $tag_arr = array_reverse($tag_arr);
        $lecture_arr = Lecture::where('target_course' , $id)->orderBy('serial')->get();
        return view('UpdateCourse' , compact('course' , 'tag_arr' , 'tag_text','lecture_arr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo "Course store called".'<br>';
        echo $request->courseTitle."<br>";
        echo $request->tags."<br>";

        if(Auth::check() == false) return redirect('/');

        $course = Course::find($id);
        $course->title = $request->courseTitle;
        $course->description = ""; // request->courseDescription

        foreach($course->tag_arr as $tag_id){
            $tag = Tag::find($tag_id);
            $arr = $tag->course_list;
            if (($key = array_search($id, $arr)) !== false) {
                unset($arr[$key]);
            }
            $tag->course_list = $arr;
            $tag->save();
        }

        if($request->tags !== null) {
            $tag_arr = explode(',', $request->tags);
            echo "HI" . " " . sizeof($tag_arr) . '<br>';
            for ($i = 0; $i < sizeof($tag_arr); $i++) {
                $tag_arr[$i] = trim($tag_arr[$i]);
                $tag_arr[$i] = strtoupper($tag_arr[$i]);
            }
            foreach ($tag_arr as $tag) {
                echo "--->" . $tag . "<----" . '<br>';
            }

            $tagArr = [];
            if (sizeof($tag_arr) != 0) {
                for ($i = 0; $i < sizeof($tag_arr); $i++) {
                    //echo "===============> ".$tag_arr[$i]." ".strlen($tag_arr[$i]).'<br>';
                    $exp = '/.*' . $tag_arr[$i] . '*/i';
                    $tag_match = Tag::where('name', 'regexp', $exp)->get();
                    $tag = null;
                    if (sizeof($tag_match) != 0) {
                        foreach ($tag_match as $tg) {
                            // echo "---> ".$tg->name." ".strlen($tg->name).'<br>';
                            if (strlen($tg->name) == strlen($tag_arr[$i])) {
                                $tag = $tg;
                                break;
                            }
                        }
                    }
                    if ($tag == null) {
                        $tag = new Tag();
                        $tag->name = $tag_arr[$i];
                        $tag->course_list = [];
                    }
                    $tag->course_list = array_prepend($tag->course_list, $course->_id);
                    $tag->save();
                    $tagArr = array_prepend($tagArr, $tag->_id);
                }
            }
            $tagArr = array_reverse($tagArr);
            $course->tag_arr = $tagArr;
        }

        $course->save();


        echo "updated".'<br>';
        return redirect('/updatecourse/'.$course->_id);
    }

    public function getSearchKey(Request $request)
    {
        $key = $request->key;
        return redirect('/searchResult/'.$key);
    }

    public function showSearchResult($key)
    {
        $exp = '/.*'.$key.'.*/i';
        $course_arr = Course::where('title' , 'regexp' , $exp)->orderBy('title')->paginate(1);
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

        return view('SearchResults' , compact('course_arr' , 'num_lecture' , 'uploaded_by'));
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
}
