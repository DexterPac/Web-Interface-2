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

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
function makeid(length) { //makes a randomized id
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; //all possible character
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength)); //selects a random character from the above
      counter += 1;
    }
    return result;
}

function addimage() { //add a new image element
    var referencebtn = document.getElementById("addimagebtn");

    var newimg = document.createElement("img");
    $(newimg).attr("src", "");
    $(newimg).attr("class", "images");

    referencebtn.insertAdjacentElement('beforebegin', newimg); //insertAdjacentElement does not support jquery syntax
}

$(document).ready(function() { //get & display previous entered images from database on page load
    if($("#imageform") != undefined)
    {
        var data = new FormData();
        data.append('posttype', "getuploadImage");
        $.ajax({
            url: "process.php",
            type: "POST",
            data: data,
            cache: false,
            contentType: false, //type sending
            dataType: "json", //type recieving
            //dataType: false,
            processData: false,
                      
            success: function(data) {
                for(var i = 0; i < Object.keys(data).length; i++) //Object.keys(data) -> [returned object]].[keys/key names of object]([value of such key(s)]) 
                {
                    let collection = document.getElementsByTagName("img");
                    for (let b = 0; b < collection.length; b++) {
                        if(collection[b].getAttribute("src") == "")
                        {
                            //$("#imageDisplay").attr("src", data["imgsrc"]);
                            $(collection[b]).attr("src", data["imgsrc" + i]); //note that this is only possible becase I am retrieving
                            //from a JSON object, thus, can be accessed like one.
                            //alert(collection[b].getAttribute("id"))
                            break;
                        }
                    };
                    addimage(); //add one extra image display for total number of images that need to be loaded
                }
            },
            error: function(e) {   
            }                
            
        });
    }
});

$(document).ready(function() { //display newly selected image
    var imagePicker = $("#image-picker");
      $(imagePicker).on("input", function(e) {
        if (e.target.files) { //for the selected file from the input
            let selectedFile = e.target.files[0]; //selected file 1
            var reader = new FileReader(); //file reader
            reader.readAsDataURL(selectedFile); //create a readble & applicable url for the image
            reader.onloadend = function (e) { //once the reader has loaded (this happens asynchronously, which is why code needs to be inside here)
                var myImage = new Image(); // Creates image object
                myImage.src = e.target.result; // Assigns converted image to image object
                myImage.onload = function(ev) {
                    //$('#imageDisplay').src(e.target.result);
                    let collection = document.getElementsByTagName("img"); //collection of image elements
                    for (let i = 0; i < collection.length; i++) {
                        if(collection[i].getAttribute("src") == "") //if the image element has no pointed src
                        {
                            $(collection[i]).attr("src", myImage.src); //set first open image's src to the file url
                            //this.disabled = true;
                            break;
                        }
                    };
                }
            }
        }
        $(imagePicker).prop("disabled","false"); //disable the input (idk why in jquery 'false' disables it, but whatever)
    }); 
});

$(document).ready(function() { //submit image post request to database
    $("#imageform").submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var imagePicker = $("#image-picker");
        var selectedFile = imagePicker.prop("files")[0];
        //alert(selectedFile);
        if (!selectedFile) 
            return alert("Please select a file"); 

        var theimagesrc;
        var json;
        var reader = new FileReader();
        reader.readAsDataURL(selectedFile);
            reader.onloadend = function (e) {
                var myImage = new Image(); // Creates image object
                myImage.src = e.target.result; // Assigns converted image to image object
                myImage.onload = function(ev) {
                    //let collection = document.getElementsByTagName("img");
                    theimagesrc = myImage.src;
                    //imglistingtitle = "img" + collection.length;
                    var imglistingtitle = makeid(10); //we are making a random id to minimize file matching errors occuring in the database
                    //if entries in the database are deleted while user is in browser and then submits (otherwise, the other method above would be better)
                    //let imgData = myCanvas.toDataURL("image/jpeg", 0.75); // Assigns image base64 string in jpeg format to a variable
                    try {
                        json = { 
                            [imglistingtitle] : theimagesrc //image url as value with random key name
                        };
                        //alert(json.img1)
                        //alert(JSON.stringify(json));
                    }
                    catch (err) {
                        alert(err.message);
                    }
                    var json2 = JSON.stringify(json); //convert created json object into JSON type
                    var formData = new FormData();
                    //formData.append("image", selectedFile);
                    formData.append('posttype', "uploadImage");
                    formData.append("gallery", json2);
        
                    $.ajax({
                        url: "process.php",
                        data: formData,
                        type: "POST",
                        cache: false,
                        contentType: false,
                        dataType: false,
                        processData: false,
                                    
                        success: function(data) {
                            alert(data);
                            if(data == "error") {
                                $("#extraerrormessage").text("Sorry, something went wrong");
                            }
                            else if(data == "success") {
                                $("#extraerrormessage").text("you uploaded that image");
                                $(imagePicker).prop("disabled","");
                            }
                        },
                        error: function(e) {
                            alert("there as been an error with the post request");
                            $("#extraerrormessage").text(e);
                            //alert(e);
                            //$("#extraerrormessage").text(e);
                        }                                          
                    });
                }
            }    
    });
});

