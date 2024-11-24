function Printerr(elemId, msg) {
    document.getElementById(elemId).innerHTML = msg;
}

function ValidateForm() {
    var name = document.firstform.username.value;
    //var birth = document.firstForm.birthdate.value;
    var theage = document.firstForm.age.value;
    //alert(theage)
   // var mail = document.firstForm.email.value;
    //var experience_years = document.firstForm.experience.value;
    //var relevant_experience = document.firstForm.story.value;
    //var id = document.firstForm.idNum.value;

    var isvalid = true;
    
    
    if(name == "") {
        Printerr("nameerror", "Please enter in a name")
        isvalid = false;
    }
        
    
    /*
    if(theage == "") {
        Printerr("ageerror", "Please enter in an age")
        isvalid = false;
    }
    */
    /*
    if(experience_years == "") {
        Printerr("experror", "Please enter your experienced years as a pilot")
        isvalid = false;
    }
        */

        

    if(!isvalid) {
        //return false;
    }
}
