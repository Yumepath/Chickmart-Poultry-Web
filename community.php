<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poultry Social</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8f8f8;
            color: white;
            overflow-x: hidden;
        }

        /* Floating Community Button */
        .community-btn {
            position: fixed;
            left: 20px;
            top: 83%;
            transform: translateY(-50%);
            width: 65px;
            height: 65px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(255, 145, 0, 0.6);
            transition: all 0.3s ease-in-out;
            animation: float 2s infinite ease-in-out alternate;
            z-index: 1000;
            background: linear-gradient(to right, #ffcc00, #ff9900);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .community-btn img {
            width: 70%;
            height: 70%;
            object-fit: cover;
            filter: drop-shadow(0 0 5px white);
        }

        .community-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 0 25px #ff9900;
        }

        /* Floating Animation */
        @keyframes float {
            0% {
                transform: translateY(-50%) translateX(0px);
            }

            100% {
                transform: translateY(-50%) translateX(10px);
            }
        }

        /* Sidebar Container */
        .social-sidebar {
            position: fixed;
            left: -260px;
            top: 83%;
            transform: translateY(-50%);
            background: #f8f8f8;
            backdrop-filter: blur(15px);
            border-radius: 15px;
            width: 250px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(255, 145, 0, 0.6);
            transition: all 0.5s ease-in-out;
            z-index: 999;
            opacity: 0;
        }

        /* Show Sidebar when active */
        .social-sidebar.active {
            left: 80px;
            opacity: 1;
        }

        /* Social Media Links */
        .social-sidebar a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            background: #d1cfcf;
            margin: 8px 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1)
        }

        /* Neon Glow Hover Effect */
        .social-sidebar a:hover {
            background: rgba(255, 145, 0, 0.6);
            transform: translateX(10px);
            box-shadow: 0 0 10px rgba(255, 145, 0, 0.6);
        }

        .social-sidebar a img {
            width: 28px;
            height: 28px;
            margin-right: 12px;
            transition: 0.3s;
        }

        /* Hover Effect for Images */
        .social-sidebar a:hover img {
            transform: scale(1.2);
        }

        /* Ripple Animation */
        .social-sidebar a::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 145, 0, 0.6);
            transition: all 0.6s;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
        }

        .social-sidebar a:hover::before {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0;
        }
    </style>
</head>

<body>
    <!-- social-sidebar.php -->
    <div class="community-btn" id="communityBtn">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Community">
    </div>

    <div class="social-sidebar" id="socialSidebar">
        <a href="https://facebook.com" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/145/145802.png" alt="Facebook"> Facebook
        </a>
        <a href="https://discord.com" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/5968/5968756.png" alt="Discord"> Discord
        </a>
        <a href="https://t.me" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="Telegram"> Telegram
        </a>
        <a href="https://twitter.com" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"> Twitter
        </a>
    </div>

    <script>
        document.getElementById("communityBtn").addEventListener("click", function() {
            document.getElementById("socialSidebar").classList.toggle("active");
        });
    </script>


</body>

</html>