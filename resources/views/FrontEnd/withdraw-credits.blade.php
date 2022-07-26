@extends('FrontEnd.layout.layout')
@section('title', 'Register')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="inner-page-banner-area">
               <h1 class="page-title">MY ACCOUNT</h1>
               <nav aria-label="breadcrumb" class="page-header-breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="home-one.html">HOME</a></li>
                      <li class="breadcrumb-item active">WITHDRAW CREDIT</li>
                    </ol>
               </nav>
              </div>
         </div>
      </div>
   </div>
</section>
<div class="container" style='margin-top:20px;margin-bottom:20px' >
   <div class="row justify-content-center register_div">
      <div class="col-lg-4 col-md-4 col-sm-12 left-menu">
         @include('FrontEnd.common.my-profile-menu')
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                    {{ session()->get('success') }}                    
                </div>
            @endif

            <form id="withdraw_credit_form" method="POST" action="{{route('withdraw-user-credit')}}" class='registration-form ' style='margin-top:20px'>
               @csrf               
               <div class="row">
                  <div class="col-md-12 text-right">
                     <label class="add-creadit-header" for="">Your Wallet : <span id="user_credit" class="add-creadit-header">{{$user->credit}}</span>$</label> 
                  </div>
                  <div class="col-md-8">
                     <div class="form-group position-relative">
                        <label class="add-creadit-header" for="">Withdraw Credit from Your Wallet</label>                      
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="credit" id="credit" placeholder="" value="{{env('MINIMUM_WITHDRAW')}}" aria-label="" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">USD</span>
                          </div>
                        </div>
                          <div id="amount-err" class="error amount-err" ></div>
                        <div><small>Minimum withdraw: {{env('MINIMUM_WITHDRAW')}} USD</small></div>
                      
                        
                        
                     </div>                     
                  </div>
                  
               </div>

               
               
               <div class='frm-group'>
                  <button id="withdraw_submit" class="btn verify_btn btn-pay" >WITHDRAW</button>                  
               </div>
               <div id="paypal-button-container" style="margin-top: 15px;"></div>
            </form>
			      
            
         </div>
      </div>
   </div>
</div>
@stop
@push('css')
<style>
   .register_div{
   box-shadow: 4px 4px 16px #0000004d;
   padding: 50px;
   border-radius: 30px;
   }
   .verify_btn{
   background: #33b5f7;
   width: 100%;
   border-radius: 30px;
   height: 50px;
   line-height:20px;
   color:#fff;
   }
   /*.cmn-frm input:not([type="submit"]) {
	   border: 1px solid #9d8b8b;
	   padding: 10px 15px 10px 10px;
   }*/
   .input-group input{
	   height: 45px;
	   width: 1% !important;
   }
   .input-group select{
	   border: 1px solid #9d8b8b;
	   border-radius: 10px 0px 0px 10px;
   }
   .form-control:focus{
	   box-shadow: none !important;
   }
   .error-2 {
      color: red !important;
      font-size: 12px;
      font-weight: 400 !important;
   }
   .amount-err {
      position: absolute;
      bottom: 20px;
   }

</style>
@endpush
@push('js')
<script type="text/javascript">
   var MINIMUM_PAY =  "{{env('MINIMUM_WITHDRAW')}}";   
</script>
<script src="{{ asset('/js/withdraw-credit.js?t='.strtotime(now())) }}" ></script>
<script type="text/javascript">
   
</script>
@endpush