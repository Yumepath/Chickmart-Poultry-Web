<?php
session_start();
include("dbconnection.php"); // Include database connection

if (isset($_POST['register_btn'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    
    // Verify reCAPTCHA
    $secretKey = "6Lcr2ekqAAAAAFbsrzTYZc0KTd-ApsYW6zq5-ANK";
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse";
    $response = file_get_contents($verifyUrl);
    $responseData = json_decode($response);
    
    if (!$responseData->success) {
        $_SESSION['status'] = "CAPTCHA verification failed. Please try again.";
        $_SESSION['status_type'] = "error";
        header("Location: login.php");
        exit();
    }
    
    // Sanitize inputs
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid email format! Please include '@'.";
        $_SESSION['status_type'] = "error";
        header("Location: login.php");
        exit();
    }

    // Check if email already exists
    $check_email = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['status'] = "Email already registered!";
        $_SESSION['status_type'] = "error";
        header("Location: login.php");
        exit();
    } else {
        // Hash password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data (REMOVED storing plain password)
        $query = "INSERT INTO user (fname, lname, email, password) 
                  VALUES ('$fname', '$lname', '$email', '$hashed_password')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['status'] = "Registration successful! You can now log in.";
            $_SESSION['status_type'] = "success";
        } else {
            $_SESSION['status'] = "Registration failed. Try again.";
            $_SESSION['status_type'] = "error";
        }
    }

    header("Location: login.php");
    exit();
}?>