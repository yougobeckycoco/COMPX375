function validate() {
    var nameError = validateName();
    var emailError = validateEmail();
    if (nameError && emailError) {
        return true;
    }
    return false;
}

function validateName() {
	name = document.getElementById('name').value;
    pos1 = name.indexOf(" ");
    if (pos1 >= 0 && name.length < 40) {
        document.getElementById('nameError').innerHTML = "";
        return true;
    }
    else {
        document.getElementById('nameError').innerHTML = "Please enter a first and last name";
        return false;
    }
}

function validateEmail() {
    emailAddress = document.getElementById('email').value;
    pos1 = emailAddress.indexOf("@");
    pos2 = emailAddress.indexOf(".");
    if (pos1 >= 0 && pos2 >= 0 && emailAddress.length < 100) {
        document.getElementById('emailError').innerHTML = "";
        return true;
    }
    else {
        document.getElementById('emailError').innerHTML = "Please enter a valid email address, must include @ and .";
        return false;
    }
}