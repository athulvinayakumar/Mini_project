$(document).ready(function () {
    $("form").submit(function (e) {
        if (flag1 != 1 || flag2 != 1) {
            e.preventDefault();
        }

    });
})

flag1 = 0;
flag2 = 0;


function product() {
    var user = document.getElementById("b").value;
    var letters = /^[A-Za-z]{1,10}$/;

    if (!letters.test(user)) {
        document.getElementById("message2").innerHTML = "Product field required alphabet characters at least 6";
        flag1 = 0;
    } else {
        document.getElementById("message2").innerHTML = "";
        flag1 = 1;
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