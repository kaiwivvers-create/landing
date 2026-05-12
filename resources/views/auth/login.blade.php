<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Narc Showroom</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #bd00ff;
            --secondary: #8b3dff;
            --bg-dark: #050505;
            --card-bg: rgba(20, 20, 20, 0.7);
            --text-main: #ffffff;
            --text-dim: #a0a0a0;
            --accent: #00f2ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, sans-serif;
        }

        body {
            background: var(--bg-dark);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: var(--text-main);
        }

        /* ANIMATED BACKGROUND */
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: radial-gradient(circle at 50% 50%, #1a0033 0%, #050505 100%);
        }

        .orb {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(189, 0, 255, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(50px);
            animation: move 20s infinite alternate;
        }

        .orb:nth-child(2) {
            background: radial-gradient(circle, rgba(0, 242, 255, 0.1) 0%, transparent 70%);
            width: 500px;
            height: 500px;
            animation-delay: -5s;
            animation-duration: 25s;
        }

        .orb:nth-child(3) {
            background: radial-gradient(circle, rgba(139, 61, 255, 0.1) 0%, transparent 70%);
            width: 300px;
            height: 300px;
            animation-delay: -10s;
            animation-duration: 15s;
        }

        @keyframes move {
            0% { transform: translate(-10%, -10%); }
            100% { transform: translate(110%, 110%); }
        }

        .grid-lines {
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background-image: linear-gradient(rgba(189, 0, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(189, 0, 255, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            transform: perspective(500px) rotateX(60deg);
            animation: grid-move 20s linear infinite;
        }

        @keyframes grid-move {
            0% { transform: perspective(500px) rotateX(60deg) translateY(0); }
            100% { transform: perspective(500px) rotateX(60deg) translateY(50px); }
        }

        /* LOGIN CONTAINER */
        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(189, 0, 255, 0.2);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5),
                        0 0 20px rgba(189, 0, 255, 0.1);
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            border-color: rgba(189, 0, 255, 0.4);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5),
                        0 0 30px rgba(189, 0, 255, 0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -1px;
            background: linear-gradient(135deg, #fff 0%, #bd00ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logo i {
            -webkit-text-fill-color: #bd00ff;
            filter: drop-shadow(0 0 10px rgba(189, 0, 255, 0.5));
        }

        .subtitle {
            text-align: center;
            color: var(--text-dim);
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* FORM ELEMENTS */
        .form-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dim);
            font-size: 13px;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px 16px 14px 45px;
            border-radius: 12px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .input-wrapper input:focus {
            outline: none;
            background: rgba(189, 0, 255, 0.05);
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(189, 0, 255, 0.2);
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-dim);
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .input-wrapper input:focus + i {
            color: var(--primary);
        }

        /* CAPTCHA STYLING */
        .captcha-group {
            background: rgba(139, 61, 255, 0.1);
            padding: 15px;
            border-radius: 12px;
            border: 1px solid rgba(139, 61, 255, 0.3);
            margin-bottom: 25px;
        }

        .captcha-label {
            color: #bd00ff;
            font-weight: bold;
            font-size: 0.95rem;
            margin-bottom: 10px;
            display: block;
        }

        /* BUTTON */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px -10px rgba(189, 0, 255, 0.5);
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -10px rgba(189, 0, 255, 0.6);
            filter: brightness(1.1);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* LINKS */
        .signup-link {
            text-align: center;
            margin-top: 25px;
            color: var(--text-dim);
            font-size: 14px;
        }

        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* ALERTS */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background: rgba(255, 70, 70, 0.1);
            border: 1px solid rgba(255, 70, 70, 0.3);
            color: #ff6b6b;
        }

        .alert-success {
            background: rgba(0, 255, 100, 0.1);
            border: 1px solid rgba(0, 255, 100, 0.3);
            color: #51ff7c;
        }

    </style>
</head>
<body>

    <div class="background-animation">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="grid-lines"></div>
    </div>

    <div class="login-container">
        <div class="logo">
            <i class="fas fa-bolt"></i> NARC SHOWROOM
        </div>
        <p class="subtitle">Enter the realm of premium vehicles</p>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group input-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" placeholder="user@example.com" value="{{ old('email') }}" required autofocus>
                    <i class="fas fa-envelope"></i>
                </div>
            </div>

            <div class="form-group input-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <!-- CAPTCHA -->
            <div class="captcha-group">
                <label for="captcha" class="captcha-label">
                    <i class="fas fa-shield-alt"></i> Security Check: {{ $num1 }} + {{ $num2 }} = ?
                </label>
                <div class="input-wrapper">
                    <input 
                        type="number" 
                        id="captcha" 
                        name="captcha"
                        placeholder="Type the answer"
                        required
                        style="background: rgba(0,0,0,0.4); border-color: rgba(139, 61, 255, 0.5); width: 100%; padding: 10px 15px 10px 45px; border-radius: 8px; color: white;">
                    <i class="fas fa-calculator" style="color: #bd00ff;"></i>
                </div>
                @error('captcha')
                    <small style="color: #fca5a5; display: block; margin-top: 6px;">{{ $message }}</small>
                @enderror
            </div>

            <!-- FORGOT PASSWORD -->
            <div style="text-align: right; margin-bottom: 20px;">
                <a href="#" onclick="alert('Please contact support to reset your password.'); return false;" style="color: rgba(255, 255, 255, 0.6); text-decoration: none; font-size: 0.9rem; transition: color 0.3s; border-bottom: 1px dashed rgba(255,255,255,0.3);">
                    Forgot Password?
                </a>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="signup-link">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>

</body>
</html>
