@extends('FrontEnd.layout.layout')
@section('title', 'WEEKLY LIVE STREAM')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12"> 
          <div class="inner-page-banner-area">
            <h1 class="page-title">WEEKLY LIVE STREAM</h1>
            <nav aria-label="breadcrumb" class="page-header-breadcrumb">
              <ol class="breadcrumb" style='background:transparent !important;'>
                <li class="breadcrumb-item"><a href="home-one.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#0">pages</a></li>
                <li class="breadcrumb-item active">WEEKLY LIVE STREAM</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
 <div class="weekly-live-stream">
            <div class="row stream-title">
                <h1>WEEKLY LIVE STREAM</h1>
            </div>
            <div class="row pt-3">
                <div class="stream-place">
                    <div class="stream-place-items">
                        <h2 class="stream-place-item1">Live Draw</h2>
                        <h2 class="stream-place-item2">Every Sunday at 9 PM GST</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="stream-content py-5">
                        <h2 class="stream-content-header">THIS WEEK'S DRAW</h2>
                        <p class="pt-3">Every Sunday at 9 p.m., watch a live stream of our weekly draw. The Win & Win website, Facebook page, and YouTube channel will broadcast live coverage of our draws.
<br><br>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
@stop
@push('css')
<link href="{{ url('custom/draw.css') }}" rel="stylesheet">
        <link href="{{ url('custom/bootstrap.min.css') }}" rel="stylesheet">
<style>
@media screen and (max-width: 768px){
	.weekly-live-stream{
	    padding:20px;
	}
}
<style>
@endpush