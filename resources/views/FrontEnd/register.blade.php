@extends('FrontEnd.layout.layout')
@section('title', 'Register')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="inner-page-banner-area">
               <h1 class="page-title">Create Account</h1>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container" style='margin-top:20px;margin-bottom:20px' >
   <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="register_div">
            <form id="registration_form" method="POST" action="{{ route('register') }}" class='registration-form cmn-frm' style='margin-top:20px'>
               @csrf
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group position-relative">
                        <label for="">FIRST NAME:</label>
                        <span class="span-fa top56"><i class="fa fa-user"></i></span>
                        <input type="text" name="first_name" class="" placeholder="" id="first_name">
                     </div>                     
                  </div>
                  <div class="col-md-6">
                     <div class="form-group position-relative">
                        <label for="">LAST NAME:</label>
                        <span class="span-fa top56"><i class="fa fa-user"></i></span>
                        <input type="text" name="last_name" class="" placeholder="" id="last_name">
                     </div>                     
                  </div>
               </div>
               
               <div class='row'>
                  
                  <div class='col-md-12 '>
                     <div class="form-group position-relative">
				     <label for="">MOBILE PHONE NUMBER:</label>
				     <!--div class='input-group'>
					  <div class='input-group-prepend'>
					   <select class='form-control' name="phone_code" id="phone_code" style='height: 45px;'>
                           <option>+971</option>
                           <option>+972</option>
                           <option>+973</option>
                        </select>
					   </div>
                       
					 </div-->
                     <span class="span-fa top56"><i class="fa fa-phone"></i></span>
                     <input type="text" style="height: 46px;" class="form-control" name="mobile" placeholder="" id="mobile">
                     </div>
                  </div>
                  <!--div class='col-md-4'>
                        <label for="">&nbsp;</label>
                        <button type='button' class='btn verify_btn'>Verify</button>
                     
                  </div-->
               </div>
               <div class='row' style="margin-top: 10px;">
                  <div class='col-md-8'>
                     <div class="form-group position-relative">
                        <label for="" style="margin-top: 5px;">EMAIL ADDRESS:</label>
                        <span class="span-fa top56"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="" placeholder="" name="email" id="email">

                     </div>
                  </div>
                  <div class='col-md-4'>
                     <div class="form-group">
                        <div class="verify-code-btn">
                           <label for="" class="" >&nbsp;</label>                        
                           <button type='button' id="email_verify_btn" class='btn verify_btn' >VERIFY</button>
                           <button id="email_verify_btn_loader" class="btn verify_btn" disabled style="display:none;" >VERIFY <i class="fa fa-spinner fa-spin"></i></button>                           
                        </div>
                        
                        <div class="verify-code" style="display: none;">
                           <div class="form-group position-relative">
                           <label for="" class="" >ENTER CODE:</label>
                           <span class="span-fa top56"><i class="fa fa-lock"></i></span>
                           <span class="span-fa-right"><i class="fa fa-level-down fa-rotate-90"></i></span>
                           <input type="text" class="form-control " style="height: 46px;padding-right: 40px;" name="verify_code" placeholder="" id="verify_code" >
                           <small>(Press enter to verify code)</small>
                           <label id="verify-code-error-lbl" class="error-2" for="verify_code"></label>
                           </div>
                        </div>

                        <div class="verified-code-btn" style="display: none;">
                           <label for="" class="" >&nbsp;</label>                        
                           <button type='button'  class='btn verify_btn '  >VERIFIED</button>   
                        </div>

                        
                        
                                                
                     </div>
                  </div>
               </div>
               <div class='row'>
                  <div class='col-md-12'>
                     <div class="form-group position-relative">
                        <label for="">Password:</label>
                        <span class="span-fa top56"><i class="fa fa-lock"></i></span>
                        <input type="password" class="" name="password" placeholder="" id="password" rel="gp" data-size="8" data-character-set="a-z,A-Z,0-9,#">
                     </div>
                  </div>
                  <!--div class='col-md-4'>
                     <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button type='button' class='btn verify_btn suggestpwd'>Suggest Password</button>
                     </div>
                  </div-->
               </div>
               <div class='frm-group'>
                  <input type="button" id="register_submit" class="btn verify_btn" value='REGISTER'>
               </div>
            </form>
			<br>
            <p style='font-size: 13px;color: #aba7a7;'>
               By clicking 'NEXT', I confirm that I have read, understood, and accepted the Terms and Conditions, Rules and Privacy Policy of Win & Win, including receiving mandatory and tailor-made communication such as invoices, receipts, entry numbers, notifications of winnings, and marketing collateral. I am aware I can opt-out of non-mandatory marketing related correspondence anytime.



            </p>
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
   .top56 { top:56px !important; }
</style>
@endpush
@push('js')
<script type="text/javascript">
   var REMOTE_CHECK_EMAIL =  "{{url('/check-email')}}";
   var REMOTE_CHECK_MOBILE = "{{url('/check-mobile')}}";
   var REMOTE_VERIFY_EMAIL_REQUEST = "{{route('verify-email-request')}}";
   var REMOTE_VERIFY_EMAIL = "{{route('verify-email')}}";
   
</script>
<script src="{{ asset('/js/register.js?t='.strtotime(now())) }}" ></script>
@endpush