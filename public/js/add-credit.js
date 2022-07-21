
$(function () {
  'use strict';


  
  $(document).ready(function(){      

      loadPaypal();
      bindEvents();

  });

  var loadPaypal = () => {
    paypal.Buttons({
        style: {
          layout: 'vertical',
          color:  'blue',
          shape:  'rect',
          label:  'paypal'
        },
        onInit: function(data, actions)  {

          document.querySelector('#credit')
                .addEventListener('change', function(event) {

                  var cred_val = event.target.value;
                  console.log(cred_val);
                  console.log(isNaN(cred_val));
                  if(!isNaN(cred_val) && cred_val >= 1) {                      
                      actions.enable();
                      $("#amount-err").hide();
                  } else {
                       actions.disable();
                       $("#amount-err").show();
                  }   
                  
              });

        },
        createOrder: function(data, actions) {
            // Set up the transaction
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: $("#credit").val()
                }          
              }]
            });
         },
         onApprove: function(data, actions) {
            submitAddCredit(data);
        },
        onCancel : function(data){

        },
        onError : function(err){
            console.log("error");
            console.log(err);
        }


      }).render('#paypal-button-container');
  }

  var submitAddCredit = (data) => {
      console.log("submit")

     var sw =  Swal.fire({
          title: '',
          html: 'Please wait...',
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
          },
          
        })

      const form = document.getElementById('update_credit_form');
      var formData = new FormData(form);
      formData.append('transaction_data',JSON.stringify(data));
      
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
                                      })
                            $("#user_credit").html(data.credit);
                        }
                        resetPaymentForm();
                    } 
                },
                error : function() {
                  sw.close();
                }
            });
  }

  var bindEvents = function(){  

       
      
  }

  var resetPaymentForm = () => {
    $("#credit").val('50');
  }


});


