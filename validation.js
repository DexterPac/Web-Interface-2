window.onload = function() { //clock function
let time = 3600; //in seconds
let display = document.getElementById("timer");
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
    if(relevant_experience == "") { //empty experience
        Printerr("storyerror", "Please enter your relevant experience")
        isvalid = false;
    }

    if(!isvalid) {
        return false;
    }
}
