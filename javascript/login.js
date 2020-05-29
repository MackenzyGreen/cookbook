var error = 0;

document.getElementById("pwd").onkeyup=function(){
    var pwd = document.getElementById("pwd").value;
    var confirm = document.getElementById("confirm").value;
    var len = pwd.length;

    if(pwd==confirm && pwd!="" && confirm!=""){
        if(len>=8){
            document.getElementById("signupbtn").disabled=false;
            document.getElementById("confirm").style.backgroundColor="white";
        }
    }else{
        document.getElementById("signupbtn").disabled=true;
        document.getElementById("confirm").style.backgroundColor="pink";
    }
}

document.getElementById("confirm").onkeyup=function(){
    var pwd = document.getElementById("pwd").value;
    var confirm = document.getElementById("confirm").value;
    
    var len = pwd.length;

    if(pwd==confirm && pwd!="" && confirm!=""){
        if(len>=8){
            document.getElementById("signupbtn").disabled=false;
            document.getElementById("confirm").style.backgroundColor="white";
        }
    }else{
        document.getElementById("signupbtn").disabled=true;
        document.getElementById("confirm").style.backgroundColor="pink";
    }
}

function ValidateEmail(mail) 
{  
    var email = document.getElementById(mail).value;

    if(email==""){
        error=0;
        return (true)
    }

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        error=0;
        return (true)
    }
        alert("You have entered an invalid email address!")
        error=1;
        return (false)
}

document.getElementById("signupbtn").onclick=function(){
    if(error==0){
        var pwdLen = document.getElementById("pwd").value.length;
        if(pwdLen<8){
            alert("Password must be at least 8 characters long.");
        }else{
            document.getElementById("half1").submit();
        }
    }else{
        alert("Please enter a valid email address");
    }
}

const url_string = window.location.href;
var url = new URL(url_string);
var error = url.searchParams.get("e");

if(error==1){
    alert("Something went wrong with signing up. Please try again later.");
}
if(error==3){
    alert("Invalid Email or Password.");
}