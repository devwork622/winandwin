
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

       $("#profile_update_form").validate({
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
                    // email: {
                    //     required: true,
                    //     email: true,
                    //     remote : {
                    //         url : REMOTE_CHECK_EMAIL,
                    //         data : {
                    //           id : $("#user_id").val(),
                    //         }

                    //     },
                        
                    // },
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
 
      
      $("#profile_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            var thisBtn = $(this);
            var buttonText = $(this).html();
            var loaderText = '<i class="fa fa-spinner fa-spin"></i> '+buttonText;

            if(!form.valid()){
                return false;
            }

            $(this).html(loaderText);
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),            
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
                        }
                        clearChangePasswordForm();
                    } 
                },
                error : function() {
                      $(thisBtn).html(buttonText);                    
                }
            });
            


      });

        
      $("#change_password_form").validate({
                rules: {
                    old_password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                        minlength : 6,

                    },
                    new_confirm_password: {
                        required: true,
                        equalTo: "#new_password"
              
                    },
                },
                messages: {
                    old_password: {
                      required: "Please enter old password.",
                    },
                    new_password: {
                      required: "Please enter new password.",
                      minlength: "Enter at least {0} characters",
                    },
                    new_confirm_password: {
                      required: "Please enter new confirm password.",
                      equalTo : "New password and confirm new password must be same."                                    
                    },
                    
                },

            });
 


      $("#change_password_submit").on("click",function(e){
            e.preventDefault();
            var btn = $(this);
            var form = $("#change_password_form");

            var thisBtn = $(this);
            var buttonText = $(this).html();
            var loaderText = '<i class="fa fa-spinner fa-spin"></i> '+buttonText;

            if(!form.valid()){
                return false;
            }

            $(this).html(loaderText);
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),            
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
                        }
                        clearChangePasswordForm();
                    } 
                },
                error : function() {
                      $(thisBtn).html(buttonText);                    
                }
            });
            

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

var clearChangePasswordForm = () => {
    $("#old_password").val('');
    $("#new_password").val('');
    $("#new_confirm_password").val('');
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


