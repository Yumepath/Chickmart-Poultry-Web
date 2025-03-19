<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChickMart Login Form</title>
    <link rel="icon" type="image/png" href="./Images/chickmartlogo.png">
    <link rel="stylesheet" href="./css/test.css">

    <!-- SweetAlert2 & Google reCAPTCHA -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* Style the terms and conditions checkbox container */
        .terms-checkbox {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #555;
        }
        .form-inner form .terms-checkbox{
            position: relative;
            padding: 15px;
            display: flex;
            flex-wrap: wrap;
            box-shadow: none !important;
        }
        .form-inner form .terms-checkbox:hover{
            transform: none !important;
        }

        /* Hide the default checkbox */
        .terms-checkbox input[type="checkbox"] {
            display: none;
        }

        /* Custom checkbox styling */
        .custom-checkbox-terms {
            width: 18px;
            height: 18px;
            border: 2px solid #3085d6;
            border-radius: 4px;
            position: relative;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Checkmark animation */
        .terms-checkbox input[type="checkbox"]:checked+label .custom-checkbox-terms::after {
            content: '✔';
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
            font-size: 14px;
            color: white;
            font-weight: bold;
            opacity: 1;
            transition: all 0.3s ease-in-out;
        }

        /* Checkbox background animation */
        .terms-checkbox input[type="checkbox"]:checked+label .custom-checkbox-terms {
            background: #3085d6;
            border-color: #3085d6;
            box-shadow: 0 0 8px rgba(48, 133, 214, 0.6);
        }

        /* Hover effect */
        .custom-checkbox-terms:hover {
            transform: scale(1.1);
        }

        /* Terms and conditions link style */
        .terms-checkbox label a {
            color: #3085d6;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .terms-checkbox label a:hover {
            color: #ff6b6b;
        }
        
    </style>

</head>

<body>

    <div class="wrapper">
        <a href="javascript:history.back()" class="back-button">&#8592; Back</a>
        <div class="all-ani">
            <div class="title-text">
                <div class="profile-container">
                    <img src="./Images/profile.png" width="100" height="100" alt="Profile Picture">
                </div>
            </div>

            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slider" id="login" checked>
                    <input type="radio" name="slider" id="signup">
                    <label for="login" class="slide login">Signin</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slide-tab"></div>
                </div>

                <div class="form-inner">
                    <!-- Sign in Form -->
                    <form action="signin-code.php" method="POST" class="login" onsubmit="return validateEmail('login-email')">
                        <div class="field">
                            <input type="email" id="login-email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="field">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Lcr2ekqAAAAAG81HVxz6mNC57XRXbrQvYocUA9R"></div>
                        <div class="pass-link"><a href="password-reset.php">Forgot Password?</a></div>
                        <div class="field">
                            <input type="submit" name="login_btn" value="Signin">
                        </div>
                    </form>

                    <!-- Sign up Form -->
                    <form action="signup-code.php" method="POST" class="signup"
                        onsubmit="return validateEmail('signup-email')"
                        id="signup-form">
                        <div class="field flex">
                            <input type="text" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="field flex">
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </div>
                        <div class="field">
                            <input type="email" id="signup-email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="field">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="field terms-checkbox">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">
                                <span class="custom-checkbox-terms"></span>
                                I accept the <a href="terms-and-conditions.php" target="_blank">Terms and Conditions</a>
                            </label>
                        </div>


                        <div class="g-recaptcha" data-sitekey="6Lcr2ekqAAAAAG81HVxz6mNC57XRXbrQvYocUA9R"></div>
                        <div class="signin-link"><a href="login.php">Already have an account?</a></div>
                        <div class="field">
                            <input type="submit" name="register_btn" value="Signup" id="signup-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("signup-btn").addEventListener("click", function(event) {
            if (!document.getElementById("terms").checked) {
                event.preventDefault(); // Prevent form submission
                Swal.fire({
                    title: "Terms Required",
                    text: "You must accept the Terms and Conditions to register.",
                    icon: "warning",
                    confirmButtonText: "Okay"
                });
            }
        });
    </script>

    <script>
        function validateEmail(inputId) {
            let email = document.getElementById(inputId).value;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                Swal.fire({
                    title: "Invalid Email!",
                    text: "Please enter a valid email address.",
                    icon: "warning",
                    confirmButtonText: "Okay"
                });
                return false;
            }
            return true;
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($_SESSION['status'])): ?>
                Swal.fire({
                    title: "<?php echo $_SESSION['status_type'] == 'error' ? 'Error!' : 'Success!'; ?>",
                    text: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_type'] == 'error' ? 'error' : 'success'; ?>",
                    confirmButtonColor: "<?php echo $_SESSION['status_type'] == 'error' ? '#d33' : '#3085d6'; ?>",
                    confirmButtonText: "Okay"
                }).then(() => {
                    <?php if (isset($_SESSION['redirect']) && $_SESSION['status_type'] == 'success'): ?>
                        window.location.href = "<?php echo $_SESSION['redirect']; ?>"; // Redirect on success
                    <?php endif; ?>

                    // Clear session messages after alert
                    fetch('clear-session.php');
                });

                <?php
                unset($_SESSION['status']);
                unset($_SESSION['status_type']);
                unset($_SESSION['redirect']); // Clear redirect session
                ?>
            <?php endif; ?>
        });
    </script>

    <script src="./scripts/login.js"></script>

</body>

</html>