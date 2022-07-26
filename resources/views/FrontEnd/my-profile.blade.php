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
                      <li class="breadcrumb-item active">MY PROFILE</li>
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

            <form id="profile_update_form" method="POST" action="{{ route('update-profie') }}" class='registration-form cmn-frm' style='margin-top:20px'>
               @csrf
               <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}" />
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group position-relative">
                        <label for="">FIRST NAME:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <input type="text" name="first_name" class="form-control" placeholder="" id="first_name" value="{{$user->first_name}}">
                     </div>                     
                  </div>
                  <div class="col-md-6">
                     <div class="form-group position-relative">
                        <label for="">LAST NAME:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <input type="text" name="last_name" class="form-control" placeholder="" id="last_name" value="{{$user->last_name}}">
                     </div>                     
                  </div>
               </div>
               
               <div class='row'>                  
                  <div class='col-md-12 '>
                     <div class="form-group position-relative">
				         <label for="">MOBILE PHONE NUMBER:</label>
				         <span class="span-fa"><i class="fa fa-phone"></i></span>
                     <input type="text"  class="form-control" name="mobile" placeholder="" id="mobile" value="{{$user->mobile}}">
                     </div>
                  </div>
               </div>
               <div class='row' >
                  <div class='col-md-12'>
                     <div class="form-group position-relative">
                        <label for="" style="margin-top: 5px;">EMAIL ADDRESS:</label>
                        <span class="span-fa"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="" name="email" id="email" value="{{$user->email}}" readonly >
                     </div>
                  </div>                  
               </div>
               <div class='row'>                  
                  <div class='col-md-12 '>
                     <div class="form-group position-relative">
                     <label for="">PAYPAL EMAIL ADDRESS:</label>
                     <span class="span-fa"><i class="fa fa-envelope"></i></span>
                     <input type="text"  class="form-control" name="paypal_email" placeholder="" id="paypal_email" value="{{$user->paypal_email}}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class='col-md-6'>
                     <div class="form-group position-relative">
                        <label for="" style="margin-top: 5px;">GENDER:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <select class="form-control" style="" id="gender" name="gender">
                              <option value="">-- SELECT --</option>
                              <option value="Male" @if($user->gender=='Male') selected @endif>Male</option>
                              <option value="Female" @if($user->gender=='Female') selected @endif>Female</option>
                        </select>
                     </div>
                  </div>
                  <div class='col-md-6'>
                     <div class="form-group position-relative">
                        <label for="" >BIRTH DATE:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control"  value="{{(!empty($user->date_of_birth))?date('d/m/Y', strtotime($user->date_of_birth)):''}}" name="date_of_birth" placeholder="" id="date_of_birth">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class='col-md-6'>
                     <div class="form-group position-relative">
                        <label for="" style="margin-top: 5px;">NATIONALITY:</label>
                        <span class="span-fa"><i class="fa fa-globe"></i></span>
                        <select class="form-control select" style="" id="nationality_id" name="nationality_id">
                              <option value="">-- SELECT --</option>
                              @foreach($nationalities as $nationality)
                              <option value="{{$nationality->id}}" @if($user->nationality_id==$nationality->id) selected @endif >{{$nationality->name}}</option>
                              @endforeach                              
                        </select>
                     </div>
                  </div>
                  <div class='col-md-6'>
                     <div class="form-group position-relative">
                        <label for="" >COUNTRY:</label>
                        <span class="span-fa"><i class="fa fa-globe"></i></span>
                        <select class="form-control" style="" id="country_id" name="country_id">
                              <option value="">-- SELECT --</option>
                              @foreach($countries as $country)
                              <option value="{{$country->iCountryId}}" @if($user->country_id==$country->iCountryId) selected @endif>{{$country->vCountry}}</option>
                              @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class='frm-group'>
                  <button id="profile_submit" class="btn verify_btn">SUBMIT</button>
               </div>
            </form>
			      
            <hr/>
            <form id="change_password_form" method="POST" action="{{ route('change-password') }}" class='registration-form cmn-frm' style='margin-top:20px'>
               @csrf
               <div class="row">
                  <div class="col-md-12">
                     <label class="add-creadit-header" for="">Change Password</label>                                              
                  </div>
                  <div class="col-md-12">
                     <div class="form-group position-relative">
                        <label for="">OLD PASSWORD:</label>
                        <span class="span-fa"><i class="fa fa-lock"></i></span>
                        <input type="password" name="old_password" class="form-control" placeholder="" id="old_password" value="">
                     </div>                     
                  </div>
                  <div class="col-md-12">
                     <div class="form-group position-relative">
                        <label for="">NEW PASSWORD:</label>
                        <span class="span-fa"><i class="fa fa-lock"></i></span>
                        <input type="password" name="new_password" class="form-control" placeholder="" id="new_password" value="">
                     </div>                     
                  </div>
                  <div class="col-md-12">
                     <div class="form-group position-relative">
                        <label for="">CONFIRM NEW PASSWORD:</label>
                        <span class="span-fa"><i class="fa fa-lock"></i></span>
                        <input type="password" name="new_confirm_password" class="form-control" placeholder="" id="new_confirm_password" value="">
                     </div>                     
                  </div>  
                  <div class="col-md-12">
                     <div class='frm-group'>
                        <button id="change_password_submit" class="btn verify_btn" >CHANGE PASSWORD</button>                        
                     </div>             
                  </div>
               </div>
               
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
   .cmn-frm .span-fa {
      top: 53px !important;
   }

</style>
@endpush
@push('js')
<script type="text/javascript">
   var REMOTE_CHECK_EMAIL =  "{{url('/check-email')}}";
   var REMOTE_CHECK_MOBILE = "{{url('/check-mobile-update')}}";
   var REMOTE_VERIFY_EMAIL_REQUEST = "{{route('verify-email-request')}}";
   var REMOTE_VERIFY_EMAIL = "{{route('verify-email')}}";
      
   var today = new Date();   
   $('#date_of_birth').datepicker({
       dateFormat : 'dd/mm/yy',
       maxDate : today ,
      changeMonth: true,
      changeYear: true
   });
</script>
<script src="{{ asset('/js/my-profile.js?t='.strtotime(now())) }}" ></script>
@endpush