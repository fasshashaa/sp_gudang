<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
          font-family: 'Poppins', sans-serif;
            background-color: #eef4ff;
            /* Warna background fallback */
            background-image: url('{{ asset('images/gal.png') }}');
            /* Gambar latar belakang baru */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
    }
    
    /* Animated background elements */
    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(33, 150, 243, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(25, 118, 210, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(66, 165, 245, 0.1) 0%, transparent 50%);
        animation: backgroundShift 20s ease-in-out infinite;
        pointer-events: none;
    }
    
    @keyframes backgroundShift {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        position: relative;
        z-index: 1;
    }
    
    .login-wrapper {
        width: 100%;
        max-width: 420px;
        position: relative;
    }
    
    .login-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(33, 150, 243, 0.15);
        border-radius: 20px;
        padding: 0;
        box-shadow: 
            0 25px 50px rgba(33, 150, 243, 0.15),
            0 15px 35px rgba(33, 150, 243, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        position: relative;
        overflow: hidden;
        animation: slideInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    @keyframes slideInUp {
        0% {
            opacity: 0;
            transform: translateY(40px) scale(0.96);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    /* Decorative top border */
    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #2196f3, #1976d2, #0d47a1);
        border-radius: 20px 20px 0 0;
    }
    
    .card-header {
        background: transparent;
        border: none;
        text-align: center;
        padding: 2.5rem 2rem 1rem;
        position: relative;
    }
    
    .logo {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #2196f3 0%, #1976d2 50%, #0d47a1 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 28px;
        box-shadow: 
            0 15px 35px rgba(33, 150, 243, 0.3),
            0 5px 15px rgba(33, 150, 243, 0.2);
        position: relative;
        overflow: hidden;
        animation: logoGlow 3s ease-in-out infinite;
    }
    
    .logo::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: logoShine 4s infinite;
    }
    
    @keyframes logoGlow {
        0%, 100% { box-shadow: 0 15px 35px rgba(33, 150, 243, 0.3), 0 5px 15px rgba(33, 150, 243, 0.2); }
        50% { box-shadow: 0 20px 40px rgba(33, 150, 243, 0.4), 0 8px 20px rgba(33, 150, 243, 0.3); }
    }
    
    @keyframes logoShine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }
    
    .welcome-title {
        font-size: 32px;
        font-weight: 800;
        background: linear-gradient(135deg, #1976d2, #0d47a1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -0.02em;
    }
    
    .welcome-subtitle {
        color: #64b5f6;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 2rem;
    }
    
    .card-body {
        padding: 0 2rem 2.5rem;
    }
    
    .form-floating {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .form-control {
        height: 58px;
        border: 2px solid #e3f2fd;
        border-radius: 14px;
        background: #fafffe;
        font-size: 16px;
        font-weight: 500;
        padding: 1rem 3.5rem 1rem 1.25rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        color: #1565c0;
        box-shadow: inset 0 1px 3px rgba(33, 150, 243, 0.05);
    }
    
    .form-control::placeholder {
        color: #90caf9;
        opacity: 0.8;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #2196f3;
        background: #ffffff;
        box-shadow: 
            0 0 0 3px rgba(33, 150, 243, 0.1),
            inset 0 1px 3px rgba(33, 150, 243, 0.05);
        transform: translateY(-1px);
    }
    
    .form-control.is-invalid {
        border-color: #f44336;
        box-shadow: 
            0 0 0 3px rgba(244, 67, 54, 0.1),
            inset 0 1px 3px rgba(244, 67, 54, 0.05);
    }
    
    .form-floating label {
        color: #64b5f6;
        font-weight: 600;
        font-size: 14px;
        padding: 0 0.25rem;
        background: transparent;
        transition: all 0.3s ease;
    }
    
    .form-control:focus ~ label,
    .form-control:not(:placeholder-shown) ~ label {
        color: #1976d2;
        transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    }
    
    .input-icon {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #90caf9;
        font-size: 18px;
        transition: all 0.3s ease;
        z-index: 5;
    }
    
    .form-control:focus ~ .input-icon {
        color: #2196f3;
        transform: translateY(-50%) scale(1.1);
    }
    
    .remember-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
    
    .form-check {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .form-check-input {
        width: 20px;
        height: 20px;
        border: 2px solid #bbdefb;
        border-radius: 6px;
        background: white;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .form-check-input:checked {
        background: #2196f3;
        border-color: #2196f3;
        box-shadow: 0 2px 10px rgba(33, 150, 243, 0.3);
    }
    
    .form-check-label {
        color: #1976d2;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        user-select: none;
    }
    
    .btn-primary {
        width: 100%;
        height: 58px;
        background: linear-gradient(135deg, #2196f3 0%, #1976d2 50%, #0d47a1 100%);
        border: none;
        border-radius: 14px;
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 0.5px;
        color: white;
        text-transform: uppercase;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 8px 25px rgba(33, 150, 243, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s ease;
    }
    
    .btn-primary:hover::before {
        left: 100%;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 
            0 15px 40px rgba(33, 150, 243, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        background: linear-gradient(135deg, #1976d2 0%, #1565c0 50%, #0d47a1 100%);
    }
    
    .btn-primary:active {
        transform: translateY(0);
    }
    
    .forgot-link {
        color: #2196f3;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .forgot-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #2196f3;
        transition: width 0.3s ease;
    }
    
    .forgot-link:hover {
        color: #1976d2;
    }
    
    .forgot-link:hover::after {
        width: 100%;
    }
    
    .invalid-feedback {
        color: #f44336;
        font-size: 14px;
        font-weight: 600;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .invalid-feedback::before {
        content: '⚠';
        font-size: 14px;
        color: #ff9800;
    }
    
    /* Floating decorative elements */
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 0;
    }
    
    .floating-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(33, 150, 243, 0.1);
        animation: float 15s infinite ease-in-out;
    }
    
    .floating-circle:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 10%;
        left: 15%;
        animation-delay: 0s;
        background: rgba(33, 150, 243, 0.08);
    }
    
    .floating-circle:nth-child(2) {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 10%;
        animation-delay: -5s;
        background: rgba(25, 118, 210, 0.06);
    }
    
    .floating-circle:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 15%;
        left: 25%;
        animation-delay: -10s;
        background: rgba(66, 165, 245, 0.1);
    }
    
    .floating-circle:nth-child(4) {
        width: 120px;
        height: 120px;
        top: 30%;
        right: 30%;
        animation-delay: -7s;
        background: rgba(144, 202, 249, 0.08);
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0) translateX(0) rotate(0deg);
            opacity: 0.7;
        }
        25% {
            transform: translateY(-20px) translateX(10px) rotate(90deg);
            opacity: 0.4;
        }
        50% {
            transform: translateY(10px) translateX(-15px) rotate(180deg);
            opacity: 0.6;
        }
        75% {
            transform: translateY(-10px) translateX(5px) rotate(270deg);
            opacity: 0.3;
        }
    }
    
    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }
        
        .card-body,
        .card-header {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        .welcome-title {
            font-size: 28px;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }
        
        .form-control {
            height: 54px;
        }
        
        .btn-primary {
            height: 54px;
            font-size: 15px;
        }
        .register-text {
    color: #64748b;
    font-size: 15px;
    font-weight: 500;
}

/* Gaya baru untuk penempatan link register */
.register-link-container {
    text-align: center;
    margin-top: 2rem; /* Memberikan jarak dari tombol login */
    padding-top: 1.5rem; /* Ruang di atas garis horizontal */
    position: relative;
}

.register-link-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #e2e8f0; /* Warna garis pemisah */
    border-radius: 2px;
}

/* Gaya teks dan link yang sudah Anda miliki, pastikan sudah ada */
.register-text {
    color: #64748b;
    font-size: 15px;
    font-weight: 500;
}

.register-link {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.register-link:hover {
    color: #1d4ed8;
    text-decoration: underline;
}
    }
</style>

<div class="floating-elements">
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
</div>

<div class="login-container">
    <div class="login-wrapper">
        <div class="card login-card">
            <div class="card-header">
                <div class="logo">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h1 class="welcome-title">Welcome Back</h1>
                <p class="welcome-subtitle">Sign in to access your account</p>
            </div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-floating">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                               name="username" value="{{ old('username') }}" required autocomplete="username" 
                               autofocus placeholder="Enter your username">
                        <label for="username">{{ __('Username') }}</label>
                        <i class="fas fa-user input-icon"></i>
                        
                        @error('username')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password" placeholder="Enter your password">
                        <label for="password">{{ __('Password') }}</label>
                        <i class="fas fa-lock input-icon"></i>
                        
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="remember-section">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">
                        {{ __('Sign In') }}
                    </button>
                </form>
                
  
    <div class="register-link-container">
        <p class="register-text">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="register-link">
                Daftar sekarang
            </a>
        </p>
    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>