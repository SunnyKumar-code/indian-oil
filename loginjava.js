function login(event, boxNumber) {
  event.preventDefault(); // Prevent the form from submitting

  var usernameInput = document.getElementById('username' + boxNumber);
  var passwordInput = document.getElementById('password' + boxNumber);
  var loginMessage = document.getElementById('loginMessage' + boxNumber);

  var username = usernameInput.value;
  var password = passwordInput.value;

  // You can implement your login logic here
  // This code is for demonstration purposes only
  if (username === 'admin' && password === 'admin123') {
    window.location.href = 'mainpage.html'; 
  } else {
    loginMessage.innerText = 'Invalid username or password';
    loginMessage.style.color = 'red';
  }

  usernameInput.value = '';
  passwordInput.value = '';

  return false; // Prevent the form from submitting
}

//for apprentice

function apprenticelogin(event, boxNumber) {
  event.preventDefault(); // Prevent the form from submitting

  var usernameInput = document.getElementById('username' + boxNumber);
  var passwordInput = document.getElementById('password' + boxNumber);
  var loginMessage = document.getElementById('loginMessage' + boxNumber);

  var username = usernameInput.value;
  var password = passwordInput.value;

  // You can implement your login logic here
  // This code is for demonstration purposes only
 

  usernameInput.value = '';
  passwordInput.value = '';

  return false; // Prevent the form from submitting
}
