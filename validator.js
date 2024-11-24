function Printerr(elemId, msg) {
    document.getElementById(elemId).innerHTML = msg;
}

function ValidateForm() {
    var name = document.firstform.username.value;
    var birth = document.firstform.birthdate.value;
    //var age = document.firstForm.age.value;
    var mail = document.firstform.email.value;
    var experience_years = document.firstform.experience.value;
    var relevant_experience = document.firstform.story.value.trim();
    //var id = document.firstForm.idNum.value;

    //below adds error messages.
    var isvalid = true;
    if(name == "") {
        Printerr("nameerror", "Please enter in a name")
        isvalid = false;
    }
    
    if(mail == "") {
        Printerr("mailerror", "Please enter an appropriate email")
        isvalid = false;
    }
    if(experience_years == "") {
        Printerr("experror", "Please enter your experienced years as a pilot")
        isvalid = false;
    }
    if(relevant_experience == "") {
        Printerr("storyerror", "Please enter your relevant experience")
        isvalid = false;
    }

    if(!isvalid) {
        return false;
    }
}
