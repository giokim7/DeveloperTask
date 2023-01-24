//get values of the input fields
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const error1 = document.getElementById("error1");
const error2 = document.getElementById("error2");
const error3 = document.getElementById("error3");
const error4 = document.getElementById("error4");
let submit_btn = document.getElementById('submit-btn');


//add event listener to submit button to submit the inputs
submit_btn.addEventListener('click', e => {
  e.preventDefault();

  validateInputs();  
  //if the inputs pass the validation tests, submit the inputs
  if(validateInputs()){
   submitForm();
  } 

})

//check whether the inputs pass the validation tests
function validateInputs(){
  return checkFName() && checkLName() && checkTelephone() && checkEmail();
}

//function to pass the inputs to the PHP file
function submitForm(){
  var form = document.getElementById("formId");
  var inputs = form.getElementsByTagName("input");
  var selects = form.getElementsByTagName("select");
  var queryString = "";
  for (var i = 0; i < inputs.length; i++) {
      queryString += inputs[i].name + "=" + inputs[i].value + "&";
  }
  for (var i = 0; i < selects.length; i++) {
      queryString += selects[i].name + "=" + selects[i].value + "&";
  }
  form.action = "submit.php?" + queryString;
  form.submit();
}

//check if fname is not empty
fname.addEventListener("input", checkFName);

function checkFName() {
  if (fname.value.trim() === "") {
      error1.innerHTML = "You need to fill this form";
      error1.style.display = "block";
      return false;
  } else {
      error1.innerHTML = "";
      error1.style.display = "none";
      return true;
  }
}

//check if lname is not empty
lname.addEventListener("input", checkLName);

function checkLName() {
  if (lname.value.trim() === "") {
      error2.innerHTML = "You need to fill this form";
      error2.style.display = "block";
      return false;
  } else {
      error2.innerHTML = "";
      error2.style.display = "none";
      return true;
  }
}

//check if the telephone field is in a proper format
function checkTelephone(){
  const tel = document.getElementById("tel").value;
  const re = /^\+(?:[0-9] ?){6,14}[0-9]$/;

  if (tel === "") {
    error3.innerHTML = "";
    error3.style.display = "none";
    return true;
  } else if (!re.test(String(tel))) {
    error3.innerHTML = "Mobile phone number not correct. Follow the format +49123456789123";
    error3.style.display = "block";
    return false;
  } else {
    error3.innerHTML = "";
    error3.style.display = "none";
    return true;
  }

}

//check if the email field is in a proper format
function checkEmail() {
  var email = document.getElementById("email").value;
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
  if (email === "") {
    error4.innerHTML = "";
    error4.style.display = "none";
    return true;
  } else if (!re.test(String(email).toLowerCase())) {
    error4.innerHTML = "Invalid email address. Follow the format test@email.com";
    error4.style.display = "block";
    return false;
  } else {
    error4.innerHTML = "";
    error4.style.display = "none";
    return true;
  }

}


