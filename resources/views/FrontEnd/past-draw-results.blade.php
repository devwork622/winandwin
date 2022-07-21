@extends('FrontEnd.layout.layout')
@section('title', 'PAST DRAW RESULTS')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12"> 
          <div class="inner-page-banner-area">
            <h1 class="page-title">PAST DRAW RESULTS</h1>
            <nav aria-label="breadcrumb" class="page-header-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home-one.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#0">pages</a></li>
                <li class="breadcrumb-item active">PAST DRAW RESULTS</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
 <div class="results">
            <div class="row results-title">
                <h1>PAST DRAW RESULTS</h1>            
            </div>
            <div class="row results-body">
                <div class="col-xxl-4 col-xl-6 px-4 py-3">
                    <div class="results-items">
                        <div class="main-item">
                            <h2>MAIN DRAW RESULTS</h2>
                            <div class="jackpot-bar">
                                <span class="jackpot-number"> 4 </span>
                                <span class="jackpot-number"> 5 </span>
                                <span class="jackpot-number"> 8 </span>
                                <span class="jackpot-number"> 1 </span>
                                <span class="jackpot-number"> 3 </span>                                
                                <span class="jackpot-number"> 6 </span>                                
                            </div>
                        </div>
                        <div class="other-item">
                            <h3>13 June 2022</h3>
                            <div class="text--totals">
                                <h5>Total Winners: 394</h5>
                                <h5>Total Prizes: AED 189,311.33</h5>
                            </div>
                            <div class="result-btn">
                                <span>VIEW DETAILED RESULTS</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-6 px-4 py-3">
                    <div class="results-items">
                        <div class="main-item">
                            <h2>MAIN DRAW RESULTS</h2>
                            <div class="jackpot-bar">
                                <span class="jackpot-number"> 4 </span>
                                <span class="jackpot-number"> 5 </span>
                                <span class="jackpot-number"> 8 </span>
                                <span class="jackpot-number"> 1 </span>
                                <span class="jackpot-number"> 3 </span>                                
                                <span class="jackpot-number"> 6 </span>                                
                            </div>
                        </div>
                        <div class="other-item">
                            <h3>13 June 2022</h3>
                            <div class="text--totals">
                                <h5>Total Winners: 394</h5>
                                <h5>Total Prizes: AED 189,311.33</h5>
                            </div>
                            <div class="result-btn">
                                <span>VIEW DETAILED RESULTS</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-6 px-4 py-3">
                    <div class="results-items">
                        <div class="main-item">
                            <h2>MAIN DRAW RESULTS</h2>
                            <div class="jackpot-bar">
                                <span class="jackpot-number"> 4 </span>
                                <span class="jackpot-number"> 5 </span>
                                <span class="jackpot-number"> 8 </span>
                                <span class="jackpot-number"> 1 </span>
                                <span class="jackpot-number"> 3 </span>                                
                                <span class="jackpot-number"> 6 </span>                                
                            </div>
                        </div>
                        <div class="other-item">
                            <h3>13 June 2022</h3>
                            <div class="text--totals">
                                <h5>Total Winners: 394</h5>
                                <h5>Total Prizes: AED 189,311.33</h5>
                            </div>
                            <div class="result-btn">
                                <span>VIEW DETAILED RESULTS</span>
                            </div>
                        </div>
                    </div>
                </div>                                
            </div>
        </div>
@stop
@push('css')
<link href="{{ url('custom/draw.css') }}" rel="stylesheet">
<link href="{{ url('custom/bootstrap.min.css') }}" rel="stylesheet">
<style>
.jackpot-bar .jackpot-number:nth-child(6) {
    color: red;
}
.result-btn span{
	color:#fff;
}
@media screen and (max-width: 768px){
	.results-body{
	    padding:0px;
	}
}
</style>
@endpush