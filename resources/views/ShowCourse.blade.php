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
    <div class="showCourseContainer">
      <div class="circle-tile">

        <div class="team-member">
          <img style="height: 100%; width: 100%; margin-top: -10px;" class="mx-auto rounded-circle" src="{{asset('').$uploader->profilePic}}" alt="">
          <a href=""  style="color: black; background-color: white; padding: 5px;">{{$uploader->name}}</a>
        </div>


        <div class="Gap3"></div>
      </div>
    </div>
    <div class="showCourseNameTag">
      <h1>{{$course->title}}</h1>
      <h3>
        @for($i = 0 ; $i < sizeof($tag_arr) ; $i++)
          @if($i > 0)
            ,&nbsp
          @endif
          {{$tag_arr[$i]->name}}
        @endfor
      </h3>
      <div class="Gap2"></div>
      @for($i=0; $i<$course->rating; $i++)
      <img src="{{asset('img/starIcon.png')}}" class="shownStar">
      @endfor
    </div>
  </div>
</div>

<div class="container">

 <div class="rateDiv">
        <div class="ratingStars">
            <form id="ratingsForm">
                <div class="stars">
                    <input type="radio" name="star_1" class="star-1" id="star-1" />
                    <label class="star-1" for="star-1">1</label>
                    <input type="radio" name="star_2" class="star-2" id="star-2" />
                    <label class="star-2" for="star-2">2</label>
                    <input type="radio" name="star_3" class="star-3" id="star-3" />
                    <label class="star-3" for="star-3">3</label>
                    <input type="radio" name="star_4" class="star-4" id="star-4" />
                    <label class="star-4" for="star-4">4</label>
                    <input type="radio" name="star_5" class="star-5" id="star-5" />
                    <label class="star-5" for="star-5">5</label>
                    <span></span>
                </div>
            </form>
        </div>
    </div>


    @if(Auth::check())
<div class="addToFavDiv">
  <div class="fav_click">
    <fav_span class="fa fa-heart-o"></fav_span>
    <div class="fav_ring"></div>
    <div class="fav_ring2"></div>
    <p class="fav_info">Added to favourites!</p>
  </div>
</div>
    @endif


</div>


<div class="Gap3"></div>

<div class='container'>
  <div id='content' class='row'>
    <div class='span2 sidebar'>
      <ul class="nav nav-tabs nav-stacked">
        @for($i=0; $i<sizeof($lecture_arr); $i++)
        <li><a style="color: #33719e; font-weight: 400; cursor: pointer"  id="{{"LectNo".$i}}" onclick="changeMainDivContent({{$i}}, '{{sizeof($lecture_arr)}}');">Lecture {{$i+1}}</a></li>
        @endfor
      </ul>
    </div>
  </div>
</div>


<div class="Gap7"></div>

<div style="display: none;">{{$cnt=0}}</div>


<!-- 10 is the number of lectures -->
@for($k=0; $k<sizeof($lecture_arr); $k++)

@if($k==0)
<div id="{{"mainContent".$k}}">
@else
<div id="{{"mainContent".$k}}" style="display: none;">
@endif



<div class='span8 main container'>

<!-- Output from CKeditor -->

  {!! $lecture_arr[$k]->content !!}
<!-- End of output -->

</div>












<div class="container">
  <div class="commentSection">
    <div class="row">
      <div class="comments-container">


        <h1>Comments (152)</h1>
        <hr>


        <ul id="comments-list" class="comments-list">

          <!-- Comment Box-->   <!--Form Needed-->
          <li>
            <div class="comment-main-level">
              <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
              <div class="comment-box">
                <div class="comment-head">
                  <h6 class="comment-name"><a href="">Mridul</a></h6>
                  <span>Now</span>
                </div>
                <input style="width: 100%;margin-bottom: 5px; border:none;" type="text" placeholder="Join the conversation" class="comment-content">
              </div>
            </div>
          </li>
          <!-- End Comment Box -->

          <!-- 3 is the number of comments in this lecture -->
          @for($i=0; $i<3; $i++)

          <li>
            <div class="comment-main-level">
              <div class="comment-avatar"><img src="{{asset('img/pro_pic_icon.jpg')}}" alt=""></div>
              <div class="comment-box">
                <div class="comment-head">
                  <h6 class="comment-name by-author"><a href="">Arnab Sen Sharma</a></h6>
                  <span>2 days ago</span>
                  <i class="fa fa-reply" id="{{"replyButton".$cnt}}" onclick="openReplyBox({{$cnt}});"></i>
                </div>
                <div class="comment-content">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                </div>
              </div>
            </div>



            <!--Reply Box-->      <!--Form Needed-->
            <ul class="comments-list reply-list" id="{{"replyBox".$cnt}}" style="display: none">
                <li>
                  <div class="comment-avatar"><img src="{{asset('img/pro_pic_icon.jpg')}}" alt=""></div>
                  <div class="comment-box">
                    <div class="comment-head">
                      <h6 class="comment-name"><a href="">Lorena Rojero</a></h6>
                      <span>Now</span>
                    </div>

                      <input style="width: 100%;margin-bottom: 5px; border:none;" type="text" placeholder="Make a reply" class="comment-content">

                  </div>
                </li>
              </ul>

              <!-- End Reply Box -->

            <!-- 2 is the number of replies in this comment -->
            @for($j=0; $j<2; $j++)

            <ul class="comments-list reply-list">
              <li>
                <div class="comment-avatar"><img src="{{asset('img/pro_pic_icon.jpg')}}" alt=""></div>
                <div class="comment-box">
                  <div class="comment-head">
                    <h6 class="comment-name"><a href="">Mridul</a></h6>
                    <span>1 hour ago</span>
                    <i class="fa fa-reply" id="{{"replyButton".$cnt}}" onclick="openReplyBox({{$cnt}});"></i>
                  </div>
                  <div class="comment-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                  </div>
                </div>
              </li>
              </ul>
            @endfor


            </li>

            <div style="display: none;">{{$cnt=$cnt+1}}</div>

            @endfor

            </ul>


          </div>
        </div>
      </div>
    </div>



</div>
@endfor

<div class="Gap10"></div>

        <script type="text/javascript">



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".addToFavDiv").on('click' , function(e){
                console.log("Hit Fav Icon");
                e.preventDefault();
                var user_id = -1;
                    @if (Auth::check())
                {
                    user_id = "{{ Auth::user()->id }}";
                }
                        @endif
                var target_id = {!! json_encode($id) !!};
                var data = {user_id:user_id, target_id:target_id};
                var pre = {!! json_encode(url('/')) !!};
                var url = pre+'/api/addToFav';
                console.log(url , data);
                $.ajax({
                    type:'POST',
                    url:url,
                    data:data,
                    success:function(data){
                        console.log("Success" , data);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            @if($fav == 1)

                $('.fav_click').addClass('fav_active');
            $('.fav_click').addClass('fav_active-2');
            setTimeout(function() {
                $('.fav_click fav_span').addClass('fa-heart');
                $('.fav_click fav_span').removeClass('fa-heart-o')
            }, 150);
            setTimeout(function() {
                $('.fav_click').addClass('fav_active-3')
            }, 150);

            @endif

                $('.fav_click').click(function() {
                if ($('fav_span').hasClass("fa-heart")) {
                    $('.fav_click').removeClass('fav_active');
                    setTimeout(function() {
                        $('.fav_click').removeClass('fav_active-2')
                    }, 30);
                    $('.fav_click').removeClass('fav_active-3');
                    setTimeout(function() {
                        $('fav_span').removeClass('fa-heart');
                        $('fav_span').addClass('fa-heart-o')
                    }, 15)
                } else {
                    $('.fav_click').addClass('fav_active');
                    $('.fav_click').addClass('fav_active-2');
                    setTimeout(function() {
                        $('fav_span').addClass('fa-heart');
                        $('fav_span').removeClass('fa-heart-o')
                    }, 150);
                    setTimeout(function() {
                        $('.fav_click').addClass('fav_active-3')
                    }, 150);
                    $('.fav_info').addClass('fav_info-tog');
                    setTimeout(function() {
                        $('.fav_info').removeClass('fav_info-tog')
                    }, 1000)
                }
            });


        </script>

@endsection
