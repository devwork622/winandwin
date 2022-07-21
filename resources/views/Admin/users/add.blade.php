@extends('Admin.layout.layout')
@section('title', 'Admin Login')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="{{asset('assets/images/inner-page-bg.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="inner-page-banner-area">
               <h1 class="page-title">Add Users</h1>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container login-mid-container"  >
   <div class="row justify-content-center ">
      <div class="col-lg-12 col-md-12 col-sm-12">
         <form>
            <div class="row">
                  <div class="col-md-6">
                     <div class="form-group position-relative">
                        <label for="">FIRST NAME:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <input type="text" name="first_name" class="form-control" placeholder="" id="first_name" value="">
                     </div>                     
                  </div>
                  <div class="col-md-6">
                     <div class="form-group position-relative">
                        <label for="">LAST NAME:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <input type="text" name="last_name" class="form-control" placeholder="" id="last_name" value="">
                     </div>                     
                  </div>
               </div>
               
               <div class='row'>                  
                  <div class='col-md-12 '>
                     <div class="form-group position-relative">
                     <label for="">MOBILE PHONE NUMBER:</label>
                     <span class="span-fa"><i class="fa fa-phone"></i></span>
                     <input type="text"  class="form-control" name="mobile" placeholder="" id="mobile" value="">
                     </div>
                  </div>
               </div>
               <div class='row' >
                  <div class='col-md-12'>
                     <div class="form-group position-relative">
                        <label for="" style="margin-top: 5px;">EMAIL ADDRESS:</label>
                        <span class="span-fa"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="" name="email" id="email" value=""  >
                     </div>
                  </div>                  
               </div>
               <div class='row'>                  
                  <div class='col-md-12 '>
                     <div class="form-group position-relative">
                     <label for="">PAYPAL EMAIL ADDRESS:</label>
                     <span class="span-fa"><i class="fa fa-envelope"></i></span>
                     <input type="text"  class="form-control" name="paypal_email" placeholder="" id="paypal_email" value="">
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
                              <option value="Male" >Male</option>
                              <option value="Female" >Female</option>
                        </select>
                     </div>
                  </div>
                  <div class='col-md-6'>
                     <div class="form-group position-relative">
                        <label for="" >BIRTH DATE:</label>
                        <span class="span-fa"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control"  value="" name="date_of_birth" placeholder="" id="date_of_birth">
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
                              <option value="{{$nationality->id}}"  >{{$nationality->name}}</option>
                              @endforeach                              
                        </select>
                     </div>
                  </div>
                  <div class='col-md-6'>
                     <div class="form-group position-relative">
                        <label for="" >Country:</label>
                        <span class="span-fa"><i class="fa fa-globe"></i></span>
                        <select class="form-control" style="" id="country_id" name="country_id">
                              <option value="">-- SELECT --</option>
                              @foreach($countries as $country)
                              <option value="{{$country->iCountryId}}" >{{$country->vCountry}}</option>
                              @endforeach
                        </select>
                     </div>
                  </div>
                  <div class='frm-group'>
                     <button id="profile_submit" class="btn verify_btn">SUBMIT</button>
                  </div>
         </form>         
      </div>
   </div>
</div>
@stop
@push('js')
<script type="text/javascript">
   var from_mobile = "{{ old('from_mobile') }}";
   if(from_mobile == '1'){
      $('.nav-tabs a[href="#registration"]').tab('show');
   }
</script>
<script src="{{ asset('/js/login.js') }}" ></script>
@endpush
@push('css')
<style type="text/css">
   .login-header h2{
      font-size: 40px;
      margin-bottom: 25px;
   }
</style>
@endpush