@extends('MasterLayout1')
@section('content')

<header class="masthead">
  <div class="container">
    <div class="intro-text">
      <div class="intro-heading">{{"All Courses (".sizeof($course_arr).")"}}</div>
    </div>
  </div>
</header>

<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
    </div>
    <div class="row">
      @for($j=0; $j<sizeof($course_arr); $j++)
      <div class="col-md-4">
        <div class="card user-card">
          
          <div class="card-block">
            
            <h6 class="f-w-600 m-t-25 m-b-10">{{$course_arr[$j]->title}}</h6>
            <p class="text-muted">{{"Instructor :".$uploaded_by[$j]->name}}</p>
            <hr>
            @for($i=0; $i<$course_arr[$j]->rating; $i++)
            <img src="{{asset('img/starIcon.png')}}" class="shownStar">
            @endfor
            
            <p class="m-t-15 lecturesText">{{$num_lecture[$j]." Lectures"}}</p>
            <hr>
            <div class="row justify-content-center user-social-link">
              
              <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading green"><i class="fa fa-arrow-right fa-fw fa-3x"></i></div></a>
                <div class="Gap3"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endfor
     
    </div>
    {{ $course_arr->links() }}
  </div>
</section>


@endsection