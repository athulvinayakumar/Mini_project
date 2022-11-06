
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
        var letters = /[A-Z][a-z]* [A-Z][a-z]*/;
         if (!letters.test(name)) { 
            document.getElementById("message1").innerHTML = "Firstname and should Start with capital Letter";
            flag1=0;
        } else {
            document.getElementById("message1").innerHTML = "";
            flag1=1;
        }
    }1 

    
    function users() {
        var users = document.getElementById("fifth").value;
        var letters = /^[A-Za-z]+$/;
         if (!letters.test(users)) {
            document.getElementById("message5").innerHTML = "Username field required alphabet characters";
            flag2=0;
        } else {
            document.getElementById("message5").innerHTML = "";
            flag2=1;
        }
    }


    function passs() {
        var pass = document.getElementById("sixth").value;
        var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
        
        if (!pwd_expression.test(pass)) {
            document.getElementById("message6").innerHTML = "Upper case,Lower case,Special character and Numeric letter need";
            flag3=0;
        } else {
            document.getElementById("message6").innerHTML = "";
            flag3=1;
        }
    }

    function conpasss() {
        var pass = document.getElementById("sixth").value;
        var cpass = document.getElementById("seventh").value;

        if (pass != cpass) {
            document.getElementById("message7").innerHTML = "Password not match";
            flag4=0;

        } else {
            document.getElementById("message7").innerHTML = "";
            flag4=1;
        }
    }

    function numbers() {
        var mobile = document.getElementById("second").value;
        var letters = /^[6-9][0-9]{9}$/;
        // var letters = /[8-9]{3}-[8-9]{3}-[0-9]{4}/
        
         if (!letters.test(mobile)) {
            document.getElementById("message2").innerHTML = "Number field require number";
            flag5=0;
        } else {
            document.getElementById("message2").innerHTML = "";
            flag5=1;
        }
    }

    function mails() {

        var mail = document.getElementById("third").value;
        var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!filter.test(mail)) {
            document.getElementById("message3").innerHTML = "invalid Mail-id";
            flag6=0;
        
        } else {
            document.getElementById("message3").innerHTML = "";
            flag6=1;
           
        }
    }


    function adds() {
    
        var user = document.getElementById("fourth").value;
        var letters = /^[A-Za-z]+$/;
        if(user=='')
        {
            document.getElementById("message4").innerHTML = "";
        }
        else if (!letters.test(user)) {
            document.getElementById("message4").innerHTML = "Address field required alphabet characters";
            flag7=0;
        }
        else{
            document.getElementById("message4").innerHTML = "";
            flag7=1;
        }
    }
    


    // function signup() {
       

    //     document.getElementById('login_error').innerHTML = "";

    //     var fn1 = unames();
    //     var fn2 = numbers();
    //     var fn3 = mails();
    //     var fn4 = conpasss();
    //     var fn5 = passs();
    //     var fn6 = users();
    //     var fn7 = adds();

    //     var name, mobile, user, pass, cpass, mail;
    //     name = document.getElementById("first").value;
    //     mobile = document.getElementById("second").value;
    //     mail = document.getElementById("third").value;
    //     address = document.getElementById("fourth").value;
    //     user = document.getElementById("fifth").value;
    //     pass = document.getElementById("sixth").value;
    //     cpass = document.getElementById("seventh").value;

    //     if (name == "") {
    //         document.getElementById("message1").innerHTML = "Please enter your name";
    //         return false;
    //     } else if (mobile == "") {
    //         document.getElementById("message2").innerHTML = "Please enter your number";
    //         return false;
    //     } else if (mail == "") {
    //         document.getElementById("message3").innerHTML = "Please enter your mail-id";
    //         return false;
    //     } else if (address == "") {
    //         document.getElementById("message3").innerHTML = "Please enter your address";
    //         return false;
    //     } else if (user == "") {
    //         document.getElementById("message4").innerHTML = "Please enter your username";
    //         return false;
    //     } else if (pass == "") {
    //         document.getElementById("message5").innerHTML = "Please enter your password";
    //         return false;
    //     } else if (cpass == "") {
    //         document.getElementById("message6").innerHTML = "Please enter your comform password";
    //         return false;
    //     } else if (fn1 == false || fn2 == false || fn3 == false || fn4 == false || fn5 == false || fn6 == false || f7 == false) {
    //         return false;
    //     } else {
    //         return true;
    //     }

    // }

    // function reset() {
    //     document.getElementById("first").value = "";
    //     document.getElementById("second").value = "";
    //     document.getElementById("third").value = "";
    //     document.getElementById("fourth").value = "";
    //     document.getElementById("fifth").value = "";
    //     document.getElementById("sixth").value = "";
    //     document.getElementById("seventh").value = "";
    //     document.getElementById("message1").innerHTML = "";
    //     document.getElementById("message2").innerHTM = "";
    //     document.getElementById("message3").innerHTM = "";
    //     document.getElementById("message4").innerHTM = "";
    //     document.getElementById("message5").innerHTM = "";
    //     document.getElementById("message6").innerHTM = "";
    // }









// // // firstname
// document.getElementById('nf').addEventListener('input', nameValidator);//namevalid... is a callback function

// var btn = document.getElementById('btn-submit');

// var txtfeild1 = document.getElementById('nf').value;
// var txtfeild2 = document.getElementById('nu').value;
// var txtfeild3 = document.getElementById('sp').value;
// var txtfeild4 = document.getElementById('cps').value;
// var txtfeild5 = document.getElementById('nm').value;
// var txtfeild6 = document.getElementById('me').value;
// var txtfeild7 = document.getElementById('da').value;

// if (txtfeild1 == '' || txtfeild2 == '' || txtfeild3 == '' || txtfeild4 == '' || txtfeild5 == '' || txtfeild6 == '' || txtfeild7 == '')
//  {
//     btn.disabled = true;
// }
// else
// {
//     btn.disabled = false;
// }


// function nameValidator(event) {
//     let val = event.target.value;//target is a predefined keyword
//     if (!val.match(/^[A-Z][^0-9]+$/)) {
//         document.getElementById("fna").innerHTML = "Firstname should Start with capital Letter";
//         btn.disabled = true;
//         return false;

//     }
//     else if (val.length < 5) {
//         document.getElementById("fna").innerHTML = "Name should contain atleast 5 characters!";
//         btn.disabled = true;
//         return false;
//     }
//     else {
//         document.getElementById('fna').innerHTML = "";
//         btn.disabled = false;
//         return true;
//     }

// }



// //   username

// document.getElementById('nu').addEventListener('input', nuValidator);//namevalid... is a callback function



// function nuValidator(event) {
//     let val = event.target.value;//target is a predefined keyword
//     if (!val.match(/^[a-z]/)) {
//         document.getElementById("usrnm").innerHTML = "Alphabet only";
//         btn.disabled = true;
//         return false;
//     }
//     else if (val.length < 5) {
//         document.getElementById("usrnm").innerHTML = "Name should contain atleast 5 characters!";
//         btn.disabled = true;
//         return false;
//     }
//     else {
//         document.getElementById('usrnm').innerHTML = "";
//         btn.disabled = false;
//         return true;
//     }

// }

// // Password

// document.getElementById('sp').addEventListener('input', passwordValidator);

// function passwordValidator(event) {
//     let val = event.target.value;
//     if (!val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)) {
//         document.getElementById('ssrd').innerHTML = "Password should contain atleast between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character";
//         btn.disabled = true;
//         return false;

//     }
//     else {
//         document.getElementById('ssrd').innerHTML = "";
//         btn.disabled = false;
//         return true;
//     }
// }



// // Confirm pass
// document.getElementById('cps').addEventListener('input', confirmValidator);
// function confirmValidator(event) {
//     let val = event.target.value;
//     var oldpass = document.getElementById('sp').value;

//     if (!val.match(oldpass)) {
//         document.getElementById('ssd').innerHTML = "Password does not match!";
//         btn.disabled = true;
//         return false;

//     }
//     else {
//         document.getElementById('ssd').innerHTML = "";
//         btn.disabled = false;
//         return true;
//     }
// }


// // Mobile

// document.getElementById('nm').addEventListener('input', mobileValidator);
// function mobileValidator(event) {
//     let val = event.target.value;
//     if (!val.match(/^[7-9][0-9]{1,9}$/)) {
//         document.getElementById('ile').innerHTML = "Only Numbers are allowed and must contain 10 number";
//         btn.disabled = true;
//         return false;
//     }
//     else {
//         document.getElementById('ile').innerHTML = "";
//         btn.disabled = false;
//         return true;

//     }
// }


// // Email
// document.getElementById('me').addEventListener('input', emailValidator);

// function emailValidator(event) {
//     let val = event.target.value;
//     if (!val.match(/([A-z0-9_\-\.]){1,}\@([A-z0-9_\-\.]){1,}\.([A-Za-z]){2,4}$/)) {
//         document.getElementById('mla').innerHTML = "Enter a Valid Email";
//         btn.disabled = true;
//         return false;
//     }
//     else {
//         document.getElementById('mla').innerHTML = "";
//         btn.disabled = false;
//         return true;
//     }
// }



// // address

// document.getElementById('da').addEventListener('input', addressValidator);

// function addressValidator(event) {
//     let val = event.target.value;
//     if (!val.match(/^[A-Z][^0-9]+$/)) {
//         document.getElementById('dre').innerHTML = "Start with a Capital letter";
//         btn.disabled = true;
//         return false;
        
//     }
//     document.getElementById('dre').innerHTML = "";
//     btn.disabled = false;
//     return true;
// }
// // function validations(e) {
// //     var name = nameValidator();
// //     alert(name)
// //     var username = nuValidator();
// //     var pass = passwordValidator();
// //     var confpass = confirmValidator();
// //     var mobile = mobileValidator();
// //     var emailvalid = emailValidator();
// //     var addressval = addressValidator();
// //     console.log(name);
// //     if(name==false || username==false || pass==false || confpass==false || mobile==false || emailvalid==false || addressval==false){
// //         return false;
// //     }
// //     else {return true;}
// // }



