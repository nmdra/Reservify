function validate() {
    var pw = document.getElementById("psw").value;
    var username = document.getElementById("uname").value;
    var validateSpan = document.getElementById("validate");

    if (username.length < 5 || username.length > 15) {
        validateSpan.innerHTML = "Username must be 5 to 15 characters long";
        return false;
    }

    if (pw.length < 8 || pw.length > 15) {
        validateSpan.innerHTML = "Password must be 8 to 15 characters long";
        return false;
    }
}