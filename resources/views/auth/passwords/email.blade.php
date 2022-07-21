@extends('FrontEnd.layout.layout')
@section('title', 'Forgot Password')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="{{url('assets/images/inner-page-bg.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="inner-page-banner-area">
               <h1 class="page-title">{{ __('Reset Password') }}</h1>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container" style='margin-top:20px;margin-bottom:20px' >
   <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="register_div">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             <form method="POST" id="forgotform" action="{{ route('password.email') }}" class="registration-form cmn-frm">
                        @csrf
               
               
               <div class='row'>
                  <div class='col-md-12'>
                     <div class="form-group position-relative">
                        <label for="">EMAIL ADDRESS:</label>
                        <span class="span-fa"><i class="fa fa-envelope"></i></span>
                     <input type="email" class="@error('email') is-invalid @enderror" placeholder="" name="email" value="{{ old('email')}}" id="email">
                        @error('email')
                                    <label class="error">{{ $message }}</label>
                        @enderror
                     </div>
                  </div>
                  
               </div>
               <div class='frm-group'>
                  <input type="submit" id="forgot_password_submit" class="btn verify_btn" value="{{ __('Send Password Reset Link') }}">
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
</style>
@endpush
@push('js')
<script src="{{ asset('/js/forgot_password.js') }}" ></script>
@endpush