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
                      <td>AED 40.00</td>
                      <td><i class="fa fa-trash"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <span class="pull-right mt-3">1 item</span>
            </div>
            <div class="col-lg-4">
              <div class="cart-summary-area">
                <h3 class="summary-area-title">Cart Summary</h3>
                
                <div class="total-amount">
                  <span class="title">total payment</span>
                  <span class="amount"><?= $_REQUEST['quantity']*40 ?></span>
                  <button class="payment-btn">pay<span>(<?= $_REQUEST['quantity']*40 ?>)</span></button>
                </div>
                <div class="card-area">
                  <div class="card-list">
                    <a href="#0"><img src="assets/images/payment-methods/1.jpg" alt="image"></a>
                    <a href="#0"><img src="assets/images/payment-methods/2.jpg" alt="image"></a>
                    <a href="#0"><img src="assets/images/payment-methods/3.jpg" alt="image"></a>
                    <a href="#0"><img src="assets/images/payment-methods/4.jpg" alt="image"></a>
                    <a href="#0"><img src="assets/images/payment-methods/5.jpg" alt="image"></a>
                    <a href="#0"><img src="assets/images/payment-methods/6.jpg" alt="image"></a>
                  </div>
                </div>
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