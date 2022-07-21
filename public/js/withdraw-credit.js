
$(function () {
  'use strict';


  
  $(document).ready(function(){      

      bindEvents();

  });

  var bindEvents = function(){  

        $("#withdraw_credit_form").validate({
                rules: {
                    credit: {
                        required: true,
                        number: true,

                    },
                    
                },
                messages: {
                    credit: {
                      required: "Please enter credit.",
                    }
                },     
                errorPlacement: function (error, element) {
                        
                      if (element.attr("name") == "credit" ) {
                        $(".amount-err").html(error);
                        //error.insertAfter(".amount-err");
                      } else {
                        error.insertAfter(element);
                      }
                },       
        });

        $("#withdraw_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            var thisBtn = $(this);
            var buttonText = $(this).html();
            var loaderText = '<i class="fa fa-spinner fa-spin"></i> '+buttonText;

            if(!form.valid()){
                return false;
            }

            var sw =  Swal.fire({
                title: '',
                html: 'Please wait...',
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                  Swal.showLoading()
                },
                
              })


            var form = document.getElementById('withdraw_credit_form');
            var formData = new FormData(form);

            $(this).html(loaderText);
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: formData,                            
                processData: false,
                contentType: false,
                cache : false, 

                success: function(data) {
                    $(thisBtn).html(buttonText);
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
                        }
                        $("#user_credit").html(data.credit);
                    } 
                },
                error : function() {
                      sw.close();
                      $(thisBtn).html(buttonText);                    
                }
            });
            
        
        });

       
      
  }

  

});


