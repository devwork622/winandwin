
$(function () {
  'use strict';

  var email_verified = false;
  var email_for_verify = '';
  
  $(document).ready(function(){      


     var today = new Date();   
     $('#date_of_birth').datepicker({
         dateFormat : 'dd/mm/yy',
         maxDate : today ,
        changeMonth: true,
        changeYear: true
     });
      
      $.validator.addMethod(
        "verifyregisteremail", 
        function(value, element) {
            return email_verified;
        },
        "Please verify email."
      );

      bindEvents();

  });

  var bindEvents = function(){  

       $("#add_user_form").validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        number: true,
                        remote : {
                            url : REMOTE_CHECK_MOBILE,
                            data : {
                              id : $("#user_id").val(),
                            }
                        }
                    },
                    email: {
                        required: true,
                        email: true,
                        remote : {
                            url : REMOTE_CHECK_EMAIL,
                            data : {
                              id : $("#user_id").val(),
                            }

                        },
                        
                    },
                    gender : {
                      required: true
                    },
                    date_of_birth : { required: true},
                    nationality_id : { required: true},
                    country_id : { required: true},

                },
                messages: {
                    first_name: {
                      required: "Please enter first name.",
                    },
                    last_name: {
                      required: "Please enter last name.",
                    },
                    mobile: {
                      required: "Please enter mobile.",
                      number: "Please enter valid mobile.",
                      remote:"Mobile is already exists."
                    },
                    email: {
                      required: "Please enter email.",
                      email: "Please enter valid email.",
                      remote : "Email is already exists.",
//                      verifyregisteremail: "Please verify email."
                    },
                  gender : {
                      required: "Please select gender."
                    },
                    date_of_birth : { required: "Please select birth date."},
                    nationality_id : { required: "Please select nationality."},
                    country_id : { required: "Please select country."},
                },
                errorPlacement: function (error, element) {
                        error.insertAfter(element);
                    
                },
            

            });
 
      
      $("#add_user_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            var thisBtn = $(this);
            var buttonText = $(this).html();
            var loaderText = '<i class="fa fa-spinner fa-spin"></i> '+buttonText;

            if(!form.valid()){
                return false;
            }

            form = document.getElementById('add_user_form');
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
                                      .then((result) => {
                                          /* Read more about isConfirmed, isDenied below */
                                          if (result.isConfirmed) {
                                              if(data.redirect_url != undefined && data.redirect_url != '') {
                                                  window.location.href = data.redirect_url;
                                              }
                                          } 
                                        })
                                   
                        }
                    } 
                },
                error : function() {
                      $(thisBtn).html(buttonText);                    
                }
            });
            


      });

        
     
     

     
  }


});


