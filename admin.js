$(document).ready(function () {
    $("form").submit(function (e) {
        if (flag1 != 1 || flag2 != 1 || flag3 != 1 ) {
            e.preventDefault();
        }

    });
})

flag1 = 0;
flag2 = 0;
flag3 = 0;
flag4 = 0;


function product() {
    var user = document.getElementById("b").value;
    var letters = /^[A-Z ]{1,10}$/i;

    if (!letters.test(user)) {
        document.getElementById("message2").innerHTML = "Product field required alphabet characters at least 10";
        flag1 = 0;
    } else {
        document.getElementById("message2").innerHTML = "";
        flag1 = 1;
    }

}

function pro_qnt() {
    var user = document.getElementById("d").value;
    var letters = /^[0-9]{1,2}$/;

    if (!letters.test(user)) {
        document.getElementById("message4").innerHTML = "Numbers only";
        flag3 = 0;
    } else {
        document.getElementById("message4").innerHTML = "";
        flag3 = 1;
    }

}


function pro_price() {
    var pass = document.getElementById("c").value;
    var pwd_expression = /^[0-9]{3,5}$/;

    if (!pwd_expression.test(pass)) {
        document.getElementById("message3").innerHTML = "Atmost 5 Numbers Required";
        flag2 = 0;
    } else {
        document.getElementById("message3").innerHTML = "";
        flag2 = 1;
    }
}



// function discriptions() {
//     var name = document.getElementById("a").value;
//     var letters = /^[a-z 0-9]{3,300}$/i;

//     if (!letters.test(name)) {
//         document.getElementById("message5").innerHTML = "Alphabets Required";
//         flag4 = 0;
//     } else {
//         document.getElementById("message5").innerHTML = "";
//         flag4 = 1;
//     }
// }
function unames() {
    var fileInput =
        document.getElementById('e');
    var filePath = fileInput.value;
    // Allowing file type
    var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!allowedExtensions.exec(filePath)) {
        // $('#Update').attr("disabled", true);
        alert('only image files allowed');
        fileInput.value = '';
        return false;
    } else {
        // $('#Update').attr("disabled", false);
    }
}