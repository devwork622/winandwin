@extends('Admin.layout.layout')
@section('title', 'Admin Login')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="{{asset('assets/images/inner-page-bg.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="inner-page-banner-area">
               <h1 class="page-title">Users List</h1>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container login-mid-container"  >
   <div class="row justify-content-center ">
      <div class="col-lg-12 col-md-12 col-sm-12 text-right " style="margin: 10px;">
         <a href="{{route('admin-users-add')}}" class="btn btn-primary">Add User</a>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="login-registration-area">
           <div class="table-responsive">           
                 <table class="table">
                   <thead>
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Mobile</th>
                       <th scope="col">Credit</th>
                       <th scope="col">Birth Date</th>
                       <th scope="col">Gender</th>
                       <th scope="col">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach($users as $user)
                     <tr>
                       <th scope="row">{{$user->id}}</th>
                       <td>{{$user->first_name}} {{$user->last_name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->mobile}}</td>
                       <td>{{$user->credit}}</td>
                       <td>{{$user->date_of_birth}}</td>
                       <td>{{$user->gender}}</td>
                       <td>
                          <a href="">Edit</a>
                       </td>
                     </tr>
                     @endforeach
                     
                   </tbody>
                 </table>
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