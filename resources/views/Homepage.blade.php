<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ADS Project</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
  <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{URL::asset('https://fonts.googleapis.com/css?family=Montserrat:400,700')}}" rel="stylesheet" type="text/css">
  <link href="{{URL::asset('https://fonts.googleapis.com/css?family=Kaushan+Script')}}" rel='stylesheet' type='text/css'>
  <link href="{{URL::asset('https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic')}}" rel='stylesheet' type='text/css'>
  <link href="{{URL::asset('https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700')}}" rel='stylesheet' type='text/css'>
  <link href="{{URL::asset('css/agency.min.css')}}" rel="stylesheet">



  <script src="{{asset('jquery/jquery.min.js')}}"></script>

</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="/">ADS Project</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">

        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="course/create">Create Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#portfolio">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#team">Instructors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{ route('login') }}" style="cursor: pointer">Login</a>
        </li>
        @else
          <li class="nav-item">
            <div class="login_div">


              <a  href="/user/{{Auth::user()->id}}"><img src="{{asset('img/pro_pic_icon.jpg')}}" class="profilePicRound"></a>
              <a  href="/user/{{Auth::user()->id}}">{{ Auth::user()->name }}</a>
              <a title="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('img/logout_icon.png')}}" class="logoutText"></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>

            </div>
          </li>
          @endguest
      </ul>
    </div>
  </div>
</nav>



<header class="masthead">
  <div class="container">
    <div class="intro-text">
      <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
      {!! Form::open(
        array(
        'method'=>'POST',
        'action' => 'CourseController@getSearchKey',
        'novalidate' => 'novalidate',
        'files' => true)) !!}
      <input class="search_box" type="search" id="key" name="key">
      {!! Form::close() !!}
      <div class="Gap4"></div>
      <div class="snippetContainer">
        <div class="col-lg-2 col-sm-6">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading green"><i class="fa fa-book fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content green">
              <div class="circle-tile-description text-faded">Courses</div>
              <div class="circle-tile-number text-faded ">265</div>
              <a class="circle-tile-footer" href="#"></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-6">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content dark-blue">
              <div class="circle-tile-description text-faded"> Users</div>
              <div class="circle-tile-number text-faded ">10</div>
              <a class="circle-tile-footer" href="#"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-sm-6">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading yellow"><i class="fa fa-male fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content yellow">
              <div class="circle-tile-description text-faded"> Instructors</div>
              <div class="circle-tile-number text-faded ">10</div>
              <a class="circle-tile-footer" href="#"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>


<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Popular Courses</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    <div class="row">
      @for($j=0; $j<6; $j++)
        <div class="col-md-4">
          <div class="card user-card">

            <div class="card-block">

              <h6 class="f-w-600 m-t-25 m-b-10">HTML</h6>
              <p class="text-muted">Istructor : ABCD</p>
              <hr>
              @for($i=0; $i<3; $i++)
                <img src="{{asset('img/starIcon.png')}}" class="shownStar">
              @endfor

              <p class="m-t-15 lecturesText">5 Lectures</p>
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
      <button class="loginSubmitButton" style="margin-left: 46%;" type="submit">See All</button>
    </div>
  </div>
</section>


<section class="bg-light" id="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Instructors</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
          <h4>Kay Garland</h4>
          <p class="text-muted">Lead Designer</p>
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
          <h4>Larry Parker</h4>
          <p class="text-muted">Lead Marketer</p>
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
          <h4>Diana Pertersen</h4>
          <p class="text-muted">Lead Developer</p>
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
      </div>
    </div>
  </div>
</section>


<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contact Us</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form id="contactForm" name="sentMessage" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" id="contact_name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="contact_email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="contact_phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" id="contact_message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <span class="copyright">Copyright &copy; Osprishyo</span>
      </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-linkedin"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-inline quicklinks">
          <li class="list-inline-item">
            <i class="fa fa-phone">&nbsp 01XXXXXXXXX</i>
          </li>
          <li class="list-inline-item">
            <i class="fa fa-envelope">&nbsp abc@gmail.com</i>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>


  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('js/contact_me.js')}}"></script>
  <script src="{{asset('js/agency.min.js')}}"></script>
  <script src = "{{asset('js/plugins/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">

  

  $("#addLectureButton").click(function(e) {
    $("#ckeditorDiv").delay(100).fadeIn(100, function() {
      $("html,body").animate({
        scrollTop: $("#ckeditorDiv").offset().top
      }, 500);
    });
    e.preventDefault();
  });

  $("#addLectCancel").click(function(e) {
    $("#ckeditorDiv").slideToggle();
    e.preventDefault();
  });

  $('#profileUpdateButton').click(function(e) {
    $("#updateUserProfileDiv").delay(100).fadeIn(100);
    $("#userProfileDiv").fadeOut(100);
    e.preventDefault();
  });

  $('#editButton').click(function(e) {
    $("#editDiv").delay(100).fadeIn(100);
    $("#detailDiv").fadeOut(100);
    e.preventDefault();
  });

 
  function openReplyBox(id) {
    $("#replyBox" + id).slideToggle();
  }

  function changeMainDivContent(id, tot) {
    for (i = 0; i < tot; i++) {
      $("#mainContent" + i).fadeOut(100);
      $("#LectNo" + i).css("background-color", "white");
      $("#LectNo" + i).css("margin-bottom", ".5px");
    }
    $("#mainContent" + id).delay(100).fadeIn(100);
    $("#LectNo" + id).css("background-color", "#ececec");
  }

  CKEDITOR.replace('ck_editor', {
    customConfig: 'config.js',
    toolbar: 'simple'
  });

</script>

</body>
</html>