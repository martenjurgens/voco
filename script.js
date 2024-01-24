function registerUser(event) {
  event.preventDefault()
  $('#regError').text('')

  $.ajax({
    type: 'POST',
    url: 'register.php',
    data: $('#registrationForm').serialize(),
    success: function (response) {
      if (response.status === 'success') {
        console.log('Registration successful!')
        toggleForms()
        showRegSuccess()
      }
    },
    error: function (error) {
      $('#regError').text('Account already exists')
    },
  })
}

function loginUser(event) {
  event.preventDefault()
  $('#loginError').text('')

  $.ajax({
    type: 'POST',
    url: 'login.php',
    data: $('#loginForm').serialize(),
    success: function (response) {
      if (response.status === 'success') {
        console.log('Successfully logged in!')
        window.location.href = 'dashboard.php'
      } else {
        console.log('Login failed!:', response.message)
        $('#loginError').text('No user found with that username.')
      }
    },
    error: function (error) {
      console.log(error)
    },
  })
}

function showRegSuccess() {
  var successMessage = 'Account successfully registered!'
  $('#loginError').text(successMessage).css('color', 'green')
  setTimeout(function () {
    $('#loginError').text('').removeAttr('style')
  }, 3000)
}

function toggleForms() {
  $('#loginForm').toggle()
  $('#registrationForm').toggle()

  $('#loginForm input, #registrationForm input').val('')
  $('#loginError, #regError').text('')
}
