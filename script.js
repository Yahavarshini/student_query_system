    //form 1

    function vfun(){
        var Registernumber=document.forms["myform"]["Registernumber"].value;
        var password=document.forms["myform"]["password"].value;

    if(Registernumber==null || Registernumber=="" ){
              document.getElementById("errorBox").innerHTML =
               "enter the user name";
             return false;
    }

    if(password==null || password==""){
              document.getElementById("errorBox").innerHTML =
               "enter the password";
             return false;
    }

    if (Registernumber != '' && password != '' ){
     alert("Login successfully");
                     }

    }

//form 2

function vfun1(){
        var Registernumber=document.forms["register"]["Registernumber"].value;
        var Email=document.forms["register"]["Email"].value;
        var Password=document.forms["register"]["Password"].value;


    if(Registernumber==null || Registernumber=="" ){
              document.getElementById("errorBox").innerHTML =
               "enter the user name";
             return false;
    }

    if(Email==null || Email==""){
              document.getElementById("errorBox").innerHTML =
               "enter the email";
             return false;
    }

    if(Password==null || Password=="" ){
              document.getElementById("errorBox").innerHTML =
               "enter the password";
             return false;
    }


    



    if (Registernumber != '' && Password != '' &&  Email != '' )


      alert("Register successfull");


    }