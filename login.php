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
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <!-- SweetAlert2 & Google reCAPTCHA -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* Style the terms and conditions checkbox container */
        .form-inner form .field button {
            border-radius: none;
            box-shadow: none;
        }

        button[name="login_btn"] {
            width: 100%;
            border: none;
            padding: 12px;
            background: #f39c12;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: none;
            /* Remove box-shadow */
            outline: none;
        }

        button[name="login_btn"]:hover {
            background: #e67e22;
        }

        .animated-btn {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(45deg, #ffcc00, #ff8800);
            border: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: all 0.4s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 136, 0, 0.4);
        }

        /* Subtle Scaling on Hover */
        .animated-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(255, 136, 0, 0.6);
        }

        /* Click Effect */
        .animated-btn:active {
            transform: scale(0.95);
        }

        /* Glowing Border Effect */
        .animated-btn::before {
            content: "";
            position: absolute;
            width: 150%;
            height: 150%;
            background: radial-gradient(circle, rgba(255, 223, 0, 0.4) 0%, rgba(255, 136, 0, 0) 70%);
            top: -50%;
            left: -50%;
            transition: all 0.4s ease-in-out;
            border-radius: 50%;
            opacity: 0;
        }

        /* Glow on Hover */
        .animated-btn:hover::before {
            opacity: 1;
            width: 200%;
            height: 200%;
        }



        .terms-checkbox {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #555;
        }

        .form-inner form .terms-checkbox {
            position: relative;
            padding: 15px;
            display: flex;
            flex-wrap: wrap;
            box-shadow: none !important;
        }

        .form-inner form .terms-checkbox:hover {
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
                        <div class="login_btn">
                            <button type="submit" name="login_btn" class="animated-btn">
                                <i class="fas fa-sign-in-alt"></i> Signin
                            </button>

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
                                I accept the <a href="termsandrecomd.php" target="_blank">Terms and Conditions</a>
                            </label>
                        </div>


                        <div class="g-recaptcha" data-sitekey="6Lcr2ekqAAAAAG81HVxz6mNC57XRXbrQvYocUA9R"></div>
                        <div class="signin-link"><a href="login.php">Already have an account?</a></div>
                        <div class="register_btn">
                            <button type="submit" name="register_btn" class="animated-btn" id="signup-btn">
                                <i class="fas fa-sign-in-alt"></i> Signin
                            </button>
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