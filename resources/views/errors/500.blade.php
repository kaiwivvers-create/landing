<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Missing Page?</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@0,400;0,900;1,400&family=Inter:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
        }

        #error-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to bottom, #E0E7FF 0%, #F5F7FF 50%, #FFFFFF 100%);
            padding: 0 5%;
        }

        /* Decorative Background Polaroids */
        .bg-polaroid {
            position: absolute;
            width: 140px;
            height: 160px;
            background: white;
            padding: 8px;
            padding-bottom: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 2px;
            filter: blur(3px) brightness(0.95);
            opacity: 0.3;
            pointer-events: none;
            z-index: 5;
        }

        .bg-polaroid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background: #eee;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(var(--base-rotate));
            }

            50% {
                transform: translateY(-20px) rotate(calc(var(--base-rotate) + 5deg));
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .bg-polaroid-1 {
            top: 15%;
            left: 10%;
            --base-rotate: -15deg;
            transform: rotate(-15deg);
        }

        .bg-polaroid-2 {
            top: 75%;
            right: 12%;
            --base-rotate: 12deg;
            transform: rotate(12deg);
            animation-delay: 2s;
        }

        .image-block {
            position: relative;
            width: 250px;
            aspect-ratio: 3/4;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            z-index: 10;
            flex-shrink: 0; /* Prevent the blocks from being squashed */
            display: none;
            /* Hidden on mobile */
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
        }

        .image-block:hover {
            transform: scale(1.1) translateY(-20px) rotate(0deg) !important;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.4);
            z-index: 50;
        }

        @media (min-width: 1024px) {
            .image-block {
                display: block;
            }
        }

        .image-block-left {
            --idle-rotate: -5deg;
            animation: slideInLeft 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards, 
                       subtleFloat 6s ease-in-out infinite 1.2s;
        }

        .image-block-right {
            --idle-rotate: 5deg;
            animation: slideInRight 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards, 
                       subtleFloat 6s ease-in-out infinite 1.4s;
        }

        @keyframes subtleFloat {
            0%, 100% { transform: translateY(0) rotate(var(--idle-rotate)); }
            50% { transform: translateY(-15px) rotate(calc(var(--idle-rotate) + 2deg)); }
        }

        .message-container {
            text-align: center;
            z-index: 20;
            flex: 1;
            padding: 0 20px;
        }

        .message-text {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 5vw, 4rem);
            font-weight: 900;
            color: #1e293b;
            line-height: 1.2;
            margin-bottom: 40px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            padding: 16px 32px;
            background: #0f172a;
            color: white;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.5s forwards;
        }

        .back-btn:hover {
            background: #4f46e5;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(79, 70, 229, 0.4);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px) rotate(-15deg);
            }

            to {
                opacity: 1;
                transform: translateX(0) rotate(-5deg);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px) rotate(15deg);
            }

            to {
                opacity: 1;
                transform: translateX(0) rotate(5deg);
            }
        }
    </style>
</head>

<body>
    <section id="error-section">
        <!-- Floating background stuff -->
        <div class="bg-polaroid bg-polaroid-1 animate-float">
            <img src="https://i.pinimg.com/736x/dc/71/1f/dc711f5a25804b66aa7a65484de88a60.jpg" alt="Aesthetic">
        </div>
        <div class="bg-polaroid bg-polaroid-2 animate-float">
            <img src="https://i.pinimg.com/736x/0f/25/01/0f2501f2adc01de038b75f7bb32dd22e.jpg" alt="Aesthetic">
        </div>

        <!-- Left Image Block -->
        <div class="image-block image-block-left">
            <img src="https://i.pinimg.com/736x/92/2d/93/922d933c1625f49d86e6657344bdec70.jpg"
                style="width:100%; height:100%; object-fit:cover;" alt="Character">
        </div>

        <!-- Message -->
        <div class="message-container">
            <h1 class="message-text">
                What were you looking for?
            </h1>
            <a href="/" class="back-btn">
                <i class="fas fa-home" style="margin-right: 10px;"></i>
                Back to Home
            </a>
        </div>

        <!-- Right Image Block -->
        <div class="image-block image-block-right">
            <img src="https://i.pinimg.com/736x/51/b6/03/51b6035dc3c51ba7f629ed099bbf7ac8.jpg"
                style="width:100%; height:100%; object-fit:cover;" alt="Character">
        </div>
    </section>
</body>

</html>