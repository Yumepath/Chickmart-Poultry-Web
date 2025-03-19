<?php
session_start();

include("dbconnection.php");

// User login checkerrr
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$statusMessage = $_SESSION['status'] ?? "";
$statusType = $_SESSION['status_type'] ?? "info";

// Clear the session after displaying the alert
unset($_SESSION['status']);
unset($_SESSION['status_type']);
$statusMessage = isset($_SESSION['status']) ? $_SESSION['status'] : '';
unset($_SESSION['status']);

$user_id = $_SESSION['user_id'];
$query = "SELECT fname, lname, email FROM user WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($fname, $lname, $email);
$stmt->fetch();
$stmt->close();
if (isset($_POST['update_profile'])) {
    $new_fname = $_POST['fname'];
    $new_lname = $_POST['lname'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];

    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE user SET fname=?, lname=?, email=?, password=? WHERE id=?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssssi", $new_fname, $new_lname, $new_email, $hashed_password, $user_id);
    } else {
        $update_query = "UPDATE user SET fname=?, lname=?, email=? WHERE id=?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("sssi", $new_fname, $new_lname, $new_email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['status'] = "Profile updated successfully!";
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['status'] = "Update failed. Try again.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ChickMart</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f7b733, #fc4a1a);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }

        /* === Responsive Overlay === */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            display: none;
            opacity: 0;
            transition: opacity 0.4s ease-in-out, backdrop-filter 0.4s ease-in-out;
        }

        #product-info {
            position: fixed;
            /* Keeps it centered on the screen */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Ensures exact centering */
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            padding: 30px;
            width: 380px;
            max-width: 90%;
            /* Ensures responsiveness */
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease-out;
        }

        .show {
            display: block !important;
            opacity: 1 !important;
            transform: translate(-50%, -50%);
        }


        /* === Hide Animation === */
        .hide {
            opacity: 0 !important;
            transform: translate(-50%, -50%) scale(0.8) rotateX(30deg);
        }

        /* === Close Button === */
        .close-btn {
            position: absolute;
            top: 8px;
            right: 12px;
            font-size: 22px;
            cursor: pointer;
            color: #ff4d4d;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .close-btn:hover {
            transform: scale(1.3);
            color: #d60000;
        }

        /* === Product Image === */
        #product-img {
            width: 150px;
            height: 150px;
            margin-bottom: 12px;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        /* Click to Zoom */
        #product-img.zoomed {
            transform: scale(2);
        }

        #product-img:hover {
            transform: scale(1.05);
        }

        /* === Responsive Product Name === */
        #product-name {
            font-size: 24px;
            font-weight: bold;
            color: #222;
            margin-bottom: 10px;
        }

        /* === Responsive Product Description === */
        #product-description {
            font-size: 16px;
            color: #444;
            padding: 0 15px;
        }

        /* === Responsive Okay Button === */
        .okay-btn {
            display: inline-block;
            background: linear-gradient(135deg, #28a745, #218838);
            color: white;
            padding: 12px 28px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 15px;
            transition: transform 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
        }

        .okay-btn:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #218838, #1c7a33);
            box-shadow: 0 8px 20px rgba(0, 128, 0, 0.4);
        }

        /* === Background Overlay Animation === */
        .overlay-show {
            display: block !important;
            opacity: 1 !important;
        }

        /* === Product Card Hover Animation === */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* === Improved Pop-up Bounce Animation === */
        @keyframes popIn {
            0% {
                transform: translate(-50%, -45%) scale(0.5) rotateX(30deg);
                opacity: 0;
            }

            60% {
                transform: translate(-50%, -50%) scale(1.1) rotateX(-2deg);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1) rotateX(0deg);
            }
        }

        /* === RESPONSIVE STYLES === */
        @media screen and (max-width: 768px) {
            #product-info {
                width: 90%;
                max-width: 320px;
                padding: 20px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(1);
            }

            #product-img {
                width: 120px;
                height: 120px;
            }

            #product-name {
                font-size: 20px;
            }

            #product-description {
                font-size: 14px;
            }

            .okay-btn {
                font-size: 16px;
                padding: 10px 24px;
            }
        }

        /* Even Smaller Screens (Phones) */
        @media screen and (max-width: 480px) {
            #product-info {
                width: 95%;
                max-width: 300px;
                padding: 15px;
            }

            #product-img {
                width: 100px;
                height: 100px;
            }

            #product-name {
                font-size: 18px;
            }

            #product-description {
                font-size: 13px;
            }

            .okay-btn {
                font-size: 14px;
                padding: 8px 20px;
            }
        }

        /* Enhanced Modal Appearance */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-content {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            animation: popIn 0.3s ease-in-out;
        }

        /* Smooth Pop-in Animation */
        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Modal Input Fields */
        .modal input {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s ease-in-out;
            outline: none;
        }

        /* Input Focus Effect */
        .modal input:focus {
            border-color: #fc4a1a;
            box-shadow: 0 0 8px rgba(252, 74, 26, 0.5);
        }

        /* Improved Save Button */
        .modal button {
            width: 100%;
            background: #fc4a1a;
            color: white;
            padding: 12px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            font-size: 16px;
            font-weight: bold;
        }

        .modal button:hover {
            background: #f7b733;
            transform: scale(1.05);
        }

        /* Enhanced Close Button */
        .modal .close {
            position: absolute;
            right: 15px;
            top: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #fc4a1a;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .modal .close:hover {
            color: #f7b733;
            transform: scale(1.2);
        }

        /* Animated Success Alert */
        .alert-box {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            animation: fadeInOut 3s ease-in-out;
        }

        /* Alert Animation */
        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            20% {
                opacity: 1;
                transform: translateY(0);
            }

            80% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }


        .container {
            max-width: 600px;
            margin: auto 0;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.6s ease-in-out;
        }

        /* Back & Logout Buttons */
        .header-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .btn {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 8px;
            background: #fc4a1a;
            transition: 0.3s ease-in-out;
        }

        .btn:hover {
            background: #f7b733;
            transform: scale(1.05);
        }

        /* Profile Section */
        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            transition: 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile:hover {
            transform: scale(1.03);
        }

        .profile-pic img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 3px solid #fc4a1a;
        }

        .user-info h2 {
            margin: 0;
            font-size: 22px;
        }

        .user-info p {
            color: #777;
        }

        /* Order Status Section */
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        /* Order Section */
        .order-section h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
        }

        /* Order Status Boxes */
        .order-status {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .order-box {
            background: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            width: 120px;
        }

        .order-box img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .order-box p {
            font-size: 14px;
            color: #555;
            font-weight: 600;
        }

        /* Click-to-Zoom Feature */
        .zoomable {
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .zoomed {
            transform: scale(2);
            /* Makes image 2x bigger */
        }


        /* Hover Effect */
        .order-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        /* Active Order */
        .order-box.active {
            color: white;
        }

        .order-box.active p {
            color: #555;
        }

        /* Recommendations */
        h3 {
            margin-top: 30px;
            font-size: 22px;
            color: #333;
        }

        .recommendations {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Product Cards */
        .product-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            width: 150px;
        }

        .product-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .product-card h4 {
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }

        /* Hover Effect */
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>

<body>
    <div id="alertBox" class="alert <?php echo $statusType; ?>" style="display: none;">
        Welcome Back! <?php echo $_SESSION['username']; ?> <?php echo $statusMessage; ?>
    </div>


    <div class="container">
        <div class="header-buttons">
            <a href="javascript:history.back()" class="btn">&#8592; Back</a>
            <a href="#" class="btn" onclick="confirmLogout()">Logout</a>
        </div>

        <div class="profile">
            <div class="profile-pic">
                <img src="Images/profilepic.jpg" alt="User">
            </div>
            <div class="user-info">
                <h2><?php echo htmlspecialchars($fname . " " . $lname); ?></h2>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>
            <button class="btn" onclick="document.getElementById('editModal').style.display='flex'">Edit Profile</button>
        </div>
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('editModal').style.display='none'">&times;</span>
                <h3>Edit Profile</h3>
                <form method="POST">
                    <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>" required><br>
                    <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>" required><br>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>
                    <input type="password" name="password" placeholder="New Password (optional)"><br>
                    <button type="submit" name="update_profile">Save Changes</button>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let statusMessage = "<?php echo isset($_SESSION['status']) ? $_SESSION['status'] : ''; ?>";
                if (statusMessage) {
                    showAlert(statusMessage);

                    // Clear session status using AJAX
                    fetch("clear_session.php").then(response => response.text());
                }
            });
            document.addEventListener("DOMContentLoaded", function() {
                // Check if there's a session status and show it
                const statusMessage = "<?php echo isset($_SESSION['status']) ? $_SESSION['status'] : ''; ?>";
                if (statusMessage) {
                    showAlert(statusMessage);
                    <?php unset($_SESSION['status']); ?> // Remove status after displaying
                }
            });

            // Show success alert instantly
            function showAlert(message) {
                let alertBox = document.createElement("div");
                alertBox.classList.add("alert-box");
                alertBox.textContent = message;
                document.body.appendChild(alertBox);
                alertBox.style.display = "block";

                setTimeout(() => {
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }, 3000);
            }

            // Close modal and show alert instantly on form submit
            document.querySelector("form").addEventListener("submit", function() {
                showAlert("Profile updated successfully!");
                document.getElementById('editModal').style.display = 'none';
            });
        </script>
        <div class="order-section">
            <h3>My Orders</h3>
            <div class="order-status">
                <div class="order-box" onclick="location.href='topay.html'">
                    <img src="Images/topay.png" alt="To Pay">
                    <p>To Pay</p>
                </div>
                <div class="order-box" onclick="location.href='toship.html'">
                    <img src="Images/toship.png" alt="To Ship">
                    <p>To Ship</p>
                </div>
                <div class="order-box active" onclick="location.href='toreceive.html'">
                    <img src="./Images/torecieve.png" alt="To Receive">
                    <p>To Receive</p>
                </div>
                <div class="order-box" onclick="location.href='completed.html'">
                    <img src="Images/completed.png" alt="Completed">
                    <p>Completed</p>
                </div>
            </div>
        </div>

        <h3>You Might Also Like</h3>
        <div class="recommendations">
            <div class="product-card" onclick="showProductInfo('Broiler', 'A high-quality broiler chicken, perfect for meat production.', 'Images/birds.png')">
                <img src="Images/birds.png" alt="Broiler">
                <h4>Broiler</h4>
            </div>
            <div class="product-card" onclick="showProductInfo('Eggs', 'Fresh and organic eggs, rich in protein and essential nutrients.', 'Images/eggs.png')">
                <img src="Images/eggs.png" alt="Eggs">
                <h4>Eggs</h4>
            </div>
        </div>

        <!-- Background Overlay -->
        <div id="overlay" onclick="closeProductInfo()"></div>

        <!-- Product Information Modal -->
        <div id="product-info">
            <div class="product-info-card">
                <span class="close-btn" onclick="closeProductInfo()">✖</span>
                <img id="product-img" src="" alt="Product Image">
                <h4 id="product-name"></h4>
                <p id="product-description"></p>
                <button class="okay-btn" onclick="closeProductInfo()">Okay</button>
            </div>
        </div>

        <script>
            function showProductInfo(name, description, imgSrc) {
                document.getElementById("product-name").innerText = name;
                document.getElementById("product-description").innerText = description;
                let productImg = document.getElementById("product-img");
                productImg.src = imgSrc;

                let modal = document.getElementById("product-info");
                let overlay = document.getElementById("overlay");

                modal.style.display = "block";
                overlay.style.display = "block";

                setTimeout(() => {
                    modal.classList.remove("hide");
                    modal.classList.add("show");
                    overlay.classList.add("overlay-show");
                }, 50);

                // Reset zoom when opening new product
                productImg.classList.remove("zoomed");
            }

            // Function to close modal
            function closeProductInfo() {
                let modal = document.getElementById("product-info");
                let overlay = document.getElementById("overlay");

                modal.classList.add("hide");
                overlay.classList.remove("overlay-show");

                setTimeout(() => {
                    modal.classList.remove("show");
                    modal.style.display = "none";
                    overlay.style.display = "none";
                }, 400);
            }

            // Click-to-Zoom Feature for Product Image
            document.addEventListener("DOMContentLoaded", function() {
                const productImg = document.getElementById("product-img");

                productImg.addEventListener("click", function() {
                    this.classList.toggle("zoomed");
                });
            });
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let alertBox = document.getElementById("alertBox");
                if (alertBox.textContent.trim() !== "") {
                    alertBox.style.display = "block";

                    setTimeout(() => {
                        alertBox.style.opacity = "0";
                        setTimeout(() => alertBox.remove(), 500);
                    }, 3000); // Hide after 3 seconds
                }
            });
        </script>
        <script>
            function confirmLogout() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you really want to log out?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e74c3c",
                    cancelButtonColor: "#2ecc71",
                    confirmButtonText: "Yes, Logout",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "logout.php"; // Redirect if confirmed
                    }
                });
            }
        </script>

        <style>
            .alert {
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                font-weight: bold;
                display: flex;
                align-items: center;
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
                transition: opacity 0.5s ease-in-out;
            }

            .alert.error {
                background: #dc3545;
            }
        </style>


</body>

</html>