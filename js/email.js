function validateForm() {
    const emailField = document.querySelector('input[name="email"]');
    const email = emailField.value;
    var validateSpan = document.getElementById("validate");
    const phoneField = document.querySelector('input[name="phone"]');
    const phone = phoneField.value

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var phonePattern = /^\d{10}$/;

    if (!email.match(emailPattern)) {
        validateSpan.innerHTML = "Enter a valid email address";
        return false;
    }

    if (!phone.match(phonePattern)) {
        validateSpan.innerHTML = "Please enter a valid 10-digit phone number.";
        return false;
    }
    return true;
}
