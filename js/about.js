$(document).ready(function () {
    $(".contact-form .submit-btn").click(function () {
        let isValid = true;

        $(".form-group input, .form-group textarea").removeClass("error valid");
        $(".error-message").text("").hide();

        const name = $(".name").val().trim();
        const nameRegex = /^[A-Za-z\s]+$/;

        if (!nameRegex.test(name)) {
            $(".name").addClass("error");
            $(".name-error").text("Name must contain only letters").show();
            isValid = false;
        } else {
            $(".name").addClass("valid");
        }

        const email = $(".email").val().trim();
        const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        if (!emailPattern.test(email)) {
            $(".email").addClass("error");
            $(".email-error").text("Only valid Gmail addresses allowed").show();
            isValid = false;
        } else {
            $(".email").addClass("valid");
        }

        const message = $(".message").val().trim();
        const messagePattern = /^[a-zA-Z0-9 ]+$/;

        if (!messagePattern.test(message)) {
            $(".message").addClass("error");
            $(".message-error").text("Special characters are not allowed").show();
            isValid = false;
        } else {
            $(".message").addClass("valid");
        }

        return isValid;
    });
});
