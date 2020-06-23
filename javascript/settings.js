var alertError = 0;
function ValidateEmail(mail) 
{  
    var email = document.getElementById(mail).value;

    if(email==""){
        alertError=0;
        return (true)
    }

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        alertError=0;
        checkEmails();
        return (true)
    }
        alert("You have entered an invalid email address!");
        alertError=1;
        return (false)
}  

function checkEmails(){
    var oldEmail = document.getElementById("oldEmail").value;
    var newEmail = document.getElementById("newEmail").value;
    var pwd = document.getElementById("emailPassword").value;
    var pwdLen = pwd.length;
    var error = 2;

    if(oldEmail == "" || newEmail == "" || pwdLen<8 || oldEmail==newEmail){
        document.getElementById("updateEmailBtn").disabled=true;
    }else{
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(oldEmail))
        {
            error--;
        }
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(newEmail))
        {
            error--;
        }

        if(error==0){
            document.getElementById("updateEmailBtn").disabled=false;
        }
    }
}

document.getElementById("emailPassword").onkeyup=checkEmails;

function checkMatch(){
    var newPwd = document.getElementById("newPassword").value;
    var confirmPwd = document.getElementById("confirmPassword").value;
    var len = newPwd.length;

    if(newPwd==confirmPwd && newPwd!="" && confirmPwd!="" && len>=8){
        document.getElementById("confirmPassword").style.backgroundColor="white";
        checkFormComplete();
    }else{
        document.getElementById("updatePwdBtn").disabled=true;
        document.getElementById("confirmPassword").style.backgroundColor="pink";
    }
}

function checkFormComplete(){
    var newPwd = document.getElementById("newPassword").value;
    var confirmPwd = document.getElementById("confirmPassword").value;
    var oldPwd = document.getElementById("oldPassword").value;
    var len = newPwd.length;
    var oldLen = oldPwd.length;

    if(newPwd==confirmPwd && newPwd!="" && confirmPwd!="" && len>=8 && oldPwd!="" && oldLen>=8){
        document.getElementById("updatePwdBtn").disabled=false;
    }
}

document.getElementById("newPassword").onkeyup=checkMatch;
document.getElementById("confirmPassword").onkeyup=checkMatch;
document.getElementById("oldPassword").onkeyup=checkFormComplete;

function checkDelete(){
    var pwd = document.getElementById("deletePwd").value;
    var confirm = document.getElementById("confirmDelete").value;
    var len = pwd.length;

    if(pwd==confirm && pwd!="" && confirm!="" && len>=8){
        document.getElementById("confirmDelete").style.backgroundColor="white";
        document.getElementById("deleteBtn").disabled=false;
    }else{
        document.getElementById("deleteBtn").disabled=true;
        document.getElementById("confirmDelete").style.backgroundColor="pink";
    }
}

document.getElementById("deletePwd").onkeyup=checkDelete;
document.getElementById("confirmDelete").onkeyup=checkDelete;

const url_string = window.location.href;
var url = new URL(url_string);
var error = url.searchParams.get("e");

if(error==2){
    alert("Invalid Email or Password.");
}
if(error==1){
    alert("Email Successfully Updated.");
}
if(error==5){
    alert("Something Went Wrong. Could Not Update Email.")
}
if(error==6){
    alert("Invalid Password.")
}
if(error==8){
    alert("Password Successfully Updated!")
}
if(error==10){
    alert("Something Went Wrong. Could Not Update Password.")
}