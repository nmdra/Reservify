function validate() {
    var pw = document.getElementById("psw").value;
    var username = document.getElementById("uname").value;
    var validateSpan = document.getElementById("validate");
    var email = document.getElementById("email").value;
    
    if (username.length < 5 || username.length > 15) {
        validateSpan.innerHTML = "Username must be 5 to 15 characters long";
        return false;
    }

    // Validate email format using regex
    var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    if (!email.match(emailRegex)) {
        validateSpan.innerHTML = "Enter a valid email address";
        return false;
    }

    if (pw.length < 8 || pw.length > 15) {
        validateSpan.innerHTML = "Password must be 8 to 15 characters long";
        return false;
    }
}