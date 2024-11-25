function validation() {
    var message1 = document.formfill.message1.value;
    var message2 = document.formfill.message2.value;

    if (message1 == "") {
        document.getElementById("result1").innerHTML = "Type your inquiry*";
        return false;
    } else {
        document.getElementById("result1").innerHTML = "";
    }

    if (message2 == "") {
        document.getElementById("result2").innerHTML = "Write down the assistance you need*";
        return false;
    } else {
        document.getElementById("result2").innerHTML = "";
    }

    return true; // Both fields are filled
}
