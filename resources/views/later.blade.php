<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Not Yet</title>

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

        #camera-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to bottom, #E0E7FF 0%, #F5F7FF 50%, #FFFFFF 100%);
        }

        /* Background Decorative Polaroids */
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
            opacity: 0.4;
            pointer-events: none;
            z-index: 5;
            transition: all 1s ease-in-out;
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
            top: 65%;
            left: 5%;
            --base-rotate: 10deg;
            transform: rotate(10deg);
            animation-delay: 1s;
        }

        .bg-polaroid-3 {
            top: 10%;
            right: 12%;
            --base-rotate: 12deg;
            transform: rotate(12deg);
            animation-delay: 2s;
        }

        .bg-polaroid-4 {
            top: 75%;
            right: 8%;
            --base-rotate: -8deg;
            transform: rotate(-8deg);
            animation-delay: 1.5s;
        }

        .bg-polaroid-5 {
            top: 40%;
            left: 15%;
            width: 100px;
            height: 120px;
            --base-rotate: -5deg;
            transform: rotate(-5deg);
            filter: blur(5px);
            opacity: 0.3;
            animation-delay: 3s;
        }

        .bg-polaroid-6 {
            top: 35%;
            right: 18%;
            width: 110px;
            height: 130px;
            --base-rotate: 7deg;
            transform: rotate(7deg);
            filter: blur(4px);
            opacity: 0.35;
            animation-delay: 0.5s;
        }

        .message-container {
            text-align: center;
            z-index: 10;
            padding: 20px;
        }

        .message-text {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 5vw, 3.5rem);
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

        @media (max-width: 768px) {
            .bg-polaroid {
                width: 80px;
                height: 100px;
            }

            .bg-polaroid-5,
            .bg-polaroid-6 {
                display: none;
            }
        }
    </style>
</head>

<body>
    <section id="camera-section">
        <!-- Decorative Background Polaroids -->
        <div class="bg-polaroid bg-polaroid-1 animate-float">
            <img src="https://i.pinimg.com/736x/1e/04/f8/1e04f88101d471bac7e076666cbaa085.jpg" alt="Vintage Flower">
        </div>
        <div class="bg-polaroid bg-polaroid-2 animate-float">
            <img src="https://i.pinimg.com/736x/dc/71/1f/dc711f5a25804b66aa7a65484de88a60.jpg" alt="Pink Aesthetic">
        </div>
        <div class="bg-polaroid bg-polaroid-3 animate-float">
            <img src="https://i.pinimg.com/736x/0f/25/01/0f2501f2adc01de038b75f7bb32dd22e.jpg" alt="Blue Sea">
        </div>
        <div class="bg-polaroid bg-polaroid-4 animate-float">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=300&auto=format&fit=crop"
                alt="Beach">
        </div>
        <div class="bg-polaroid bg-polaroid-5 animate-float">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=300&auto=format&fit=crop"
                alt="Mountains">
        </div>
        <div class="bg-polaroid bg-polaroid-6 animate-float">
            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=300&auto=format&fit=crop"
                alt="Lake">
        </div>

        <div class="message-container">
            <h1 class="message-text">
                Maybe now is not the best time for that.
            </h1>
            <a href="/" class="back-btn">
                <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>
                Go Back Home
            </a>
        </div>
    </section>
</body>

</html>