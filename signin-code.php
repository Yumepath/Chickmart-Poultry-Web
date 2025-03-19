<?php
session_start();
include("dbconnection.php"); // Database connection

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA
    $secretKey = "6Lcr2ekqAAAAAFbsrzTYZc0KTd-ApsYW6zq5-ANK"; // Secret Key Captcha
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse";
    $response = file_get_contents($verifyUrl);
    $responseData = json_decode($response);

    if (!$responseData->success) {
        $_SESSION['status'] = "CAPTCHA verification failed. Please try again.";
        $_SESSION['status_type'] = "error";
        header("Location: login.php");
        exit();
    }

    // Sanitize user input
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid email format! Please include '@'.";
        $_SESSION['status_type'] = "error";
        header("Location: login.php");
        exit();
    }

    // Login Attemp Check
    $stmt = $conn->prepare("SELECT failed_attempts, attempt_time FROM login_attempts WHERE email = ? ORDER BY attempt_time DESC LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $attempt = $result->fetch_assoc();

    if ($attempt && $attempt['failed_attempts'] >= 3 && strtotime($attempt['attempt_time']) > time() - (15 * 60)) {
        $_SESSION['status'] = "Too many failed attempts! Try again later.";
        $_SESSION['status_type'] = "error";
        header("Location: login.php");
        exit();
    }

    // Check if email exists in database
    $query = "SELECT * FROM user WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['fname'];
            $_SESSION['role'] = $row['role'];

            // Reset failed attempts on successful login
            $stmt = $conn->prepare("INSERT INTO login_attempts (email, ip_address, user_agent, status, attempt_time, failed_attempts)
                VALUES (?, ?, ?, 'success', NOW(), 0)");
            $stmt->bind_param("sss", $email, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
            $stmt->execute();
            if ($row['role'] == 'admin') {
                $_SESSION['redirect'] = "admin-dashboard.php";
            } else {
                $_SESSION['redirect'] = "dashboard.php";
            }

            // Success message for login
            $_SESSION['status'] = "Login Successful!";
            $_SESSION['status_type'] = "success";
            $_SESSION['redirect'] = "dashboard.php"; // Store redirect page

            // Set cookies for persistent login (valid for 30 days)
            setcookie("user_id", $row['id'], time() + (30 * 24 * 60 * 60), "/");
            setcookie("username", $row['fname'], time() + (30 * 24 * 60 * 60), "/");

            header("Location: login.php"); // Redirect to login.php to trigger SweetAlert
            exit();
        } else {
            // Failed login - Update failed attempts
            $failed_attempts = $attempt ? $attempt['failed_attempts'] + 1 : 1;
            $stmt = $conn->prepare("INSERT INTO login_attempts (email, ip_address, user_agent, status, attempt_time, failed_attempts)
                VALUES (?, ?, ?, 'failed', NOW(), ?)");
            $stmt->bind_param("sssi", $email, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], $failed_attempts);
            $stmt->execute();

            $_SESSION['status'] = "Wrong Credentials. Attempt $failed_attempts of 3.";
            $_SESSION['status_type'] = "error";
        }
    } else {
        $_SESSION['status'] = "Wrong Credentials.";
        $_SESSION['status_type'] = "error";
    }

    header("Location: login.php"); // Redirect back to login page on failure
    exit();
}
?>
