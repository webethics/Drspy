/*Registration section code starts*/

$(document).ready(function() {

  var events = ['focusout', 'click'];
  var elements = ['#account_cvv_code', '.account_page_detail', '#signupform', '.register_blade', '#loader-section'];
  var messages = ['This field is requried!', 'Please enter a valid email!', 'Please enter a valid phone!', 'Please enter a number of a valid length!', 'Please enter passoword', 'Password and confirm password fields must match!', 'Password and confirm password must be of 6 digits!']
  /*Signup form validation*/

  $(document).on(events[1], elements[2], function(e) {
    e.preventDefault();
    var inputdata = $(elements[3]);
    var a = 0;
    $(elements[4]).show();
    $(inputdata).each(function(i, val) {
      var ids = $(val).attr('id');
      var value = $(val).val();
      $('.'+ids).html('');
      if( value == '') {
        $('.'+ids).append(messages[0]);
        a++;
      } else {
        if(ids == 'email') {
          var result = validateEmail(value);
          if(result != true) {
            $('.'+ids).append(messages[1]);
            a++;
          }
        }

        if(ids == 'telephone') {
          var result = validatephone(value);
          if(result != true) {
            $('.'+ids).append(messages[2]);
            a++;
          } else {
            if(value.length < 10) {
              $('.'+ids).append(messages[3]);
              a++;
            }
          }
        }

        if(ids == 'confirm_passsword') {
          var html = '';
          var result = validatepassword(value);
          if(result == 3) {
            $('.password').append(messages[4]);
            a++;
          } else  if( result == 2) {
            $('.'+ids).append(messages[5]);
            a++;
          } else if (result == 1) {
            $('.'+ids).append(messages[6]);
            a++;
          }
        }
      }
    });
    /*If form validation all correct*/
    if(a == 0) {
        $.ajax({
          url:'/user/checkemail',
          method:"post",
          async:false,
          headers: {
              'X-CSRF-TOKEN': $('#token_value').val()
          },
          data:{'email':$("#email").val()},
          success:function(response) {
           if(response == 0) {
              $(elements[4]).hide();
             var html = 'The email is already registerd!';
             $('.email').append(html);
             return false;
           } else {
              $.ajax({
                url:"/user/checkregister",
                method:"post",
                data:$('#registerform').serialize(),
                success:function(response) {
                  if (response != '') {
                    result = JSON.parse(response);
                    if(result['status'] == 200) {
                      $(elements[4]).hide();
                      window.location.href = '/pricing';
                    }
                  } else {
                    $(elements[4]).hide();
                    alert('There was some error in submission of form, Please try again later!');
                  }
                }, error:function(err) {

                }
              });
           }
        },error:function(err) {
         $(elements[4]).hide();
         console.log(err);
        }
      });
    } else {
      $(elements[4]).hide();
      return false;
    }
  });

  /*Signup form validation ends*/

  /*account page validation*/
  $(document).on(events[0], elements[0], function() {
      var form_fields = $(elements[1]);
      var input_error = 0;
      $(form_fields).each(function(i , v) {
        if($(v).val() == '') {
          input_error++;
          $(v).addClass('account_page_error');
        } else {
          $(v).removeClass('account_page_error');
        }
      });

      if(input_error == 0) {
        $('#account_details_form').submit();
      } else {
		
        return false;
      }
  });
  /*account page validation end*/

});

/*Stripe payment section code starts*/
//
// var stripe = Stripe("pk_test_XW21QtES40QYeObTZLPpj4Tp");
// // Custom styling can be passed to options when creating an Element.
// // (Note that this demo uses a wider set of styles than the guide below.)
// var style = {
//   base: {
//     color: '#32325d',
//     fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
//     fontSmoothing: 'antialiased',
//     fontSize: '16px',
//     '::placeholder': {
//       color: '#aab7c4'
//     }
//   },
//   invalid: {
//     color: '#fa755a',
//     iconColor: '#fa755a'
//   }
// };
//
// var elements = stripe.elements();
// // Create an instance of the card Element.
// card = elements.create('card', {hidePostalCode: true,style: style});
//
// card.addEventListener('change', function(event) {
//   var displayError = document.getElementById('card-errors');
//   if (event.error) {
//     displayError.textContent = event.error.message;
//   } else {
//     displayError.textContent = '';
//   }
// });
//
// /*submit plan*/
//
// $(document).on('click', '#submitplan', function() {
//   $('#planerrordiv').html('');
//   var invalid = 0;
//   var planoption = $('.planselectinp');
//   for(var j=0; j<=planoption.length; j++) {
//     if($(planoption[j]).is(':checked') == true) {
//       invalid++;
//     }
//   }
//   if(invalid != 1) {
//     var html = 'Please select any plan!';
//     $('#planerrordiv').append(html);
//     return false;
//   } else {
//     $('#plan_select_form').hide();
//     $('#card_details_section').show();
//     card.mount('#card-element');
//     $(this).removeAttr('id');
//     $(this).attr('id', 'submitform');
//     $(this).val('Submit');
//
//   }
// })
//
// $(document).on('click', '#submitform', function(e) {
//   e.preventDefault();
//   stripe.createToken(card).then(function(result) {
//     if (result.error) {
//       // Inform the user if there was an error.
//       var errorElement = document.getElementById('card-errors');
//       errorElement.textContent = result.error.message;
//     } else {
//       // Send the token to your server.
//       stripeTokenHandler(result.token);
//     }
//   });
// });
