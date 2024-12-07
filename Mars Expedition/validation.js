window.onload = function() { //clock function
if(document.getElementById("timer") != undefined)
{
    let display = document.getElementById("timer");
    let time = 3600; //in seconds
    let timer = time, minutes, seconds;

setInterval(function() { //every 1000 miliseconds
    minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);

    display.textContent = "Time until next launch: " + minutes + ":" + seconds;
    if (--timer < 0) {
        timer = time; // Reset the timer if needed
      }
    
    if(minutes < 30)
    {
        display.textContent = "Time until next launch: " + minutes + ":" + seconds + " You better hurry!";
    }

    },1000);

}
}


//eroor print functions
function Printerr(elemId, msg) {
    document.getElementById(elemId).innerHTML = msg;
}

//validation function
function ValidateForm() {
    var name = document.firstform.username.value.trim();
    var birth = document.firstform.birthdate.value;
    var phone = document.firstform.phone.value.trim();
    var mail = document.firstform.email.value.trim();
    var weight = document.firstform.weight.value;
    //var hasexperience = document.firstform.expcon.value;
    var relevant_experience = document.firstform.story.value.trim();
    //var id = document.firstForm.idNum.value;

    //below adds error messages.
    var isvalid = true;
    if(name == "") { //empty name
        Printerr("nameerror", "Please enter in a name")
        isvalid = false;
    }
    if(phone == "") { //empty phone
        Printerr("phoneerror", "Please enter an appropriate phone number. Ex: 123-456-7890")
        isvalid = false;
    }
    if(mail == "") { //empty mail
        Printerr("mailerror", "Please enter an appropriate email. Ex: me@mail.com")
        isvalid = false;
    }
    if(weight == "") { //empty mail
        Printerr("weighterror", "Please enter your current weight")
        isvalid = false;
    }
    if(relevant_experience == "") { //empty experience
        Printerr("storyerror", "Please enter your relevant experience")
        isvalid = false;
    }

    if(!isvalid) {
        return false;
    }
}

//client input signup varification
function signupvalidation() {
    var name = document.signupform.username.value.trim(); //name
    var password = document.signupform.password.value.trim(); //passsword
    var password2 = document.signupform.password_confirmation.value.trim(); //password confirmation
    var isvalid = true;
    if(name == "")
    {
        Printerr("nameerror", "Please enter in a name")
        isvalid = false;
    }
    if(password.split("").length < 8)
    {
        Printerr("passworderror", "Please enter in a password with 8 characters or more")
        isvalid = false;
    }
    if(password == "")
    {
        Printerr("passworderror", "Please enter in a password")
        isvalid = false;
    }
    if(password2 == "" || password2 != password)
    {
        Printerr("passworderror2", "Please reenter your password")
        isvalid = false;
    }

    if(!isvalid) {
        return false;
    }
    
}

//client login varification
function loginvalidation() {
    var name = document.loginform.username.value.trim(); //name
    var password = document.loginform.password.value.trim(); //password
    var isvalid = true;
    if(name == "")
    {
        Printerr("nameerror", "Please enter in a name")
        isvalid = false;
    }
    if(password.split("").length < 8)
    {
        Printerr("passworderror", "Please enter in a password with 8 characters or more")
        isvalid = false;
    }
    if(password == "")
    {
        Printerr("passworderror", "Please enter in a password")
        isvalid = false;
    }

    if(!isvalid) {
        return false;
    }
    
}
