
$(function () {
  'use strict';

  
  $(document).ready(function(){      
      bindEvents();
  });

  var bindEvents = function(){ 

      // forgot password form
       $("#forgotform").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,                                            
                    },
                    
                },
                messages: {
                    email: {
                      required: "Please enter email.",
                      email: "Please enter valid email.",
        
                    },
                    
                },                
                submitHandler: function(form) {
                   form.submit();
                }

            });
 
      
      $("#forgot_password_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            $(form).submit();

      })

      // reset password form
      $("#resetform").validate({
                rules: {
                    password: {
                        required: true,
                        minlength : 6,                                            
                    },
                    password_confirmation : {
                      required:true,
                      equalTo: "#password"
                    }
                    
                },
                messages: {
                    password: {
                      required: "Please enter password.",
                      minlength: "Enter at least {0} characters.",
                    },
                    password_confirmation : {
                      required: "Please enter password.",
                      equalTo : "Password and confirm password must be same."                      
                    }
                    
                },                
                submitHandler: function(form) {
                   form.submit();
                }

            });
 
      
      $("#reset_password_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            $(form).submit();

      })

    }

});


