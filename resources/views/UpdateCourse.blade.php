@extends('MasterLayout1')
@section('content')

<header class="masthead">
  <div class="container">
    <div class="intro-text">
      <div class="intro-heading">Update</div>
    </div>
  </div>
</header>

<div class="Gap10"></div>

<div class="container" id="detailDiv">
<div class="courseContainer">
<div class="circle-tile">
  <a href="#"><div class="circle-tile-heading green"><i class="fa fa-book fa-fw fa-3x"></i></div></a>
  <div class="Gap3"></div>
</div>
</div>
<div class="courseNameTag">
  <h1>{{$course->title}}</h1>
  <h3>
    @for($i = 0 ; $i < sizeof($tag_arr) ; $i++)
      @if($i > 0)
        ,&nbsp
      @endif
      {{$tag_arr[$i]->name}}
    @endfor
  </h3>
  <img src="{{asset('img/editIcon.png')}}" class="editIcon" id="editButton">
</div>
</div>


<div class="container" id="editDiv" style="display: none">
    {!! Form::open(
       array(
            'method'=>'PUT',
            'route'=>['course.update' , Request::segment(2)],
            'class' => 'form',
            'novalidate' => 'novalidate',
            'files' => true))
   !!}
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Course Title</label>
  <div class="col-10">
    <input class="form-control" type="text" value="{{$course->title}}" id="courseTitle" name="courseTitle">
  </div>
</div>

<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Tag (s)</label>
  <div class="col-10">
    <input class="form-control" type="text" value="{{$tag_text}}" id="tags" name="tags">
  </div>
</div>

 <button type="submit" style="margin-left: 46%; background-color: #2866b3" class="btn btn-primary">Done</button>
    {!! Form::close() !!}
 </div>


<div class="container" id="lectDiv">
@foreach($lecture_arr as $lecture)
<div class="lectNumber">
  <button type="button" class="btn btn-default btn_num-circle btn_num-lg">{{$lecture->serial}}</button>
</div>
<div class="lecturesDiv">
  <h1>{{$lecture->title}}</h1>
   <img src="{{asset('img/edit_icon_2.png')}}" class="editIcon2" id="editButton2">
</div>
@endforeach
</div>

<div class="container" id="ckeditorDiv" style="display: none;">
  <div class="Gap10"></div>
  <div class="ckeditor_Div">
    {!! Form::open(
           array(
               'method'=>'POST',
               'route' => 'lecture.store',
               'class' => 'form',
               'novalidate' => 'novalidate',
               'files' => true))
   !!}

      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Lecture No.</label>
        <div class="col-10">
          <input class="form-control" type="text" value="" id="lectNum" name="lectNum">
        </div>
      </div>

      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Lecture Title</label>
        <div class="col-10">
          <input class="form-control" type="text" value="" id="lectTitle" name="lectTitle">
        </div>
      </div>

      <textarea name="ck_editor" id="ck_editor" rows="10" cols="80">
      </textarea>

      <div class="Gap7"></div>

      <button type="submit" style="margin-left: 46%;" class="btn btn-success" id="addButton">Add</button>
      <input type="text" name="course_id" value="{{$course->_id}}" style="display: none">
    {!! Form::close() !!}
  </div>
</div>

 <div class="container">
   <div class="addLectButton" id="addLectureButton">
     <h1>Add Lecture</h1>
   </div>
 </div>

<div class="Gap10"></div>

@endsection
