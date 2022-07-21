@extends('FrontEnd.layout.layout')
@section('title', 'Lotteries')
@section('content')
 

  <!-- inner-page-banner start -->
  <section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-page-banner-area">
            <h1 class="page-title">All Lotteries</h1>
            <nav aria-label="breadcrumb" class="page-header-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home-one.html">Home</a></li>
                <li class="breadcrumb-item">result</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-page-banner end -->

  <!-- online-ticket-section start -->
  <section class="online-ticket-section section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-header text-center">
            <h2 class="section-title">Buy Lottery Tickets Online</h2>
            <p>Buy lottery tickets online to the biggest lotteries in the world offering huge jackpot prizes that you can win when you play online lottery. Purchase official lottery tickets to the draws listed below and receive automatic result notifications and commission-free prizes when you win!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="jackpot-item text-center">
            <img src="assets/images/elements/jackpot-1.png" alt="image">
            <span class="amount">€161,557,581</span>
            <h5 class="title">US Powerball</h5>
            <p class="next-draw-time">Next Draw : <span id="remainTime1"></span></p>
            <a href="#0" class="cmn-btn">play now!</a>
          </div>
        </div><!-- jackpot-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="jackpot-item text-center">
            <img src="assets/images/elements/jackpot-2.png" alt="image">
            <span class="amount">€161,557,581</span>
            <h5 class="title">Cancer Charity</h5>
            <p class="next-draw-time">Next Draw : <span id="remainTime2"></span></p>
            <a href="#0" class="cmn-btn">play now!</a>
          </div>
        </div><!-- jackpot-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="jackpot-item text-center">
            <img src="assets/images/elements/jackpot-3.png" alt="image">
            <span class="amount">€161,557,581</span>
            <h5 class="title">EuroJackpot</h5>
            <p class="next-draw-time">Next Draw : <span id="remainTime3"></span></p>
            <a href="#0" class="cmn-btn">play now!</a>
          </div>
        </div><!-- jackpot-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="jackpot-item text-center">
            <img src="assets/images/elements/jackpot-1.png" alt="image">
            <span class="amount">€161,557,581</span>
            <h5 class="title">US Powerball</h5>
            <p class="next-draw-time">Next Draw : <span id="remainTime4"></span></p>
            <a href="#0" class="cmn-btn">play now!</a>
          </div>
        </div><!-- jackpot-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="jackpot-item text-center">
            <img src="assets/images/elements/jackpot-2.png" alt="image">
            <span class="amount">€161,557,581</span>
            <h5 class="title">Cancer Charity</h5>
            <p class="next-draw-time">Next Draw : <span id="remainTime5"></span></p>
            <a href="#0" class="cmn-btn">play now!</a>
          </div>
        </div><!-- jackpot-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="jackpot-item text-center">
            <img src="assets/images/elements/jackpot-3.png" alt="image">
            <span class="amount">€161,557,581</span>
            <h5 class="title">EuroJackpot</h5>
            <p class="next-draw-time">Next Draw : <span id="remainTime6"></span></p>
            <a href="#0" class="cmn-btn">play now!</a>
          </div>
        </div><!-- jackpot-item end -->
        <div class="col-lg-12 text-center">
          <button type="button" class="cmn-btn">load more</button>
        </div>
      </div>
    </div>
  </section>
  <!-- online-ticket-section end -->

  <!-- question-section start -->
  <section class="question-section section-padding section-bg border-top">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4">
          <div class="thumb text-lg-right text-center">
            <img src="assets/images/elements/faq.png" alt="image">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="content">
            <h2 class="title">If you have any questions</h2>
            <p>Our top priorities are to protect your privacy, provide secure transactions, and safeguard your data. When you're ready to play, registering an account is required so we know you're of legal age and so no one else can use your account.We answer the most commonly asked lotto questions..</p>
            <a href="#0" class="cmn-btn">Check FAQs</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- question-section end -->

  <!-- brand-section start -->
  <div class="brand-section border-top border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="brand-slider">
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/1.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/2.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/3.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/4.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/5.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/3.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/4.png" alt="image">
              </div>
            </div><!-- single-slide end -->
            <div class="single-slide">
              <div class="slide-inner">
                <img src="assets/images/brand/5.png" alt="image">
              </div>
            </div><!-- single-slide end -->
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
