
$(function () {
  'use strict';

  var final_payment = 0;
  var paypal_loaded = false;
  var final_total = quantity * unit_price;
  var wallet_discount = 0;
          
  $(document).ready(function(){      
      loadFinalTotal();
//      loadPaypal();
      bindEvents();

      //paypal.Marks().render("#paypal-marks-container");
  });

  var loadFinalTotal = () => {
      var wallet_checkbox = $("#wallet_checkbox");
      if($("#wallet_checkbox").length > 0 && $("#wallet_checkbox").is(":checked")){
          wallet_discount = (Number(wallet_credit) >= Number(final_total)) ? final_total : wallet_credit; 
      } else {
          wallet_discount = 0; 
      }
      final_payment = final_total - wallet_discount
      $("#final_payment").html(final_payment);
      $("#wallet_discount").html("- $"+wallet_discount);
      loadPaypalDiv();
  } 

  var loadPaypalDiv = () => {
      if(final_payment > 0){
  //        $("#paypal-area").show();
          if(!paypal_loaded){
              loadPaypal();  
          }            

      } else {

          $("#paypal-area").hide();
      }
  }

  var loadPaypal = () => {

      
    
    paypal.Buttons({
        style: {
          layout: 'vertical',
          color:  'blue',
          shape:  'rect',
          label:  'paypal'
        },
        onInit: function(data, actions)  {
          paypal_loaded = true;          
        },
        createOrder: function(data, actions) {
            // Set up the transaction
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: final_payment
                }          
              }]
            });
         },
         onApprove: function(data, actions) {
            submitOrder('paypal',data);
        },
        onCancel : function(data){

        },
        onError : function(err){
            console.log("error");
            console.log(err);
        }


      }).render('#paypal-button-container');
  
  }

  var submitOrder = ( payment_mode, data = '') => {

     var sw =  Swal.fire({
          title: '',
          html: 'Please wait...',
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          
        })

      const form = document.getElementById('order_place_form');
      var formData = new FormData(form);
      if(data != ''){
        formData.append('transaction_data',JSON.stringify(data));        
      }

      formData.append('total_amount',final_total);
      formData.append('wallet_amount',wallet_discount);
      formData.append('paypal_amount',final_payment);
      formData.append('payment_mode',payment_mode);

      
      $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: formData,            
                processData: false,
                contentType: false,
                cache : false,

                success: function(data) {
                    sw.close();
                    if(data.success == '0') {
                        if(data.message != undefined && data.message != '') {
                              Swal.fire({
                                        icon: 'error',
                                        title: '',
                                        confirmButtonColor: '#33b5f7',
                                        text: data.message,
                                      })
                        }
                    } else if(data.success == '1') {

                        if(data.message != undefined && data.message != '') {
                              Swal.fire({
                                        icon: 'success',
                                        title: '',
                                        confirmButtonColor: '#33b5f7',
                                        text: data.message,
                                      }).then((result) => {
                                          if (result.isConfirmed) {
                                              window.location.href = data.redirect_url;
                                          } 
                                        })
                        }
                    } 
                },
                error : function() {
                  sw.close();
                }
            });
  }

  var bindEvents = function(){  

      $("#wallet_checkbox").on("change", function(){
          loadFinalTotal();
      });       
      
      $("#btn_pay").on("click", function(e){
         // e.preventdefault();

          if(final_payment > 0) {
              $("#paypal-area").show(500);
          }

          if(final_payment == 0) {
              submitOrder('wallet');
          }
      })
  }

  

});


