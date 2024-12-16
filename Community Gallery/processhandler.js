//eroor print functions
function Printerr(elemId, msg) {
    document.getElementById(elemId).innerHTML = msg;
}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

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

//signup post request
$(document).ready(function() {
    //alert("bjgjg")
    $("#signupform").submit(function(event) {
        //alert("dnjgnknejg")
      event.preventDefault(); // Prevent default form submission


        var username = $("#username").val();
        var password = $("#password").val();
        var password2 = $("#password_confirmation").val();
        //alert(username + " " + password + " " + password2)

        var data = new FormData();
        data.append('username', username);
        data.append('posttype', "signupvalidation");
        data.append('password', password);
        data.append('password_confirmation', password2);

        $.ajax({
            url: "process.php", //where it is being sent to
            data: data, //data it includes
            type: "POST", //what type of request this is.
            cache: false,
            contentType: false,
            dataType: false, //data type, ex: JSON
            processData: false,
            
            
            success: function(data) { //if the request was success. "data" is the return of whatever the serverside stuff did
                //location.reload();
                //alert(data);
                //$("#extraerrormessage").text(data);
                //var myVariable = "<?php echo $isloggedin; ?>";
                //alert(myVariable);
                if(data == "error") {
                    $("#extraerrormessage").text("Sorry this username was already taken");
                }
                else if(data == "success") {
                    window.location = "Directory.php";
                }
            },
            error: function(e) {
                //alert("error while trying to add or update user!");
                //alert(e);
                $("#extraerrormessage").text(e);
            }
            
            
        }); 

    });
  });

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

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

//same thing as above but for the login post request
$(document).ready(function() {
    //alert("bjgjg")
    $("#loginform").submit(function(event) {
        //alert("dnjgnknejg")
      event.preventDefault(); // Prevent default form submission

        var username = $("#username").val();
        var password = $("#password").val();

        var data = new FormData();
        data.append('username', username);
        data.append('posttype', "loginvalidation");
        data.append('password', password);

        $.ajax({
            url: "process.php",
            data: data,
            type: "POST",
            cache: false,
            contentType: false,
            dataType: false,
            processData: false,
            
            
            success: function(data) {
                if(data == "error") {
                    $("#extraerrormessage").text("Sorry, something went wrong with login");
                }
                else if(data == "success") {
                    window.location = "Directory.php";
                }
            },
            error: function(e) {
                //alert("error while trying to add or update user!");
                //alert(e);
                $("#extraerrormessage").text(e);
            }
            
            
        }); 

    });
  });