@extends('MasterLayout1')
@section('content')

<header class="masthead">
  <div class="container">
    <div class="intro-text">
      
    </div>
  </div>
</header>


<div class="Gap10"></div>


<div class="container">
  <div class="detailContainer">


     <div  class="addToFavIcon">
            <div class="click">
                <span class="fa fa-heart-o"></span>
                <div class="ring"></div>
                <div class="ring2"></div>
                <p class="info">Added to favourites!</p>
            </div>
        </div>
  


    <div class="showCourseContainer">
      <div class="circle-tile">
        <a href="#"><div class="circle-tile-heading green"><i class="fa fa-book fa-fw fa-3x"></i></div></a>
        <div class="Gap3"></div>
      </div>
    </div>
    <div class="showCourseNameTag">
      <h1>Introduction to HTML</h1>
      <h3>HTML, Web</h3>
      <div class="Gap2"></div>
      @for($i=0; $i<3; $i++)
      <img src="{{asset('img/starIcon.png')}}" class="shownStar">
      @endfor
    </div>
  </div>
</div>




<div class="Gap3"></div>

<div class='container'>
  <div id='content' class='row'>
    <div class='span2 sidebar'>
      <ul class="nav nav-tabs nav-stacked">
        @for($i=1; $i<11; $i++)
        <li><a style="color: #33719e; font-weight: 400; cursor: pointer"  id="LectNo">Lecture {{$i}}</a></li>
        @endfor
      </ul>
    </div>
  </div>
</div>

<div class="Gap7"></div>

<div class='span8 main container'>
  <h2>Main Content Section</h2>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.<p>
    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
  </div>

@endsection 