@extends('FrontEnd.layout.layout')
@section('title', 'Checkout')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-page-banner-area">
            <h1 class="page-title">PowerBall</h1>
            <nav aria-label="breadcrumb" class="page-header-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home-one.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#0">all lotteries</a></li>
                <li class="breadcrumb-item"><a href="#0">powerball</a></li>
                <li class="breadcrumb-item active">cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-page-banner end -->

  <!-- cart-section start -->
  <section class="cart-section section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cart-area d-flex">
            <div class="col-lg-8">
              <div class="cart-table">
                <table>
                  <thead>
                    <tr>
                      <th>quantity</th>
                      <th>cost</th>
                      <th>remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $_REQUEST['quantity'] }}</td>
                      <td>USD {{env('TICKET_AMOUNT')}}</td>
                      <td><i class="fa fa-trash"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <span class="pull-right mt-3">1 item</span>
            </div>
            <div class="col-lg-4">
              <div class="cart-summary-area" style="padding-bottom: 35px;">
                <h3 class="summary-area-title">Cart Summary</h3>
                
                <div class="total-amount">
                  <span class="title">total payment</span>
                  <span class="amount">${{$data['quantity']*env('TICKET_AMOUNT')}}</span>

                  @if($wallet_credit > 0)
                  <hr />
                  <div class="position-relative chk-wallet-div">
                     <label class="chk-container" for="wallet_checkbox"><span class="chk-text">Pay via Wallet</span>
                        <input type="checkbox" checked="checked" id="wallet_checkbox">
                        <span class="checkmark"></span>
                      </label>
                  </div>                  
                  <div class="cart-wallet-div">
                      <div class="row">
                          <div class="col-md-6 text-left"><label>Wallet</label></div>
                          <div class="col-md-6 text-right" ><label id="wallet_discount"></label></div>
                      </div>
                  </div>
                  @endif
                  
                    <button id="btn_pay" class="payment-btn">pay($<span id="final_payment"></span>)</button>
                  <form id="order_place_form"  method="POST" action="{{route('place-order')}}" >                                      
                    @csrf
                  </form>
                </div>
                 <div class="card-area" id="paypal-area" style="display: none;">
                  <div id="paypal-button-container" class="card-list">
                  </div>
                </div>
                <!--div class="card-area" style="margin-top:0px !important">
                  <div class="card-list" id="paypal-marks-container">                  
                  </div>
                </div-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- cart-section end -->

  <!-- jackpot-section start -->
  
@stop
@push('js')
<script type="text/javascript">
  const wallet_credit = "{{$wallet_credit}}";
  const quantity = "{{$data['quantity']}}";
  const unit_price = "{{env('TICKET_AMOUNT')}}";
</script>
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}&currency=USD&components=buttons,funding-eligibility"></script>
<script src="{{ asset('/js/cart.js?t='.strtotime(now())) }}" ></script>
@endpush