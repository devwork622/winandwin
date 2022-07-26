@extends('FrontEnd.layout.layout')
@section('title', 'Home')
@section('content')
 <section class="slider-container">
      <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url('Slider/Banner4.jpeg') }}" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="{{ url('Slider/Banner3.jpeg') }}" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="{{ url('Slider/Banner2.jpeg') }}" alt="New York">
    </div>
	<div class="carousel-item">
      <img src="{{ url('Slider/Banner1.jpeg') }}" alt="New York">
    </div>
  </div>

  

</div>
      
 </section>
    <!-- banner-section end -->

    <!-- lottery-timer-section start -->
    <section class="lottery-timer-section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-xl-4">
            <div class="timer-content">
              <h3 class="title">Next Draw</h3>
              @if(!empty($draw_date))
              <h4>{{date('l, jS F h:i A',strtotime($draw_date))}} UAE Time</h4>
              @php
                $d = date('d',strtotime($draw_date));
                $m = date('m',strtotime($draw_date));
                $y = date('Y',strtotime($draw_date));
              @endphp
              @endif

              <p>Sales close at 8:30PM UAE Time</p>
            </div>
          </div>
          <div class="col-xl-6 text-center">
            <div class="timer-part">
              <div class="clock"></div>
            </div>
          </div>
          <div class="col-xl-2" style='display: table;'>
            <div class="link-area text-center" style='display: table-cell;vertical-align: middle;'>
              <a href="#0" class="border-btn">BUY NOW </a>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- lottery-timer-section end -->

    <!-- jackpot-section start -->
    
    <!-- jackpot-section start -->

    <!-- lottery-result-section start -->
    
    <!-- choose-us-section end -->

    <!-- work-steps-section strat -->
    <section class="work-steps-section section-padding border-top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="section-header text-center">
              <h2 class="section-title">how it works</h2>
              <p>Sorteo is the best way to play these exciting lotteries from anywhere in the world.</p>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="work-steps-items-part d-flex">
              <div class="line"><img src="assets/images/elements/line.png" alt="line-image"></div>
              <div class="work-steps-item">
                <div class="work-steps-item-inner">
                  <div class="icon"><img src="assets/images/svg-icons/how-work-icons/1.svg" alt="icon">
                    <span class="count-num">01</span></div>
                  <h4 class="title">choose</h4>
                  <p>Purchase with us & Pick you number</p>
                </div>
              </div><!-- work-steps-item end -->
              <div class="work-steps-item">
                <div class="work-steps-item-inner">
                  <div class="icon"><img src="assets/images/svg-icons/how-work-icons/2.svg" alt="icon">
                    <span class="count-num">02</span></div>
                  <h4 class="title">buy</h4>
                  <p>Complete your purchase</p>
                </div>
              </div><!-- work-steps-item end -->
              <div class="work-steps-item">
                <div class="work-steps-item-inner">
                  <div class="icon"><img src="assets/images/svg-icons/how-work-icons/3.svg" alt="icon">
                    <span class="count-num">03</span></div>
                  <h4 class="title">win</h4>
                  <p>Start dreaming, you're almost there</p>
                </div>
              </div><!-- work-steps-item end -->
            </div>
          </div>
          <div class="col-lg-6">
            <div class="work-steps-thumb-part">
              <img src="assets/images/elements/step_new.png" alt="work-step-image">
              <a href="https://www.youtube.com/embed/aFYlAzQHnY4" data-rel="lightcase:myCollection" class="play-btn"><i
                  class="fa fa-play"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
	
	
	<section class="team-section section-padding section-bg border-top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-header text-center">
              <h2 class="section-title">Winners</h2>
              <p>You are one step away from a better tomorrow.</p>
            </div>
          </div>
        </div>
        <div>
		<div class='owl-carousel owl-theme brands_slider'>
		@php 
		 $array = [
		            ['33949CDB-AFF0-4A78-A369-AA60581EDB25.png','nickname'],
					['3C51F9C5-1802-4ABA-97AE-8B56B4D00C45.png','nickname'],
					['54BF7D2A-0B0D-4C5D-842D-2742A66ADE35.png','nickname'],
					['631AD186-BE0A-4F43-B6D7-5CB59436C240.png','nickname'],
					['8A61BC1F-D86C-4E5F-B1AF-C613D9C0719C.png','nickname'],
					['C0FE1907-EE6D-4662-9CA0-5853F62A8177.png','nickname'],
					['ED278402-59A6-42D5-8C3B-D7BC0A2E0D48.png','nickname'],
				  ];
		@endphp
		@foreach($array as $row)
          <div class="">
		   <div class='owl-item'>
            <div class="team-single text-center">
              <div class="thumb">
                <img src="{{ url('assets/images/winner/1.jpg') }}" alt="team-image">
              </div>
              <div class="content">
                <h3 class="name">{{ $row[1] }}</h3>
              </div>
            </div>
           </div>
          </div>
		 @endforeach
         </div>
		 <div class='row'>
		   <div class="brands_nav brands_prev"><i class="fa fa-chevron-left"></i></div>
           <div class="brands_nav brands_next"><i class="fa fa-chevron-right"></i></div>
		 </div>
        </div>
      </div>
    </section>
    
@stop
@push('css')
<style>
.carousel-item img{
	width:100%
}
.carousel-indicators li{
	width: 15px;
    height: 15px;
	border-radius: 50%;
}
.carousel-indicators .active{
	background-color:#33b5f7;
}
/*.carousel-indicators{
	margin: 0px;
	justify-content: right;
	top: 40%;
	display: block;
	left: unset;
	right:10px;
}
*/
.owl-item{
	max-width:100%;
}
.brands_nav {
    background-color: #33b5f7;
    color: #fff;
    padding: 5px 10px;
    margin: 0px 5px;
    border-radius: 5px;
	cursor:pointer;
}
.owl-carousel .owl-stage-outer{
	
}
.owl-item .thumb{
  padding:8px;	
}
@media screen and (min-width: 768px){
	/*.carousel-indicators{
	margin: 0px;
	justify-content: right;
	top: 40%;
	display: block;
	left: unset;
	right:10px;*/
}
</style>
@endpush
@push('js')
<script>

  var currentDate = new Date();
  var futureDate = new Date('{{$y}}', '{{$m - 1}}', '{{$d}}', 0, 0, 0);
  var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
    var clock = $('.clock').FlipClock(diff, {
      clockFace: 'DailyCounter',
      countdown: true
    });
 


var owl = $('.owl-carousel');
owl.owlCarousel({
    loop:true,
	dots:false,
    nav:false,
    margin:10,
	items: 4,
	responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        }
    }
});
owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
});

          if($('.brands_prev').length)
            {
                var prev = $('.brands_prev');
                prev.on('click', function()
                {
                    owl.trigger('prev.owl.carousel');
                });
            }

            if($('.brands_next').length)
            {
                var next = $('.brands_next');
                next.on('click', function()
                {
                    owl.trigger('next.owl.carousel');
                });
            }

var register_message = "{{session()->get('register_message')}}";
if(register_message != undefined && register_message != '') {
   Swal.fire({
            icon: 'success',
            title: '',
            confirmButtonColor: '#33b5f7',
            text: register_message,
          })
}
</script>
@endpush