<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Narc Showroom</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #bd00ff;
            --secondary: #8b3dff;
            --bg-dark: #050505;
            --card-bg: rgba(20, 20, 20, 0.7);
            --text-main: #ffffff;
            --text-dim: #a0a0a0;
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

        @keyframes move {
            0% { transform: translate(-10%, -10%); }
            100% { transform: translate(110%, 110%); }
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(189, 0, 255, 0.2);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #bd00ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .subtitle {
            text-align: center;
            color: var(--text-dim);
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            color: var(--text-dim);
            font-size: 13px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 16px 12px 45px;
            border-radius: 12px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(189, 0, 255, 0.2);
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-dim);
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: var(--text-dim);
            font-size: 14px;
        }

        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="background-animation">
        <div class="orb"></div>
    </div>

    <div class="login-container">
        <div class="logo">
            <i class="fas fa-bolt"></i> NARC SHOWROOM
        </div>
        <p class="subtitle">Join the elite vehicle community</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="form-group input-group">
                <label for="name">Full Name</label>
                <div class="input-wrapper">
                    <input type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}" required>
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <div class="form-group input-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" placeholder="user@example.com" value="{{ old('email') }}" required>
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

            <div class="form-group input-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                    <i class="fas fa-shield-check"></i>
                </div>
            </div>

            <button type="submit" class="btn-login">Create Account</button>
        </form>

        <div class="signup-link">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
        </div>
    </div>

</body>
</html>
