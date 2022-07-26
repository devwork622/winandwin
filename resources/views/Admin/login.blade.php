@extends('Admin.layout.layout')
@section('title', 'Admin Login')
@section('content')
<main class="main-content  mt-0">
   <section>
      <div class="page-header min-vh-75">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                  <div class="card card-plain mt-8">
                     <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                        <p class="mb-0">Login with admin credentials<br></p>
                        <!--p class="mb-0">OR Sign in with these credentials:</p>
                        <p class="mb-0">Email <b>admin@softui.com</b></p>
                        <p class="mb-0">Password <b>secret</b></p-->
                      </div>
                      <div class="card-body">
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissable" role="alert">
                              <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
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
                        <form id="login_email_form" class='registration-form cmn-frm' method="POST" action="{{ route('submit-admin-login') }}">
                             @csrf
                             <label>Email</label>
                             <div class="mb-3">
                               <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="" aria-label="Email" aria-describedby="email-addon">
                               @error('email')
                                 <p class="text-danger text-xs mt-2">{{ $message }}</p>
                               @enderror
                             </div>
                             <label>Password</label>
                             <div class="mb-3">
                               <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" aria-label="Password" aria-describedby="password-addon">
                               @error('password')
                                 <p class="text-danger text-xs mt-2">{{ $message }}</p>
                               @enderror
                             </div>                             
                             <div class="text-center">
                               <button type="submit" id="btn_email_login" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                             </div>
                        </form>
                     </div> 
                     <!--div class="card-footer text-center pt-0 px-lg-2 px-1">
                         <small class="text-muted">Forgot you password? Reset you password 
                           <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold">here</a>
                         </small>
                           <p class="mb-4 text-sm mx-auto">
                             Don't have an account?
                             <a href="register" class="text-info text-gradient font-weight-bold">Sign up</a>
                           </p>
                     </div-->                     
                  </div>
               </div>
               <div class="col-md-6">
                 <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                   <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{url('admin-assets/img/curved-images/curved6.jpg')}}')"></div>
                 </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

@stop
@push('js')
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