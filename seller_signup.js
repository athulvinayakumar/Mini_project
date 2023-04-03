
$(document).ready(function(){
    $("form").submit(function(e){
           if(! (flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7)){
            // alert("asd");
            e.preventDefault();
            // alert(flag1+flag2+flag3+flag4+flag5+flag6+flag7);
        }
        });
})

flag1=0;
flag2=0;
flag3=0;
flag4=0;
flag5=0;
flag6=0; 
flag7=0;

function unames() {

    var name = document.getElementById("first").value;
    var letters = /^[A-Z][a-z]+$/;;
     if (!letters.test(name)) { 
        document.getElementById("msg1").innerHTML = "Firstname should Start with capital Letter";
        flag1=0;
    } else {
        document.getElementById("msg1").innerHTML = "";
        flag1=1;
    }
}


function users() {
    var users = document.getElementById("fifth").value;
    var letters = /^[A-Za-z]+$/;
     if (!letters.test(users)) {
        document.getElementById("msg5").innerHTML = "Username field required alphabet characters";
        flag2=0;
    } else {
        document.getElementById("msg5").innerHTML = "";
        flag2=1;
    }
}


function passs() {
    var pass = document.getElementById("sixth").value;
    var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
    
    if (!pwd_expression.test(pass)) {
        document.getElementById("msg6").innerHTML = "Upper case,Lower case,Special character and Numeric letter need";
        flag3=0;
    } else {
        document.getElementById("msg6").innerHTML = "";
        flag3=1;
    }
}

function conpasss() {
    var pass = document.getElementById("sixth").value;
    var cpass = document.getElementById("seventh").value;

    if (pass != cpass) {
        document.getElementById("msg7").innerHTML = "Password not match";
        flag4=0;

    } else {
        document.getElementById("msg7").innerHTML = "";
        flag4=1;
    }
}

function numbers() {
    var mobile = document.getElementById("second").value;
    var letters = /^[6-9][0-9]{9}$/;
    // var letters = /[8-9]{3}-[8-9]{3}-[0-9]{4}/
    
     if (!letters.test(mobile)) {
        document.getElementById("msg2").innerHTML = "Number field require number";
        flag5=0;
    } else {
        document.getElementById("msg2").innerHTML = "";
        flag5=1;
    }
}

function mails() {

    var mail = document.getElementById("third").value;
    var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!filter.test(mail)) {
        document.getElementById("msg3").innerHTML = "invalid Mail-id";
        flag6=0;
    
    } else {
        document.getElementById("msg3").innerHTML = "";
        flag6=1;
       
    }
}


function adds() {

    var user = document.getElementById("fourth").value;
    var letters = /[A-Z][a-z]* [A-Z][a-z]*/;
    if(user=='')
    {
        document.getElementById("msg4").innerHTML = "";
    }
    else if (!letters.test(user)) {
        document.getElementById("msg4").innerHTML = "Address should contain two Words starting should be captial";
        flag7=0;
    }
    else{
        document.getElementById("msg4").innerHTML = "";
        flag7=1;
    }
}

function un() {
    var fileInput =
        document.getElementById('d');
    var filePath = fileInput.value;
    // Allowing file type
    var allowedExtensions =
        /(\.pdf)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('only files allowed');
        fileInput.value = '';
        return false;
    } else {
    
    }
}






