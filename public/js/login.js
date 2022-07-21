
$(function () {
  'use strict';

  
  $(document).ready(function(){      
      bindEvents();
  });

  var bindEvents = function(){ 

        // login with email form
       $("#login_email_form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,                                            
                    },
                    password: {
                        required: true,
                        minlength : 6,
                    }
                },
                messages: {
                    email: {
                      required: "Please enter email.",
                      email: "Please enter valid email.",
        
                    },
                    password: {
                        required: "Please enter password.",
                        minlength: "Enter at least {0} characters.",
                    //    remote: jQuery.format("{0} is already in use")
                    }
                },                
                submitHandler: function(form) {
                   form.submit();
                }

            });
 
      
      $("#btn_email_login").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            $(form).submit();

      })

    // login with mobile form  
    $("#login_mobile_form").validate({
                rules: {
                    mobile: {
                        required: true,
                        number: true,
                        
                    },
                    password: {
                        required: true,
                        minlength : 6,
                    }
                },
                messages: {
                    mobile: {
                      required: "Please enter mobile.",
                      number: "Please enter valid mobile.",
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Enter at least {0} characters",
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "mobile") {
                        error.insertAfter($(element).parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                   form.submit();
                }

    });
 
      
    $("#btn_mobile_login").on("click",function(e){
            e.preventDefault();            
            $("#login_mobile_form").submit();


      })
  }


});


