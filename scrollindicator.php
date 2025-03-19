<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Poultry Scroll Progress Egg</title>
    <style>
        /* Egg-Shaped Progress Wrapper */
        .progress-wrapper {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 75px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom, #f8d67a, #f4b400);
            border-radius: 50% 50% 40% 40%; /* Egg Shape */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            text-align: center;
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: #8b5e3b; /* Brown */
            transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        }

        /* Glow Effect When Scrolling */
        .glow {
            box-shadow: 0 8px 20px rgba(255, 165, 0, 0.8);
            transform: scale(1.1);
        }

        /* SVG Progress Circle */
        .progress-circle {
            transform: rotate(-90deg);
        }

        /* Chicken SVG */
        .chicken-icon {
            position: absolute;
            bottom: 21%;
            width: 60px;
            height: 60px;
        }

        /* Percentage Number */
        .progress-text {
            position: absolute;
            font-size: 16px;
            top: 70%;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

    <!-- Egg-Shaped Circular Progress Indicator -->
    <div class="progress-wrapper" id="progressWrapper">
        <svg width="60" height="60">
            <circle cx="30" cy="30" r="25" stroke="#d9a066" stroke-width="5" fill="none"></circle>
            <circle id="progressCircle" class="progress-circle" cx="30" cy="30" r="25" stroke="#ff6b00" stroke-width="5" stroke-linecap="round" fill="none"
                stroke-dasharray="157" stroke-dashoffset="157"></circle>
        </svg>
        <img src="./Images/chickicon.png" class="chicken-icon" alt="Chicken">
        <div class="progress-text" id="progressText">0%</div>
    </div>

    <script>
        // Update Progress Indicator on Scroll
        window.onscroll = function () { updateProgressCircle(); };

        function updateProgressCircle() {
            let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            let scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrollPercentage = (scrollTop / scrollHeight) * 100;

            let circle = document.getElementById("progressCircle");
            let text = document.getElementById("progressText");
            let wrapper = document.getElementById("progressWrapper");

            let dashOffset = 157 - (scrollPercentage / 100) * 157;
            circle.style.strokeDashoffset = dashOffset;
            text.textContent = Math.round(scrollPercentage) + "%";

            // Add glow effect when scrolling
            if (scrollPercentage > 5) {
                wrapper.classList.add("glow");
            } else {
                wrapper.classList.remove("glow");
            }
        }
    </script>

</body>
</html>
