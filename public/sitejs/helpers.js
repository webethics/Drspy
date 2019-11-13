/*validate email*/
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/*validate phone number*/
function validatephone(inputtxt) {
  var phoneno = /[0-4]/g;
  if((inputtxt.match(phoneno)) && isNaN(inputtxt) == false) {
      return true;
  } else {
    return false;
  }
}

/*validate password*/
function validatepassword(value) {
  var password = $('#password').val();
  if(value.length < 6) {
    return 1;
  } else {
    if(password != '') {
      if(password != value) {
        return 2;
      }
    } else {
      return 3;
    }
  }
}

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('registerform');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


//validate all inputs
function validate_fields() {

}
