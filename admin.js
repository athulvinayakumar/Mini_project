$(document).ready(function () {
    $("form").submit(function (e) {
        if (flag1 != 1 || flag2 != 1 || flag3 != 1 || flag4 != 1) {
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

function pro_size() {
    var pass = document.getElementById("d").value;
    if (pass < 11) {
        var pwd_expression = /^[0-9]{0,2}$/;

        if (!pwd_expression.test(pass)) {
            document.getElementById("message4").innerHTML = "Atleast 2 Numbers Required";
            flag3 = 0;
        } else {
            document.getElementById("message4").innerHTML = "";
            flag3 = 1;
        }
    } else {
        document.getElementById("message4").innerHTML = "Below 11";
        flag3 = 0;
    }
}

function colour() {
    var name = document.getElementById("a").value;
    var letters = /^[a-z]{3,5}$/i;

    if (!letters.test(name)) {
        document.getElementById("message5").innerHTML = "Alphabets Required";
        flag4 = 0;
    } else {
        document.getElementById("message5").innerHTML = "";
        flag4 = 1;
    }
}