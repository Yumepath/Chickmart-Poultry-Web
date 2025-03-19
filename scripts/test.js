document.addEventListener("DOMContentLoaded", function() {
    const formWrapper = document.querySelector(".form-wrapper");
    const loginToggle = document.getElementById("login-toggle");
    const signupToggle = document.getElementById("signup-toggle");
    const formContainer = document.querySelector(".form-container");

    signupToggle.addEventListener("click", function() {
        formWrapper.style.transform = "translateX(-50%)";
        formContainer.style.height = "auto"; // Adjusts height dynamically
        loginToggle.classList.remove("active");
        signupToggle.classList.add("active");
    });

    loginToggle.addEventListener("click", function() {
        formWrapper.style.transform = "translateX(0)";
        formContainer.style.height = "auto"; // Adjusts height dynamically
        signupToggle.classList.remove("active");
        loginToggle.classList.add("active");
    });

    // Adjust height dynamically based on active form
    function adjustFormHeight() {
        let activeForm = document.querySelector(".form-wrapper .active-form");
        if (activeForm) {
            formContainer.style.height = activeForm.offsetHeight + "px";
        }
    }

    // Call height adjustment after transition
    formWrapper.addEventListener("transitionend", adjustFormHeight);
});
