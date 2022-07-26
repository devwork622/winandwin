@extends('Admin.layout.layout')
@section('title', 'User Management')
@section('sub_title', 'Add User')
@section('content')
<div>
   <div class="row">
        <div class="col-12">
          <div class="container-fluid ">
            <div class="card">
               <div class="card-header pb-0 px-3">
                  <h6 class="mb-0">{{ __('Add New User') }}</h6>
               </div>
               <div class="card-body pt-4 p-3">
                  <form id="add_user_form" method="POST" action="{{ route('admin-users-store') }}" class='registration-form '  >
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group position-relative">
                              <label for="">FIRST NAME:</label>
                              <input type="text" name="first_name" class="form-control" placeholder="" id="first_name" value="">
                           </div>                     
                        </div>
                        <div class="col-md-6">
                           <div class="form-group position-relative">
                              <label for="">LAST NAME:</label>
                              <input type="text" name="last_name" class="form-control" placeholder="" id="last_name" value="">
                           </div>                     
                        </div>
                     </div>
                     
                     <div class='row'>                  
                        <div class='col-md-12 '>
                           <div class="form-group position-relative">
                           <label for="">MOBILE PHONE NUMBER:</label>
                           <input type="text"  class="form-control" name="mobile" placeholder="" id="mobile" value="">
                           </div>
                        </div>
                     </div>
                     <div class='row' >
                        <div class='col-md-12'>
                           <div class="form-group position-relative">
                              <label for="" style="margin-top: 5px;">EMAIL ADDRESS:</label>
                              <input type="email" class="form-control" placeholder="" name="email" id="email" value=""  >
                           </div>
                        </div>                  
                     </div>
                     <div class='row'>                  
                        <div class='col-md-12 '>
                           <div class="form-group position-relative">
                           <label for="">PAYPAL EMAIL ADDRESS:</label>
                           <input type="text"  class="form-control" name="paypal_email" placeholder="" id="paypal_email" value="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class='col-md-6'>
                           <div class="form-group position-relative">
                              <label for="" style="margin-top: 5px;">GENDER:</label>
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
                              <input type="text" class="form-control"  value="" name="date_of_birth" placeholder="" id="date_of_birth">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class='col-md-6'>
                           <div class="form-group position-relative">
                              <label for="" style="margin-top: 5px;">NATIONALITY:</label>
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
                              <label for="" >COUNTRY:</label>
                              <select class="form-control" style="" id="country_id" name="country_id">
                                    <option value="">-- SELECT --</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->iCountryId}}" >{{$country->vCountry}}</option>
                                    @endforeach
                              </select>
                           </div>
                        </div>
                     </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin-users')}}" class="btn btn-info btn-md mt-4 mb-4 " style="margin-right: 10px;">CANCEL</a>
                        <button id="add_user_submit" type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>                        
                    </div>
                  </form>
               </div>
            </div>
          </div>
        </div>
   </div>
</div>
@stop
@push('js')
<script type="text/javascript">
   var REMOTE_CHECK_EMAIL =  "{{url('/check-email-update')}}";
   var REMOTE_CHECK_MOBILE = "{{url('/check-mobile-update')}}";
   
</script>
<script src="{{ asset('/js/admin/user.js?t='.strtotime(now())) }}" ></script>
@endpush
@push('css')
<style type="text/css">
   .login-header h2{
      font-size: 40px;
      margin-bottom: 25px;
   }
</style>
@endpush