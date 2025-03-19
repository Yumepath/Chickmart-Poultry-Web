<?php
session_start();
session_destroy();

// Delete cookies by setting them to expire in the past
setcookie("user_id", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");

header("Location: login.php");
exit();
?>