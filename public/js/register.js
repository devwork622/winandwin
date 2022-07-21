
$(function () {
  'use strict';

  var email_verified = false;
  var email_for_verify = '';
  
  $(document).ready(function(){      
      
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

       $("#registration_form").validate({
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
                        }
                    },
                    email: {
                        required: true,
                        email: true,
                        remote : {
                            url : REMOTE_CHECK_EMAIL,
                        },
                        verifyregisteremail : true,
                        
                    },
                    password: {
                        required: true,
                        minlength : 6,
                    }
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
                      verifyregisteremail: "Please verify email."
                    },
                    password: {
                        required: "Please enter password.",
                        minlength: "Enter at least {0} characters.",
                    //    remote: jQuery.format("{0} is already in use")
                    }
                },
                errorPlacement: function (error, element) {
                        error.insertAfter(element);
                    
                },
                submitHandler: function(form) {
                      form.submit(); 
                   
                }

            });
 
      
      $("#register_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');


            $(form).submit();


      })

      $(".suggestpwd").click(function(){
          $("#password").val(randString());
        });


      $("#email_verify_btn").on("click", function(){
          var email = $("#email").val();
          var first_name = $("#first_name").val();
          var last_name = $("#last_name").val();           
          if(email != '') {
              email_for_verify =  email;
              $("#email_verify_btn_loader").show();
              $("#email_verify_btn").hide();

              $.ajax({
                type: "GET",
                url: REMOTE_VERIFY_EMAIL_REQUEST,
                data: { email : email, first_name : first_name, last_name : last_name},            
                success: function(data) {
                    $("#email_verify_btn_loader").hide();
                    $("#email_verify_btn").show();

                    if(data.success == '1') {
                       $(".verify-code-btn").hide();
                       $(".verify-code").show();
                    } else {
                       $(".verify-code-btn").show();
                       $(".verify-code").hide();
                    }
                },
                error : function() {
                    $("#email_verify_btn_loader").hide();
                    $("#email_verify_btn").show();
                    $(".verify-code-btn").show();
                    $(".verify-code").hide();
                }
              });  
          }         

      });

      $("#email").on("change", function(){
          if($(this).val() != email_for_verify){
              $(".verify-code").hide();
              $(".verify-code-btn").show();
              $(".verified-code-btn").hide();
              $("#verify-code-error-lbl").html("");
              $("#verify_code").val("");
              email_verified = false;               
          }
      });

      $("#verify_code").keypress(function(e) {
          if(e.which == 13) {
              var email = $("#email").val();
              var verify_code = $("#verify_code").val();
              
              if(verify_code == ''){
                  $("#verify-code-error-lbl").html("Please enter code.");
                  $("#verify-code-error-lbl").show();
                  return false;
              }

              if(email != '') {
                  $.ajax({
                    type: "GET",
                    url: REMOTE_VERIFY_EMAIL,
                    data: { email : email , code : verify_code},            
                    success: function(data) {
                        if(data.success == '1') {
                            $(".verify-code").hide();
                            $(".verified-code-btn").show();     
                            email_verified = true;
                            $('#email').valid();
                            $("#verify-code-error-lbl").html("");
                            $("#verify-code-error-lbl").hide();
                        } else {
                            $("#verify-code-error-lbl").html("Please enter valid code.");
                            $("#verify-code-error-lbl").show();
                        }
                    },
                    error : function() {
                     
                    }
                  });
              }                        
          }
      });
  }


// Generate a password string
function randString(){
  var dataSet = $("#password").attr('data-character-set').split(',');  
  var possible = '';
  if($.inArray('a-z', dataSet) >= 0){
    possible += 'abcdefghijklmnopqrstuvwxyz';
  }
  if($.inArray('A-Z', dataSet) >= 0){
    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }
  if($.inArray('0-9', dataSet) >= 0){
    possible += '0123456789';
  }
  
  if($.inArray('#', dataSet) >= 0){
    possible += '![]{}()%&*$#^<>~@|';
  }
  var text = '';
  for(var i=0; i < $("#password").attr('data-size'); i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}
});


