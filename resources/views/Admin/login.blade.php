@extends('Admin.layout.layout')
@section('title', 'Admin Login')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="inner-page-banner-area">
               <h1 class="page-title">Login</h1>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container login-mid-container"  >
   <div class="row justify-content-center ">
      <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="login-registration-area">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                    {{ session()->get('message') }}                    
                </div>
            @endif
            <!--ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                     aria-controls="login" aria-selected="true">Log In With Email</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="registration-tab" data-toggle="tab" href="#registration" role="tab"
                     aria-controls="registration" aria-selected="false">Log In With Mobile Number</a>
               </li>
            </ul-->
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active " id="login" role="tabpanel" aria-labelledby="login-tab">
                  @if(session()->has('error'))
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                       @if(is_array(session()->get('error')))                           
                           @php $errors = session()->get('error'); @endphp
                           {!! implode('', $errors->all('<div>:message</div>')) !!}
                       @else
                           {{ session()->get('error') }}
                       @endif                                                                        
                      </div>
                  @endif                     
                  <div class="text-center login-header">
                     <h2>SIGN IN</h2>
                  </div>
                  <form id="login_email_form" class='registration-form cmn-frm' method="POST" action="{{ route('submit-admin-login') }}">
                     @csrf
                     <div class="form-group position-relative">
                        <!--label for="username ">Email :</label-->
                        <span class="span-fa-login"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="" placeholder="Email " id="email" value="{{ old('email') }}" name="email">
                        
                     </div>
                     <div class="form-group position-relative">
                        <!--label for="pwd">Password:</label-->
                        <span class="span-fa-login"><i class="fa fa-lock"></i></span>
                        <input type="password" class="" placeholder="Enter password" id="pwd" name="password">
                        
                     </div>
                     <p><a href="{{ route('password.request') }}">Forgot your password?</a></p>
                     <div class='frm-group'>
                        <input type="submit" id="btn_email_login" class="" value='Login'>
                     </div>
                  </form>
               </div>
               <!--div class="tab-pane fade" id="registration" role="tabpanel" aria-labelledby="registration-tab">
			         @if(session()->has('error'))
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                       @if(is_array(session()->get('error')))                           
                           @php $errors = session()->get('error'); @endphp
                           {!! implode('', $errors->all('<div>:message</div>')) !!}
                       @else
                           {{ session()->get('error') }}
                       @endif                                                                        
                      </div>
                  @endif
               <form id="login_mobile_form"  class='registration-form cmn-frm' method="POST" action="{{ route('submit-login') }}" >
				      @csrf  
                  <input type="hidden" name="from_mobile" value="1">
                  <div class='form-group '>
					     <label for="mobile ">Mobile Number :</label>
						 <small>Remove the leading 0 from the start of your mobile number</small>
					  </div>
				      <div class='row'>
					    <div class='col-md-4'>
						 <div class="form-group  ">
						  <select class='form-control' style='height: 46px;' id="phone_code" name="phone_code">
								<option value="+971" @if(old('phone_code') == '+971') selected @endif>+971</option>
								<option value="+972" @if(old('phone_code') == '+972') selected @endif >+972</option>
								<option value="+973" @if(old('phone_code') == '+973') selected @endif >+973</option>
						  </select>
						 </div>
						</div>
						<div class='col-md-8'>
						 <div class="form-group mb-0">
							  <input type="text" class="" placeholder="Mobile" id="mobile" name="mobile" value="{{ old('mobile') }}">
						 </div>
						</div>
                     </div>
                     <div class="form-group position-relative">
                        <label for="pwd">Password:</label>
                        <span class="span-fa"><i class="fa fa-lock"></i></span>
                        <input type="password" class="" placeholder="Enter password" id="pwd" name="password">                                                
                     </div>
                     <p><a href="{{ route('password.request') }}">Forgot your password?</a></p>
                     <div class='frm-group'>
                        <input id="btn_mobile_login" type="submit" class="" value='Login'>
                     </div>                  
                     <p><a href="{{ route('register-user') }}" >New user? Create an account now</a></p>
                  </form>
               </div-->
            </div>
         </div>
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