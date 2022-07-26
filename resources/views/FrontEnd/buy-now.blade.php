@extends('FrontEnd.layout.layout')
@section('title', 'Buy Now')
@section('content')
<section class="inner-page-banner has_bg_image" data-background="assets/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-page-banner-area">
            <h1 class="page-title">CHOOSE YOUR NUMBER OF LINES</h1>
            <nav aria-label="breadcrumb" class="page-header-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home-one.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#0">pages</a></li>
                <li class="breadcrumb-item active">Buy Now</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="single-categories-play-section section-padding">
   <div class="container">
      
      <div class="row justify-content-center">
         @if(isset($_POST['quantity']))
			 <input type='hidden' form='checkoutForm' id='quantity' name='quantity' value='<?= $_REQUEST['quantity'] ?>'> 
         <div class="col-lg-12">
            <div class='single-cat-play-area'>
               <div class="single-header d-flex justify-content-between">
                  <div class="left d-flex" style='display: table !important;'>
                     <div class="icon" style='display: table-cell;vertical-align: middle;'>
                        <img src="{{ url('new_logo.png') }}" alt="">
                     </div>
                     <div class="content"  style='display: table-cell;vertical-align: middle;'>
                        <h4>WIN&WIN Powerball</h4>
                        <span class="amount">USD  {{ env('TICKET_AMOUNT')*$_REQUEST['quantity'] }}</span>
                     </div>
                  </div>
                  <div class="right text-right">
                     <span class="draw-days">draw in 3 days</span>
                     <div class="header-btn-area">
                        <button onclick='quickPickAll()' type="button" id="quick-pick-all">Quick Pick All</button>
                        <!--button type="button" id="add-item"><i class="fa fa-plus"></i></button>
                        <button type="button" id="delete-item"><i class="fa fa-trash"></i></button-->
                     </div>
                  </div>
               </div>
               <div class='single-body'>
                  <div class='single-body-inner d-flex'>
                     @for($i=1;$i<=$_POST['quantity'];$i++)
					 	 
                     <div class="play-card card{{ $i }}">
					    <button type="button" class="close-play-card" onclick="$('.card{{ $i }}').remove()"><i class="fa fa-times"></i></button>
                        <div class='play-card-inner text-center'>
                           <div class="play-card-header">
                              <span class="number-amount">Line {{ $i }}</span>
                              <div class="header-btn-area">
                                 <button type="button" onclick="selectRandomly({{ $i }})" id="quick-pick1">quick pick</button>
                                 <button type="button" id="clear-pick1" onclick="clearAll({{ $i }})">clear</button>
                              </div>
                           </div>
                           <div class="play-card-body">
                              @php $num = 1; @endphp
							  <ul class='number-list'>
                              @for($j=1;$j<=10;$j++)
                              
                                 @for($k=1;$k<=5;$k++)
                                 <li id="li{{ $i.$num }}" class='li{{ $i }}'>
                                    <label class='action_label' data-parent='{{ $i }}' data-attr='{{ $num }}' data-num='{{ $num }}'>{{ $num }}</label>
                                    <input type='checkbox'  id='radio{{ $i.$num }}' name='top{{ $i }}[]' value='{{ $num }}'>
                                 </li>
                                 @php $num++; @endphp
                                 @endfor
                              
                              @endfor
							  </ul>
                              <span class="add-more-text">All Selected</span>
                              @php $num = 1; @endphp
                              @for($j=1;$j<=2;$j++)
                              <ul class='number-list bottom_list'>
                                 @for($k=1;$k<=5;$k++)
                                 <li class='bottomli{{ $i }} bottomli{{ $i.$num }}'>
                                    <label for='bottomradio{{ $i.$num }}'>{{ $num }}</label>
                                    <input value='{{ $num }}' id='bottomradio{{ $i.$num }}' type='radio' name='bottom{{ $i }}' data-parent='{{ $i }}' data-attr='{{ $num }}' data-num='{{ $num }}'> 
                                 </li>
                                 @php $num++; @endphp
                                 @endfor
                              </ul>
                              @endfor
                           </div>
                           <div class="play-card-footer">
                              <p class="play-card-footer-text">Selected Numbers:</p>
                              <div class='selected-numbers selected_number{{ $i }}' ></div>
                              <input type="hidden" form="checkoutForm" id="selected_number{{ $i }}" name="selected_number{{ $i }}" value="" >
                           </div>
                        </div>
                     </div>
                     @endfor
                  </div>
               </div>
			   <div class="single-footer d-flex justify-content-between">
              <div class="left">
                <span>Winning Chances</span>
                <div class="progress">
                  <div class="progress-bar">50%</div>
                </div>
              </div>
              <div class="right d-flex justify-content-between">
                <div class="content">
                  <p>
                    <span>{{ $_REQUEST['quantity'] }} draw  ticket:</span>
                    <span class="amount">{{ $_REQUEST['quantity'] }} x $ {{ env('TICKET_AMOUNT') }}</span>
                  </p>
                  
                </div>
                <div class="card-cart-btn-area">
				{{ Form::open(array('url' => url('checkout'),'id'=>'checkoutForm')) }}

                  <button href="#" class="single-cart-btn">
                    <span class="single-cart-amount">$ {{ env('TICKET_AMOUNT')*$_REQUEST['quantity'] }}</span>
                    add to cart
                  </button>
				{{ Form::close() }}


                </div>
              </div>
            </div>
            </div>
         </div>
         @else
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class='row justify-content-center buy-container'>
               <div class='col-md-4'>
                  <img src="{{ url('pencil.png') }}" style='box-shadow: 26px 19px 46px 18px #00000059;border-radius: 30px;'>
               </div>

               <div class='col-md-4' style='display: table;'>
                  <div style='display: table-cell;vertical-align: middle;'>
                     <h3>Pen's for a brighter future</h3>
                     <h3 style='padding: 20px 0px;'>USD {{env('TICKET_AMOUNT')}}</h3>
                     <p  style='padding-bottom: 20px'>Buy a Pen to enter the Draw</p>
                     <h3>SELECT QUANTITY</h3>
                     {{ Form::open(array('url' => url('buy-now'))) }}
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <button class="btn button-buy-action"  onclick="calculateTotal('-')" type="button">-</button>
                        </div>
                        <input style='text-align: center;' id='total' name='quantity' readonly type="number" class="form-control" value='1'>
                        <div class="input-group-append">
                           <button class="btn button-buy-action" onclick="calculateTotal('+')" type="button">+</button>
                        </div>
                     </div>
                     <h3>TOTAL: <span class='total'>USD {{env('TICKET_AMOUNT')}}</span></h3>
                     <button style='width: 100%;' class="btn button-buy-action" type="submit">Next</button>
                     {{ Form::close() }}
                  </div>
               </div>
			   <!--div class='col-md-4 enter-code-container' style='display:table'>
			      <div class='enter_code_div'>
				     <img src='https://emiratesdraw.com/assets/img/hand_mobile.png'>
					 <p>IF YOU HAVE AN EMIRATES DRAW COUPON YOU CAN SCAN OR ENTER YOUR CODES HERE.</p>
					 <a href='#'>Enter Code</a>
				  </div>
			   </div-->
            </div>
         </div>
         
         @endif  
      </div>
   </div>
</section>
@stop
@push('css')
<style>
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
   -webkit-appearance: none;
   margin: 0;
   }
   /* Firefox */
   input[type=number] {
   -moz-appearance: textfield;
   }
   .button-buy-action{
   background-color: #33b5f7;
   color: #fff;
   }
   .card-header,.card strong{
   color: #33b5f7;
   }
   .card{
   text-align:center;
   }
   .total{
   color: #33b5f7;
   font-size:24px;
   }
   .card-body{
   text-align: center;
   }
   .number-list li:hover{
   background-color:#33b5f7;
   color:#fff;
   }
   .number-list li,.number-list li label{
   cursor: pointer;
   }
   .number-list li label{
   width: 100%;
   border-radius: 50%;
   }
   input[type=checkbox],input[type=radio]{
   display:none;
   }
   .selected-numbers{
	   color:#fff;
   }
   .enter_code_div{
	    background-color: #33b5f7;
		box-shadow: 26px 19px 46px 18px #00000059;
		border-radius: 30px;
		display: table;
		text-align: center;
   }
   .enter_code_div{
	   display: table-cell;
       vertical-align: middle;
   }
   .enter_code_div a{
	    background-color: #141b37;
		color: #fff;
		padding: 5px 15px;
		border-radius: 10px;
   }
   .enter_code_div p{
	    margin: 10px;
		font-weight: bold;
		color: #fff;
   }
   .buy-container{
	   text-align:center;
   }
   button[type=submit]{ 
	   line-height: 30px !important;
       font-size: 17px !important;
   }
   @media screen and (max-width: 768px){
	   .col-md-4{
		 margin-top:20px;  
	   }
	   .enter_code_div{
		   padding:40px 0px;
	   }
	   .enter-code-container{
		   margin-top: 46px;
	   }
   }
   .play-card-footer{
	   margin-top:20px;
	   
   }
   .play-card{
	   margin-bottom:20px;
   }
   .bottom_list li.active{
	   background-color:red !important;
	   color:#fff;
   }
   .bottom_list li:hover{
	   background-color:red !important;
	   color:#fff;
   }
</style>
@endpush
@push('js')
<script>
   function calculateTotal(type) {
    var total = Number($('#total').val());
    var ticket_amount = Number("{{env('TICKET_AMOUNT')}}");
    if (type == '+') {
        $('#total').val(total + 1);
    } else {
        if (total != 1) {
            $('#total').val(total - 1);
        }
    }
    $('.total').html("USD " + $('#total').val() * ticket_amount);
}
$('.action_label').click(function() {
	var parent = $(this).attr('data-parent');
    var child = $(this).attr('data-attr');
    var num = $(this).attr('data-num');
	var selected = $("input[name='top" + parent + "[]']:checked").map(function() {
        return $(this).val();
    }).get();
	
	if(selected.length<5||$("#radio"+parent+num).prop("checked")==true){
		console.log("length="+selected.length);
		console.log("#li"+parent+num);
		if($("#radio"+parent+num).prop("checked")==true){
			$("#li"+parent+num).removeClass('active');
			$("#radio"+parent+num).prop('checked', false);
		}else{
			$("#li"+parent+num).addClass('active');
			$("#radio"+parent+num).prop('checked', true);
		}
		var selected = $("input[name='top" + parent + "[]']:checked").map(function() {
			return $(this).val();
		}).get();
		/*******************************/
		
		calculateFinalNumer(parent);
    }
	console.log(selected);
	return false;
    /*******************************/
});

$('input[type=radio]').change(function() {
    var parent = $(this).attr('data-parent');
    var child = $(this).attr('data-attr');
    var num = $("input[name=bottom" + parent + "]:checked").val();
    $(".bottomli" + parent).removeClass('active');
    $(".bottomli" + parent + num).addClass('active');
    calculateFinalNumer(parent);
});

function selectRandomly(parent){
	clearAll(parent);
	var array = [];
	while(array.length < 5){
		var r = Math.floor(Math.random() * 50) + 1;
		if(array.indexOf(r) === -1) array.push(r);
	}
	for(var i = 0;i<=array.length;i++){
		$("#li"+parent+array[i]).addClass('active');
	    $("#radio"+parent+array[i]).prop('checked', true);
	}
	var radioRandom = Math.floor(Math.random() * 10) + 1;
	$(".bottomli"+parent+radioRandom).addClass('active');
	$("#bottomradio"+parent+radioRandom).prop("checked", true);
    calculateFinalNumer(parent);
}
function clearAll(parent){
	$(".li"+parent).removeClass('active');
	$(".bottomli"+parent).removeClass('active');
	$('.card'+parent+' input[type="checkbox"]').prop('checked',false);
	$("input[name=bottom" + parent + "]:checked").prop('checked',false);
	calculateFinalNumer(parent);
}
function calculateFinalNumer(parent){
	var selected = $("input[name='top" + parent + "[]']:checked").map(function() {
        return $(this).val();
    }).get();
	var radioValue = $("input[name=bottom" + parent + "]:checked").val();
	if(radioValue){
	  selected.push(radioValue);
	}
    $('.selected_number' + parent).html(selected.toString());
    $('#selected_number' + parent).val(selected.toString());
}
function quickPickAll(){
	var quantity = $("#quantity").val();
	for(var i=1;i<=quantity;i++){
		selectRandomly(i);
	}
}
</script>
@endpush