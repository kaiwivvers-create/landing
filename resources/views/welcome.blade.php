<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sasaki (por)t Folio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@0,400;0,900;1,400&family=Inter:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Critical Styles Injected Directly to Bypass Build Issues -->
    <style>
        .content-blur {
            filter: blur(12px) brightness(0.8) !important;
            pointer-events: none;
        }

        .camera-sink {
            animation: cameraSink 1.2s cubic-bezier(0.5, 0, 0.2, 1) forwards;
            pointer-events: none;
        }

        @keyframes cameraSink {
            0% {
                transform: translateY(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }

            100% {
                transform: translateY(200px) scale(0.8);
                opacity: 0;
                filter: blur(10px);
            }
        }

        .polaroid-card {
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: none;
            position: absolute;
            visibility: hidden;
        }

        .scatter-1 {
            transform: translate(-180%, -60%) scale(1) rotate(-15deg) !important;
            opacity: 1 !important;
        }

        .scatter-2 {
            transform: translate(-50%, -85%) scale(1) rotate(5deg) !important;
            opacity: 1 !important;
        }

        .scatter-3 {
            transform: translate(80%, -65%) scale(1) rotate(18deg) !important;
            opacity: 1 !important;
        }

        .scatter-4 {
            transform: translate(-180%, -60%) scale(1) rotate(8deg) !important;
            opacity: 1 !important;
        }

        .scatter-5 {
            transform: translate(-50%, -85%) scale(1) rotate(-5deg) !important;
            opacity: 1 !important;
        }

        .scatter-6 {
            transform: translate(80%, -65%) scale(1) rotate(-12deg) !important;
            opacity: 1 !important;
        }

        .scatter-7 {
            transform: translate(-220%, -30%) scale(1) rotate(-8deg) !important;
            opacity: 1 !important;
        }

        .scatter-8 {
            transform: translate(-50%, -105%) scale(1) rotate(12deg) !important;
            opacity: 1 !important;
        }

        .scatter-9 {
            transform: translate(120%, -30%) scale(1) rotate(5deg) !important;
            opacity: 1 !important;
        }

        .font-handwriting {
            font-family: 'Dancing Script', cursive;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .modal-blur-active {
            filter: blur(15px) brightness(0.8) !important;
        }

        /* --- ZERO-DEPENDENCY CORE LAYOUT --- */
        #main-content {
            min-height: 100vh;
        }

        .flex {
            display: flex !important;
        }

        .flex-col {
            flex-direction: column !important;
        }

        .items-center {
            align-items: center !important;
        }

        .justify-center {
            justify-content: center !important;
        }

        .justify-between {
            justify-content: space-between !important;
        }

        .relative {
            position: relative !important;
        }

        .absolute {
            position: absolute !important;
        }

        .inset-0 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .container {
            width: 100% !important;
            max-width: 1280px !important;
            margin-left: auto !important;
            margin-right: auto !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
        }

        @media (min-width: 768px) {
            .md\:flex-row {
                flex-direction: row !important;
            }
        }

        /* Typography Failsafes */
        h1 {
            font-size: clamp(2.5rem, 8vw, 6rem) !important;
            line-height: 1.1 !important;
        }

        p {
            font-size: clamp(1rem, 2vw, 1.5rem) !important;
        }

        /* --- FINAL BRUTE-FORCE LAYOUT --- */
        .hero-grid {
            display: grid !important;
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
            width: 100% !important;
            max-width: 1200px !important;
            margin: 0 auto !important;
            padding: 80px 20px !important;
            align-items: center !important;
            text-align: center !important;
        }

        @media (min-width: 1024px) {
            .hero-grid {
                grid-template-columns: 1fr 1fr !important;
                text-align: left !important;
            }
        }

        h1 {
            font-size: clamp(3rem, 10vw, 5.5rem) !important;
            color: white !important;
            line-height: 1 !important;
            margin-bottom: 20px !important;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5) !important;
        }

        .hero-image-container {
            display: flex !important;
            justify-content: center !important;
        }

        @media (min-width: 1024px) {
            .hero-image-container {
                justify-content: flex-end !important;
            }
        }

        .hero-image-container div {
            transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
        }

        .hero-image-container div:hover {
            transform: rotate(0deg) scale(1.05) !important;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6) !important;
        }

        /* --- CAMERA FIXES (Zero-Dependency) --- */
        #camera-trigger {
            background-color: #1e293b !important;
            border-bottom: 10px solid #0f172a !important;
            border-radius: 20px !important;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.5) !important;
        }

        .camera-lens {
            background-color: #0f172a !important;
            border: 8px solid #334155 !important;
            border-radius: 50% !important;
        }

        .camera-flash {
            background-color: #334155 !important;
            border-radius: 4px !important;
        }

        #camera-section {
            padding-top: 0 !important;
            margin-top: -50px !important;
        }

        #hero {
            background-size: cover !important;
            background-position: center !important;
            min-height: 100vh !important;
            display: flex !important;
            align-items: center !important;
        }

        #main-content,
        #hero,
        #camera-section,
        #polaroids-section {
            transition: filter 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.8s ease;
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

        @keyframes glowPulse {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 0.9;
                transform: scale(1.15);
            }
        }

        .animate-glow {
            animation: glowPulse 6s ease-in-out infinite;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .bg-polaroid-1 {
            top: 15%;
            left: 10%;
            --base-rotate: -15deg;
            transform: rotate(-15deg);
            animation-delay: 0s;
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

        @media (max-width: 768px) {
            .bg-polaroid {
                width: 60px;
                height: 75px;
                padding: 4px;
                padding-bottom: 10px;
                filter: blur(1px) brightness(0.95);
                z-index: 5;
            }

            .bg-polaroid-1 {
                top: 10%;
                left: 5%;
            }

            .bg-polaroid-2 {
                bottom: 10%;
                left: 5%;
                top: auto;
            }

            .bg-polaroid-3 {
                top: 10%;
                right: 5%;
            }

            .bg-polaroid-4 {
                bottom: 10%;
                right: 5%;
                top: auto;
            }

            .bg-polaroid-5,
            .bg-polaroid-6 {
                display: none;
            }
        }

        /* Mobile Scatter Fixes - COMPACT FOR SMALL SCREENS */
        @media (max-width: 640px) {
            .polaroid-card {
                width: 140px;
                /* Force smaller cards on mobile */
            }

            .polaroid-card img {
                height: 140px !important;
                /* Force square ratio on mobile */
            }

            .scatter-1 {
                transform: translate(-85%, -70%) scale(0.9) rotate(-10deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-2 {
                transform: translate(-50%, -105%) scale(0.9) rotate(5deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-3 {
                transform: translate(-15%, -70%) scale(0.9) rotate(12deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-4 {
                transform: translate(-85%, -70%) scale(0.9) rotate(8deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-5 {
                transform: translate(-50%, -105%) scale(0.9) rotate(-5deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-6 {
                transform: translate(-15%, -70%) scale(0.9) rotate(-10deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-7 {
                transform: translate(-85%, -70%) scale(0.9) rotate(-8deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-8 {
                transform: translate(-50%, -105%) scale(0.9) rotate(10deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .scatter-9 {
                transform: translate(-15%, -70%) scale(0.9) rotate(5deg) !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            .polaroid-card {
                max-width: 85vw !important;
                max-height: 70vh !important;
            }

            .polaroid-card img {
                max-height: 140px !important;
                object-fit: cover !important;
            }
        }

        /* --- PRODUCTION PROOF STYLES (Internalized from app.css) --- */
        .content-blur {
            filter: blur(8px) brightness(0.9) !important;
            transition: filter 0.8s ease !important;
            pointer-events: none !important;
        }

        .basketball {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle at 30% 30%, #ff8c00, #b84d00);
            border-radius: 50%;
            position: fixed;
            z-index: 100;
            box-shadow: inset -5px -5px 15px rgba(0, 0, 0, 0.4), 0 10px 20px rgba(0, 0, 0, 0.3);
            display: none;
            pointer-events: none;
        }

        .basketball::before,
        .basketball::after {
            content: '';
            position: absolute;
            background: rgba(0, 0, 0, 0.3);
        }

        .basketball::before {
            width: 100%;
            height: 2px;
            top: 50%;
            left: 0;
        }

        .basketball::after {
            width: 2px;
            height: 100%;
            left: 50%;
            top: 0;
        }

        @keyframes basketballBounce {
            0% {
                transform: translate(120vw, -100px) rotate(0deg);
                opacity: 1;
            }

            20% {
                transform: translate(50vw, calc(50vh - 30px)) rotate(180deg);
            }

            40% {
                transform: translate(50vw, calc(50vh - 30px)) rotate(360deg);
            }

            100% {
                transform: translate(-120vw, calc(50vh - 300px)) rotate(1080deg);
                opacity: 0;
            }
        }

        .animate-basketball {
            display: block !important;
            animation: basketballBounce 4s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards !important;
        }

        .extra-card {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
            z-index: 110;
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .extra-card.show {
            opacity: 1 !important;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) scale(1) rotate(var(--tw-rotate)) !important;
        }

        .card-pos-1 {
            --tw-translate-x: -120%;
            --tw-translate-y: -50%;
            --tw-rotate: -10deg;
        }

        .card-pos-2 {
            --tw-translate-x: -50%;
            --tw-translate-y: -60%;
            --tw-rotate: 2deg;
        }

        .card-pos-3 {
            --tw-translate-x: 20%;
            --tw-translate-y: -50%;
            --tw-rotate: 12deg;
        }

        /* Nuclear Fix for Rogue Arrows */
        #sequence-arrow,
        .sequence-arrow {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }

        /* Premium Navigation Arrows */
        #prev-wave-arrow,
        #next-wave-arrow {
            width: 60px !important;
            height: 60px !important;
            background: rgba(255, 255, 255, 0.4) !important;
            backdrop-filter: blur(12px) !important;
            border: 2px solid white !important;
            border-radius: 50% !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
            color: #1e293b !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            z-index: 100 !important;
            cursor: pointer !important;
            pointer-events: auto !important;
        }

        #prev-wave-arrow:hover,
        #next-wave-arrow:hover {
            background: rgba(255, 255, 255, 0.7) !important;
            transform: translateY(-50%) scale(1.15) !important;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3) !important;
        }

        #prev-wave-arrow i,
        #next-wave-arrow i {
            font-size: 1.5rem !important;
        }

        .nav-hidden {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        @media (max-width: 640px) {

            #prev-wave-arrow,
            #next-wave-arrow {
                width: 45px !important;
                height: 45px !important;
            }

            #prev-wave-arrow {
                left: 1rem !important;
            }

            #next-wave-arrow {
                right: 1rem !important;
            }

            .extra-card.show {
                transform: translate(-50%, calc(-50% + var(--mobile-offset))) scale(0.8) !important;
            }

            .card-pos-1 {
                --mobile-offset: -150px;
            }

            .card-pos-2 {
                --mobile-offset: 0px;
            }

            .card-pos-3 {
                --mobile-offset: 150px;
            }
        }

        /* --- NEWSPAPER STYLES --- */
        #newspaper-trigger {
            width: 70px;
            height: 55px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-bottom: 5px solid #94a3b8;
            border-radius: 2px;
            position: relative;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            flex-direction: column;
            padding: 6px;
            gap: 3px;
            margin-top: 50px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        #newspaper-trigger:hover {
            transform: translateY(-8px) rotate(3deg);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .newspaper-icon-dot {
            width: 15px;
            height: 15px;
            background: #475569;
            border-radius: 2px;
            margin-bottom: 2px;
        }

        .newspaper-line {
            width: 100%;
            height: 2px;
            background: #cbd5e1;
            border-radius: 1px;
        }

        #newspaper-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            z-index: 100000;
            display: none;
            flex-direction: column;
            /* Changed from flex to column */
            align-items: center;
            justify-content: flex-start;
            /* Start from top to allow scrolling */
            opacity: 0;
            transition: opacity 0.6s ease;
            perspective: 2000px;
            overflow-y: auto;
            /* Enable scrolling */
            padding: 80px 20px;
            /* Space for the paper */
        }

        .newspaper-paper {
            width: 95%;
            max-width: 900px;
            min-height: auto;
            /* Removed min-height to allow content to define it */
            background: #fdfaf3;
            padding: 60px;
            box-shadow: 0 60px 120px rgba(0, 0, 0, 0.6);
            transform: scale(0.8) rotateX(20deg) translateY(50px);
            transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            border: 1px solid #d1d5db;
            font-family: 'Playfair Display', serif;
            color: #1a1a1a;
            display: flex;
            flex-direction: column;
            margin-top: auto;
            margin-bottom: auto;
            /* This centers it vertically if content is small */
        }

        #newspaper-overlay.active {
            opacity: 1;
        }

        #newspaper-overlay.active .newspaper-paper {
            transform: scale(1) rotateX(0deg) translateY(0);
        }

        /* Center vertical fold line */
        .newspaper-paper::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 1px;
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.05), transparent);
            pointer-events: none;
        }

        .newspaper-header {
            border-bottom: 5px solid #1a1a1a;
            border-top: 2px solid #1a1a1a;
            padding: 20px 0;
            margin-bottom: 40px;
            text-align: center;
        }

        .newspaper-title {
            font-size: 5rem;
            /* LARGER */
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -3px;
            line-height: 0.8;
        }

        .newspaper-meta {
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            padding-top: 10px;
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            font-weight: 700;
        }

        .newspaper-meta span {
            color: #64748b;
            /* Lighter color for Vol and Time */
        }

        #newspaper-date {
            color: #1a1a1a !important;
            /* Much darker for the Date */
        }

        .newspaper-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* TWO BIG COLUMNS */
            gap: 60px;
            flex: 1;
        }

        .newspaper-column-left {
            border-right: 1px solid #eee;
            padding-right: 30px;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: white;
            border: 1px solid #e5e7eb;
            margin-bottom: 20px;
            text-decoration: none;
            color: inherit;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        }

        .social-link:hover {
            background: #1a1a1a;
            color: white;
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .social-link i {
            font-size: 2rem;
        }

        #close-newspaper {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #1a1a1a;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease;
            z-index: 10;
        }

        #close-newspaper:hover {
            transform: rotate(90deg) scale(1.2);
        }

        .newspaper-tagline {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.1;
            border-bottom: 1px solid #1a1a1a;
            padding-bottom: 15px;
        }

        @media (max-width: 1024px) {
            .newspaper-title {
                font-size: 3.5rem;
            }

            .newspaper-paper {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .newspaper-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .newspaper-column-left {
                border-right: none;
                padding-right: 0;
            }

            .newspaper-paper {
                min-height: auto;
                width: 98%;
            }
        }
    </style>



    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'], '../build')
</head>

<body class="bg-stone-50 text-slate-900 font-sans selection:bg-indigo-100 selection:text-indigo-900 overflow-x-hidden">
    <main id="main-content">
        <!-- Hero Section -->
        <section id="hero"
            class="relative min-h-screen flex items-center justify-center overflow-hidden transition-all duration-700"
            style="background-image: url('https://i.pinimg.com/736x/86/c5/a9/86c5a938dcda41d5c97660d0f5f60403.jpg'); background-size: cover; background-position: center;">
            <!-- Darkened Overlay for Text Readability -->
            <div class="absolute inset-0 bg-slate-900/30 z-0"></div>

            <!-- Periwinkle Fade at the Bottom -->
            <div
                class="absolute bottom-0 inset-x-0 h-64 md:h-[30rem] bg-gradient-to-t from-[#E0E7FF] via-[#E0E7FF] to-transparent z-10">
            </div>

            <!-- Abstract Background Orbs -->
            <div class="absolute inset-0 z-0 opacity-40">
                <div
                    class="absolute -top-24 -left-24 w-72 h-72 md:w-96 md:h-96 bg-blue-400/30 rounded-full blur-3xl animate-pulse">
                </div>
                <div
                    class="absolute top-1/2 -right-24 w-64 h-64 md:w-80 md:h-80 bg-indigo-500/20 rounded-full blur-3xl animate-pulse delay-700">
                </div>
            </div>

            <!-- Final Grid Container -->
            <div class="hero-grid relative z-10">
                <!-- Text Block -->
                <div class="z-20">
                    <h1 class="font-serif font-black">
                        My Recent<br /> <span style="color: #c7d2fe; font-style: italic;">Projects.</span>
                    </h1>
                    <p style="color: #E0E7FF; font-size: 1.5rem; margin-bottom: 30px; text-shadow: 0 2px 10px rgba(0,0,0,0.5);"
                        class="font-medium">
                        “One more animation won’t hurt”.
                    </p>
                    <div>
                        <a href="#camera-anchor"
                            style="display: inline-flex; align-items: center; padding: 16px 32px; background: #0f172a; color: white; border-radius: 50px; font-weight: bold; text-decoration: none; box-shadow: 0 10px 20px rgba(0,0,0,0.3); transition: 0.3s;"
                            onmouseover="this.style.background='#4f46e5'" onmouseout="this.style.background='#0f172a'">
                            Start Exploring
                            <svg style="width: 20px; height: 20px; margin-left: 8px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Image Block -->
                <div class="hero-image-container">
                    <div
                        style="position: relative; width: 100%; max-width: 450px; aspect-ratio: 3/4; border-radius: 20px; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.5); transform: rotate(3deg);">
                        <img src="https://i.pinimg.com/736x/92/2d/93/922d933c1625f49d86e6657344bdec70.jpg"
                            style="width: 100%; height: 100%; object-fit: cover;" alt="Character" />
                    </div>
                </div>
            </div>
            <!-- Decorative Elements -->
            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-indigo-500/20 blur-3xl rounded-full"></div>
            <div class="absolute -top-6 -right-6 w-32 h-32 bg-pink-500/20 blur-3xl rounded-full"></div>
            </div>
            </div>
        </section>

        <div id="camera-anchor" class="h-0"></div>

        <!-- Camera Section (Periwinkle Background) -->
        <section id="camera-section"
            class="relative min-h-screen flex flex-col items-center justify-center py-16 md:py-20 z-20"
            style="background: linear-gradient(to bottom, #E0E7FF 0%, #F5F7FF 50%, #FFFFFF 100%);">

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

            <div id="camera-container"
                class="relative transition-all duration-[1500ms] ease-in-out cursor-pointer group"
                style="display: flex; flex-direction: column; align-items: center;">
                <p class="mb-4 font-serif text-slate-500 uppercase tracking-[0.3em] text-sm font-bold">Ready to snap</p>

                <!-- The Vintage Camera (Built with CSS) -->
                <div id="camera-trigger"
                    class="relative w-64 h-48 sm:w-80 sm:h-56 flex flex-col items-center justify-center transition-transform duration-500 hover:scale-105">
                    <!-- Top Chrome Bar -->
                    <div class="absolute top-0 inset-x-0 h-4 bg-slate-700 rounded-t-xl" style="background: #334155;">
                    </div>

                    <!-- Lens -->
                    <div class="camera-lens w-32 h-32 sm:w-40 sm:h-40 relative flex items-center justify-center">
                        <div class="w-12 h-12 bg-slate-800 rounded-full"
                            style="background: #1e293b; border: 2px solid #334155;"></div>
                    </div>

                    <!-- Flash -->
                    <div class="absolute top-6 right-8 w-10 h-8 camera-flash"></div>

                    <!-- Viewfinder -->
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-20 h-10 bg-slate-800 rounded-t-lg border-x-[8px] border-t-[8px] border-slate-900 flex items-center justify-center"
                        style="background: #1e293b; border-color: #0f172a;">
                        <div class="w-12 h-4 bg-slate-950 rounded shadow-inner" style="background: #020617;"></div>
                    </div>

                    <!-- Shutter Button -->
                    <div class="absolute -top-4 right-8 w-10 h-6 bg-slate-700 rounded-md border-b-4 border-slate-900 active:translate-y-1 transition-transform"
                        style="background: #334155; border-color: #0f172a;">
                        <div class="absolute inset-x-2 top-1 h-1 bg-red-500/50 rounded-full animate-pulse"></div>
                    </div>
                </div>

                <p class="mt-8 font-serif text-slate-800 font-black text-xl italic drop-shadow-sm">Click to view</p>

                <!-- Newspaper Trigger -->
                <div id="newspaper-trigger" title="The Social Times">
                    <div class="flex items-center gap-2 mb-1">
                        <div class="newspaper-icon-dot"></div>
                        <div class="flex-1 space-y-1">
                            <div class="newspaper-line" style="height: 4px; background: #475569;"></div>
                            <div class="newspaper-line" style="width: 70%"></div>
                        </div>
                    </div>
                    <div class="newspaper-line"></div>
                    <div class="newspaper-line"></div>
                    <div class="newspaper-line" style="width: 50%"></div>
                </div>
            </div>


        </section>
    </main>

    <!-- OVERLAYS -->

    <!-- Wave 2 trigger arrow is now inside the polaroids section -->

    <!-- Polaroids Scatter Section -->
    <div id="polaroids-section" class="fixed inset-0" style="display: none; z-index: 9999; pointer-events: auto;">
        <button id="reset-camera"
            class="fixed top-8 left-8 z-50 flex items-center gap-2 px-6 py-3 bg-white shadow-2xl rounded-full font-bold text-slate-900 hover:bg-indigo-600 hover:text-white transition-all duration-300 pointer-events-auto">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Back to Camera
        </button>

        <button id="prev-wave-arrow"
            class="absolute z-[60] p-6 text-slate-800 hover:text-indigo-600 transition-all duration-300 hover:-translate-x-2 active:scale-90 flex items-center justify-center cursor-pointer pointer-events-auto"
            style="left: 1rem; top: 50%; transform: translateY(-50%); display: none;">
            <i class="fas fa-chevron-left text-4xl sm:text-6xl md:text-8xl"></i>
        </button>

        <button id="next-wave-arrow"
            class="absolute z-[60] p-6 text-slate-800 hover:text-indigo-600 transition-all duration-300 hover:translate-x-2 active:scale-90 flex items-center justify-center cursor-pointer pointer-events-auto"
            style="right: 1rem; top: 50%; transform: translateY(-50%);">
            <i class="fas fa-chevron-right text-4xl sm:text-6xl md:text-8xl"></i>
        </button>

        <div class="relative w-full h-full flex items-center justify-center perspective-[1500px] pointer-events-none">
            <div class="polaroid-card wave-1 absolute top-[50%] cursor-pointer" data-id="1">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src="https://cdn.cara.app/production/posts/c069dbe2-612a-469e-8ff4-23e1f5d85cc2/11648B0B-F053-430B-BFBB-51C05CC56EC5.jpg-rAJE4k3Maf9C_VVaH_Vmz-11648B0B-F053-430B-BFBB-51C05CC56EC5.jpg"
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[-2deg]">
                        Internship Attendance App</p>
                </div>
            </div>
            <div class="polaroid-card wave-1 absolute top-[50%] cursor-pointer" data-id="2">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src="https://cdn.cara.app/production/posts/1625e6d3-1d5b-4fd0-ac9b-8ad3610f5817/50FF2D67-FA49-4A78-AFCE-B1E67B5DA1A1.jpg-SlDjHqgG04pGJIuO78-R3-50FF2D67-FA49-4A78-AFCE-B1E67B5DA1A1.jpg"
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[3deg]">
                        InternFlow Protocol</p>
                </div>
            </div>
            <div class="polaroid-card wave-1 absolute top-[50%] cursor-pointer" data-id="3">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src="https://cdn.cara.app/production/posts/c1f3dc8b-89b2-4e61-9d28-668523406146/octopie-NwbLQn2r5VnHs5JsuTUzj-5D5A07B7-D2B4-435B-AC15-EC939E2F3471.jpg"
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[1deg]">
                        Omni-Track PKL</p>
                </div>
            </div>

            <!-- WAVE 2 CARDS -->
            <div class="polaroid-card wave-2 absolute top-[50%] cursor-pointer" data-id="4">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src=https://i.pinimg.com/736x/bf/60/d3/bf60d3e494431492f7bc72af50e5338f.jpg
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">FieldSync Aplha
                    </p>
                </div>
            </div>
            <div class="polaroid-card wave-2 absolute top-[50%] cursor-pointer" data-id="5">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src=https://m.media-amazon.com/images/M/MV5BMzEyZGM5NmEtMzBmYS00Yjk1LWJjNjYtY2E0OGYzMWIxMGNkXkEyXkFqcGc@._V1_QL75_UX500_CR0,0,500,281_.jpg
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">Nexus Intern
                        Portal</p>
                </div>
            </div>
            <div class="polaroid-card wave-2 absolute top-[50%] cursor-pointer" data-id="6">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src=https://i.imgur.com/9WIzEoq.jpeg class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">CoreAttend System
                    </p>
                </div>
            </div>

            <!-- WAVE 3 CARDS -->
            <div class="polaroid-card wave-3 absolute top-[50%] cursor-pointer" data-id="7">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src="https://i.pinimg.com/236x/9b/d8/d9/9bd8d9e193b402fb04b73d60a1c15a8e.jpg"
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[-1deg]">
                        Pulse Internship</p>
                </div>
            </div>
            <div class="polaroid-card wave-3 absolute top-[50%] cursor-pointer" data-id="8">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src="https://i.pinimg.com/236x/3c/49/7f/3c497ffe3e5a80d08123261256e051ea.jpg"
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[2deg]">
                        LogiTrack</p>
                </div>
            </div>
            <div class="polaroid-card wave-3 absolute top-[50%] cursor-pointer" data-id="9">
                <div
                    class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                    <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                        <img src="https://i.pinimg.com/236x/fa/ee/5c/faee5c90464099c7061c284a80f905df.jpg"
                            class="w-full h-full object-cover" />
                    </div>
                    <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">Elite Intern
                        Suite</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Expanded Polaroid Modal -->
    <div id="expanded-modal"
        class="fixed inset-0 flex items-center justify-center bg-white/95 backdrop-blur-2xl opacity-0 pointer-events-none transition-opacity duration-500"
        style="display: none; z-index: 999999 !important;">
        <button id="close-modal"
            class="absolute top-8 right-8 w-12 h-12 bg-slate-900 text-white rounded-full flex items-center justify-center hover:bg-indigo-600 hover:rotate-90 transition-all duration-300 shadow-lg pointer-events-auto">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="flex flex-col md:flex-row items-center justify-center gap-12 p-8 max-w-6xl w-full">
            <div id="modal-image-container"
                class="bg-white p-6 pb-24 shadow-[0_40px_100px_rgba(0,0,0,0.4)] rounded-sm transition-transform duration-700"
                style="transform: scale(0.9);">
                <div class="w-72 h-72 sm:w-[450px] sm:h-[450px] bg-slate-200 border border-slate-100 overflow-hidden">
                    <img id="modal-image" src="" class="w-full h-full object-cover" />
                </div>
                <p id="modal-caption" class="text-center mt-10 font-handwriting text-4xl text-slate-800"></p>
            </div>

            <div id="modal-info" class="flex-1 transition-all duration-700 delay-300 max-w-lg"
                style="opacity: 0; transform: translateX(30px);">
                <div
                    class="bg-white p-10 sm:p-14 rounded-[3rem] shadow-[0_40px_120px_rgba(0,0,0,0.15)] border border-slate-50">
                    <h2 id="modal-title"
                        class="text-4xl md:text-6xl font-serif font-black text-slate-900 mb-6 border-b-4 border-indigo-500/20 pb-4">
                        Project Title</h2>
                    <p id="modal-desc" class="text-lg md:text-xl text-slate-700 leading-relaxed font-medium mb-8">
                        This is a detailed explanation of the captured moment. It describes the feelings, the
                        atmosphere, and the memories associated with this photograph.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-indigo-600 font-bold text-xl group hover:text-indigo-800 transition-colors">
                        Explore full project
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCTION PROOF SCRIPT (Internalized from app.js) -->
    <script>
        window.addEventListener('load', () => {
            // Project data moved inside to ensure correct scope and prevent conflicts
            const projectData = {
                1: { title: "Internship Attendance App", desc: "Developed a streamlined digital solution to replace manual attendance logging for interns. This app enables real-time check-ins, location verification, and automated reporting, reducing administrative overhead for both students and supervisors.", link: "https://bryan.rplkodingan.com/pkl" },
                2: { title: "InternFlow Protocol", desc: "Currently defining the core architectural vision and user-journey mapping to ensure a scalable launch.", link: "/later" },
                3: { title: "Omni-Track PKL", desc: "Undergoing intensive R&D to optimize the logic flow before moving into the primary build phase.", link: "/later" },
                4: { title: "FieldSync Alpha", desc: "In the pre-development phase, focusing on strategic feature-set alignment and technical stack selection.", link: "/later" },
                5: { title: "Nexus Intern Portal", desc: "Conceptualizing the foundational data structures and backend logic for a seamless tracking experience.", link: "/later" },
                6: { title: "CoreAttend System", desc: "Project in early-stage ideation. Currently prioritizing high-level requirements and MVP scoping.", link: "/later" },
                7: { title: "Pulse Internship", desc: "Development roadmap is currently being finalized to align with modern performance benchmarks.", link: "/later" },
                8: { title: "LogiTrack", desc: "Executing the discovery phase to refine functional specifications and integration capabilities.", link: "/later" },
                9: { title: "Elite Intern Suite", desc: "Currently in stealth development while the primary design framework and logic are being established.", link: "/later" }
            };
            const mainContent = document.getElementById('main-content');
            const heroSection = document.getElementById('hero');
            const cameraSection = document.getElementById('camera-section');
            const cameraTrigger = document.getElementById('camera-trigger');
            const cameraContainer = document.getElementById('camera-container');
            const polaroidsSection = document.getElementById('polaroids-section');
            const polaroidCards = document.querySelectorAll('.polaroid-card');
            const resetButton = document.getElementById('reset-camera');
            const expandedModal = document.getElementById('expanded-modal');
            const closeModal = document.getElementById('close-modal');
            const modalImage = document.getElementById('modal-image');
            const modalCaption = document.getElementById('modal-caption');
            const modalTitle = document.getElementById('modal-title');
            const modalDesc = document.getElementById('modal-desc');
            const modalInfo = document.getElementById('modal-info');
            const modalImageContainer = document.getElementById('modal-image-container');
            const startExploringBtn = document.getElementById('start-exploring-btn');


            if (startExploringBtn) {
                startExploringBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = document.querySelector(startExploringBtn.getAttribute('href'));
                    if (target) {
                        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            }

            if (cameraTrigger) {
                cameraTrigger.addEventListener('click', () => {
                    if (cameraTrigger.classList.contains('snapped')) return;
                    cameraTrigger.classList.add('snapped');
                    if (cameraContainer) cameraContainer.classList.add('camera-sink');
                    if (mainContent) mainContent.classList.add('content-blur');

                    if (polaroidsSection) {
                        polaroidsSection.style.display = 'block';
                        setTimeout(() => {
                            polaroidsSection.style.opacity = '1';
                            currentWave = 1;
                            if (prevArrow) prevArrow.classList.add('nav-hidden');
                            if (nextArrow) {
                                nextArrow.classList.remove('nav-hidden');
                                nextArrow.style.opacity = '1';
                            }
                            document.body.style.overflow = 'hidden';
                            // Clear everything first
                            polaroidCards.forEach((card, index) => {
                                card.classList.remove(`scatter-${index + 1}`);
                                card.classList.remove(`scatter-${index + 4}`);
                                card.classList.remove(`scatter-${index + 7}`);
                                card.style.opacity = '0';
                                card.style.visibility = 'hidden';
                                card.style.pointerEvents = 'none';
                            });
                            // Show only wave-1
                            document.querySelectorAll('.wave-1').forEach((card, index) => {
                                setTimeout(() => {
                                    card.style.visibility = 'visible';
                                    card.classList.add(`scatter-${index + 1}`);
                                    card.style.opacity = '1';
                                    card.style.pointerEvents = 'auto';
                                }, index * 100 + 50);
                            });
                        }, 50);
                    }
                });
            }

            if (resetButton) {
                resetButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    cameraTrigger.classList.remove('snapped');
                    currentWave = 1;
                    if (prevArrow) prevArrow.classList.add('nav-hidden');
                    if (nextArrow) {
                        nextArrow.classList.remove('nav-hidden');
                        nextArrow.style.opacity = '1';
                    }
                    polaroidCards.forEach((card, index) => {
                        card.classList.remove(`scatter-${index + 1}`);
                        card.classList.remove(`scatter-${index + 4}`);
                        card.classList.remove(`scatter-${index + 7}`);
                        card.style.opacity = '0';
                        card.style.visibility = 'hidden';
                        card.style.pointerEvents = 'none';
                    });
                    if (polaroidsSection) {
                        polaroidsSection.style.opacity = '0';
                        setTimeout(() => {
                            polaroidsSection.style.display = 'none';
                        }, 500);
                    }
                    if (mainContent) mainContent.classList.remove('content-blur');
                    if (cameraContainer) cameraContainer.classList.remove('camera-sink');
                    document.body.style.overflow = '';
                });
            }

            const nextArrow = document.getElementById('next-wave-arrow');
            const prevArrow = document.getElementById('prev-wave-arrow');
            let currentWave = 1;
            if (nextArrow) {
                nextArrow.addEventListener('click', () => {
                    const prevWave = currentWave;
                    currentWave++;

                    // Hide current wave
                    document.querySelectorAll(`.wave-${prevWave}`).forEach((card, index) => {
                        const scatterNum = (prevWave - 1) * 3 + (index + 1);
                        card.classList.remove(`scatter-${scatterNum}`);
                        card.style.opacity = '0';
                        card.style.pointerEvents = 'none';
                        setTimeout(() => { if (currentWave !== prevWave) card.style.visibility = 'hidden'; }, 800);
                    });

                    // Show next wave with guaranteed animation
                    document.querySelectorAll(`.wave-${currentWave}`).forEach((card, index) => {
                        card.style.visibility = 'visible';
                        card.offsetHeight; // Force reflow
                        const scatterNum = (currentWave - 1) * 3 + (index + 1);

                        requestAnimationFrame(() => {
                            setTimeout(() => {
                                card.classList.add(`scatter-${scatterNum}`);
                                card.style.opacity = '1';
                                card.style.pointerEvents = 'auto';
                            }, index * 100 + 50);
                        });
                    });

                    // Navigation arrow visibility
                    if (currentWave > 1) {
                        prevArrow.classList.remove('nav-hidden');
                        prevArrow.style.opacity = '1';
                    }
                    if (currentWave === 3) {
                        nextArrow.classList.add('nav-hidden');
                    }
                });
            }

            if (prevArrow) {
                prevArrow.addEventListener('click', () => {
                    const prevWave = currentWave;
                    currentWave--;

                    // Hide current wave
                    document.querySelectorAll(`.wave-${prevWave}`).forEach((card, index) => {
                        const scatterNum = (prevWave - 1) * 3 + (index + 1);
                        card.classList.remove(`scatter-${scatterNum}`);
                        card.style.opacity = '0';
                        card.style.pointerEvents = 'none';
                        setTimeout(() => { if (currentWave !== prevWave) card.style.visibility = 'hidden'; }, 800);
                    });

                    // Show previous wave with guaranteed animation
                    document.querySelectorAll(`.wave-${currentWave}`).forEach((card, index) => {
                        card.style.visibility = 'visible';
                        card.offsetHeight; // Force reflow
                        const scatterNum = (currentWave - 1) * 3 + (index + 1);

                        requestAnimationFrame(() => {
                            setTimeout(() => {
                                card.classList.add(`scatter-${scatterNum}`);
                                card.style.opacity = '1';
                                card.style.pointerEvents = 'auto';
                            }, index * 100 + 50);
                        });
                    });

                    // Navigation arrow visibility
                    if (currentWave === 1) {
                        prevArrow.classList.add('nav-hidden');
                    }
                    if (currentWave < 3) {
                        nextArrow.classList.remove('nav-hidden');
                        nextArrow.style.opacity = '1';
                    }
                });
            }

            polaroidCards.forEach(card => {
                card.addEventListener('click', () => openModal(card));
            });

            function openModal(card) {
                const id = card.getAttribute('data-id');
                const img = card.querySelector('img');
                const p = card.querySelector('p');
                const caption = p ? p.innerText : "Discovery";

                // Debugging log to see what data is being pulled
                console.log("Opening Modal for ID:", id);

                const data = (id && projectData[id]) ? projectData[id] : { title: caption, desc: "A special moment from the collection.", link: "#" };

                console.log("Data pulled:", data);

                if (expandedModal) {
                    if (modalImage && img) modalImage.src = img.src;
                    if (modalCaption) modalCaption.innerText = caption;
                    if (modalTitle) modalTitle.innerText = data.title;
                    if (modalDesc) modalDesc.innerText = data.desc;

                    const exploreLink = expandedModal.querySelector('a');
                    if (exploreLink) exploreLink.href = data.link;

                    expandedModal.style.display = 'flex';
                    if (mainContent) mainContent.classList.add('modal-blur-active');
                    if (polaroidsSection) polaroidsSection.classList.add('modal-blur-active');

                    setTimeout(() => {
                        expandedModal.classList.remove('pointer-events-none', 'opacity-0');
                        expandedModal.classList.add('opacity-100');
                        if (modalImageContainer) modalImageContainer.style.transform = 'scale(1)';
                        if (modalInfo) {
                            modalInfo.style.opacity = '1';
                            modalInfo.style.transform = 'translateX(0)';
                        }
                    }, 10);
                }
            }

            // triggerBasketballSequence removed as per simplification

            if (closeModal) {
                closeModal.addEventListener('click', () => {
                    if (expandedModal) {
                        expandedModal.classList.remove('opacity-100');
                        expandedModal.classList.add('opacity-0');

                        if (mainContent) mainContent.classList.remove('modal-blur-active');
                        if (polaroidsSection) polaroidsSection.classList.remove('modal-blur-active');

                        if (modalImageContainer) modalImageContainer.style.transform = 'scale(0.9)';
                        if (modalInfo) {
                            modalInfo.style.opacity = '0';
                            modalInfo.style.transform = 'translateX(30px)';
                        }
                        setTimeout(() => {
                            expandedModal.style.display = 'none';
                            expandedModal.style.pointerEvents = 'none';
                        }, 500);
                    }
                });
            }

            document.querySelectorAll('.extra-card').forEach(card => {
                card.addEventListener('click', () => openModal(card));
            });

            // backFromBasketball removed as per simplification
            // --- NEWSPAPER DYNAMIC DATE/TIME ---
            const dateSpan = document.getElementById('newspaper-date');
            const timeSpan = document.getElementById('newspaper-time');

            function updateNewspaperMeta() {
                const now = new Date();

                // Date format: NEW YORK, THURSDAY, MAY 14, 2026
                const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const dateStr = now.toLocaleDateString('en-US', dateOptions).toUpperCase();
                if (dateSpan) dateSpan.innerText = `NEW YORK, ${dateStr}`;

                // Time format: 12:00 PM
                const timeStr = now.toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit' });
                if (timeSpan) timeSpan.innerText = timeStr;
            }

            // Initial call and set interval
            updateNewspaperMeta();
            setInterval(updateNewspaperMeta, 1000);

            // --- NEWSPAPER LOGIC ---

            const newspaperTrigger = document.getElementById('newspaper-trigger');
            const newspaperOverlay = document.getElementById('newspaper-overlay');
            const closeNewspaper = document.getElementById('close-newspaper');

            if (newspaperTrigger && newspaperOverlay) {
                newspaperTrigger.addEventListener('click', () => {
                    newspaperOverlay.style.display = 'flex';
                    if (mainContent) mainContent.classList.add('content-blur');
                    setTimeout(() => {
                        newspaperOverlay.classList.add('active');
                    }, 10);
                });
            }

            if (closeNewspaper && newspaperOverlay) {
                closeNewspaper.addEventListener('click', () => {
                    newspaperOverlay.classList.remove('active');
                    if (mainContent) mainContent.classList.remove('content-blur');
                    setTimeout(() => {
                        newspaperOverlay.style.display = 'none';
                    }, 600);
                });
            }

            // Close on background click
            if (newspaperOverlay) {
                newspaperOverlay.addEventListener('click', (e) => {
                    if (e.target === newspaperOverlay) {
                        closeNewspaper.click();
                    }
                });
            }
        });
    </script>

    <!-- Newspaper Overlay -->
    <div id="newspaper-overlay">
        <div class="newspaper-paper">
            <div id="close-newspaper"><i class="fas fa-times"></i></div>

            <div class="newspaper-header">
                <div class="newspaper-title">The Social Times</div>
                <div class="newspaper-meta">
                    <span>Vol. XIV... No. 250,510</span>
                    <span id="newspaper-date">NEW YORK, THURSDAY, MAY 14, 2026</span>
                    <span id="newspaper-time">12:00:00 PM</span>
                </div>
            </div>

            <div class="newspaper-content">
                <div class="newspaper-column-left">
                    <div class="newspaper-tagline">
                        LOCAL DEVELOPER PLACES RECENT PROJECTS IN THE FORM OF SHOWING FICTIONAL CHARACTERS THAT SAID
                        DEVELOPER LIKES FOR UNSPOKEN REASONS
                    </div>

                    <p
                        style="font-family: 'Inter', sans-serif; font-size: 1rem; line-height: 1.6; margin-bottom: 20px;">
                        Residents and digital onlookers are buzzing after a local developer unveiled a new project that
                        reads more like a secret dossier than a resume. Instead of standard charts and lists, the site
                        is a curated lineup of fictional characters, chosen for reasons the developer keeps close to the
                        vest.
                    </p>

                    <p
                        style="font-family: 'Inter', sans-serif; font-size: 1rem; line-height: 1.6; margin-bottom: 25px;">
                        "The newspaper design isn't just for show," the developer explained. "It’s about giving these
                        characters a sense of history. Why them specifically? Some things are better left unsaid."
                    </p>

                    <div
                        style="background: #1a1a1a; color: white; padding: 20px; font-family: 'Inter', sans-serif; font-size: 0.9rem;">
                        <span
                            style="font-weight: 900; font-size: 1.2rem; display: block; margin-bottom: 10px;">EDITORIAL:</span>
                        "The characters are in fact, temporary. I'll change them once I find the images, for now they're
                        just here for show"
                    </div>
                </div>

                <div class="newspaper-column-right">
                    <div
                        style="text-align: center; border: 1px solid #000; padding: 10px; margin-bottom: 20px; font-weight: 900;">
                        CLASSIFIED: GET IN TOUCH
                    </div>

                    <a href="/later" class="social-link" target="_blank">
                        <i class="fab fa-instagram"></i>
                        <div>
                            <div style="font-weight: 900; font-size: 1rem;">INSTAGRAM</div>
                            <div style="font-size: 0.8rem; opacity: 0.7;">DAILY UPDATES</div>
                        </div>
                    </a>

                    <a href="https://github.com/kaiwivvers-create" class="social-link" target="_blank">
                        <i class="fab fa-github"></i>
                        <div>
                            <div style="font-weight: 900; font-size: 1rem;">GITHUB</div>
                            <div style="font-size: 0.8rem; opacity: 0.7;">CODE REPOSITORIES</div>
                        </div>
                    </a>

                    <a href="/later" class="social-link" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                        <div>
                            <div style="font-weight: 900; font-size: 1rem;">TWITTER / X</div>
                            <div style="font-size: 0.8rem; opacity: 0.7;">LATEST THOUGHTS</div>
                        </div>
                    </a>

                    <a href="/later" class="social-link">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <div style="font-weight: 900; font-size: 1rem;">CONTACT EMAIL</div>
                            <div style="font-size: 0.8rem; opacity: 0.7;">OPEN FOR WORK</div>
                        </div>
                    </a>

                    <!-- Image Credits -->
                    <div style="margin-top: 30px; border-top: 1px dashed #1a1a1a; padding-top: 15px;">
                        <div
                            style="font-size: 0.7rem; font-weight: 900; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">
                            Photo Credits & Attribution:</div>
                        <p
                            style="font-family: 'Inter', sans-serif; font-size: 0.7rem; line-height: 1.4; color: #4b5563; text-align: justify;">
                            Visual assets and character illustrations are used for portfolio purposes. Credits belong
                            to:
                        </p>
                        <br>
                        <a href="https://instagram.com/octo__pie">
                            <p
                                style="font-family: 'Inter', sans-serif; font-size: 0.7rem; line-height: 1.4; color: #4b5563; text-align: justify;">
                                - Octo__pie on Instagram (for "Kai" character)</p>
                        </a>
                        <br>
                        <a href="https://instagram.com/pokuyaki">
                            <p
                                style="font-family: 'Inter', sans-serif; font-size: 0.7rem; line-height: 1.4; color: #4b5563; text-align: justify;">
                                - Pokuyaki on Instagram (for "Chips" character)</p>
                        </a>
                        <br>
                        <a href="https://en.wikipedia.org/wiki/Go_for_It,_Nakamura">
                            <p
                                style="font-family: 'Inter', sans-serif; font-size: 0.7rem; line-height: 1.4; color: #4b5563; text-align: justify;">
                                - ガンバレ! 中村くん!! (for "中村 奥人" and "広瀬 裕介" character)</p>
                        </a>
                        <br>
                        <a href="https://www.kuaikanmanhua.com/web/topic/22815/">
                            <p
                                style="font-family: 'Inter', sans-serif; font-size: 0.7rem; line-height: 1.4; color: #4b5563; text-align: justify;">
                                - 《说谎的小狗会被宰吃掉的》 (for "李宥” and “柳” character)</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>