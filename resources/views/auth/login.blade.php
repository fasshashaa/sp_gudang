<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gudang Sparepart - Login</title>
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
        background-image: url('{{ asset('images/gal.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    /* Enhanced animated background with soft blue */
    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 20%, rgba(135, 206, 235, 0.12) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(173, 216, 230, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(176, 224, 230, 0.08) 0%, transparent 50%);
        animation: backgroundPulse 8s ease-in-out infinite;
        pointer-events: none;
    }
    
    @keyframes backgroundPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }
    
    /* Floating particles with soft blue */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    
    .particle {
        position: absolute;
        background: rgba(135, 206, 235, 0.25);
        border-radius: 50%;
        animation: float 15s infinite linear;
    }
    
    .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 6s; }
    .particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 8s; }
    .particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 10s; }
    .particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 12s; }
    .particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 14s; }
    .particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 16s; }
    .particle:nth-child(10) { width: 6px; height: 6px; left: 95%; animation-delay: 18s; }
    
    @keyframes float {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }
    
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        position: relative;
        z-index: 2;
    }
    
    .login-wrapper {
        width: 100%;
        max-width: 800px; /* Adjusted to make the card smaller */
        position: relative;
    }
    
    /* Main floating card */
    .login-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(30px);
        border: 1px solid rgba(135, 206, 235, 0.1);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(135, 206, 235, 0.08), /* Adjusted for less heavy look */
            0 10px 20px rgba(135, 206, 235, 0.04),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        animation: cardFloat 6s ease-in-out infinite, slideInUp 1s ease-out;
        position: relative;
    }
    
    @keyframes cardFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(0.5deg); }
    }
    
    @keyframes slideInUp {
        0% {
            opacity: 0;
            transform: translateY(60px) scale(0.9);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    /* Glowing border effect with adjusted colors */
    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, #000000, #ffee00, #ff0000);
        border-radius: 24px;
        padding: 2px;
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: exclude;
        animation: borderGlow 3s ease-in-out infinite;
        z-index: -1;
    }
    
    @keyframes borderGlow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }
    
    .card-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 550px; /* Adjusted to make the card less tall */
    }
    
    /* Left side - Welcome section with transparency */
    .welcome-section {
        background: linear-gradient(135deg, #87ceeb 0%, #4682b4 100%);
        backdrop-filter: blur(20px);
        padding: 2.5rem; /* Adjusted for tighter spacing */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .welcome-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        animation: welcomeShine 4s ease-in-out infinite;
    }
    
    @keyframes welcomeShine {
        0%, 100% { transform: rotate(0deg); opacity: 0.5; }
        50% { transform: rotate(180deg); opacity: 0.8; }
    }
    
    .logo-container {
        position: relative;
        z-index: 2;
        margin-bottom: 2rem;
    }
    
    /* Adjusted size for the Nunggal logo image */
    .logo-container img {
        width: 80px; /* Adjusted to be smaller */
        height: 80px;
        border-radius: 50%;
        margin-bottom: 1rem;
    }
    
    .welcome-title {
        font-size: 32px; /* Adjusted to be smaller */
        font-weight: 800;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 2;
    }
    
    .welcome-subtitle {
        font-size: 16px;
        font-weight: 400;
        opacity: 0.9;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }
    
    /* Right side - Form section */
    .form-section {
        padding: 2.5rem; /* Adjusted for tighter spacing */
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #ffffff;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }
    
    .form-title {
        font-size: 28px; /* Adjusted to be smaller */
        font-weight: 700;
        color: #4682b4;
        margin-bottom: 0.5rem;
    }
    
    .form-subtitle {
        color: #64748b;
        font-size: 16px;
        font-weight: 500;
    }
    
    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .form-control {
        width: 100%;
        height: 56px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        background: #ffffff;
        font-size: 16px;
        font-weight: 500;
        padding: 0 3rem 0 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        color: #1e293b;
    }
    
    .form-control::placeholder {
        color: #94a3b8;
        opacity: 0.8;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #87ceeb;
        background: #ffffff;
        box-shadow: 
            0 0 0 3px rgba(135, 206, 235, 0.1),
            0 4px 12px rgba(135, 206, 235, 0.15);
        transform: translateY(-2px);
    }
    
    .form-control.is-invalid {
        border-color: #ef4444;
        box-shadow: 
            0 0 0 3px rgba(239, 68, 68, 0.1),
            0 4px 12px rgba(239, 68, 68, 0.15);
    }
    
    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 18px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .form-control:focus + .input-icon {
        color: #87ceeb;
        transform: translateY(-50%) scale(1.1);
    }
    
    .input-icon:hover {
        color: #4682b4;
        transform: translateY(-50%) scale(1.2);
    }
    
    .remember-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-check-input {
        width: 18px;
        height: 18px;
        border: 2px solid #cbd5e0;
        border-radius: 4px;
        background: white;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .form-check-input:checked {
        background: #87ceeb;
        border-color: #87ceeb;
        box-shadow: 0 2px 8px rgba(135, 206, 235, 0.3);
    }
    
    .form-check-label {
        color: #475569;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        user-select: none;
    }
    
    .forgot-link {
        color: #87ceeb;
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
        background: #87ceeb;
        transition: width 0.3s ease;
    }
    
    .forgot-link:hover {
        color: #4682b4;
        transform: translateY(-1px);
    }
    
    .forgot-link:hover::after {
        width: 100%;
    }
    
    .btn-primary {
        width: 100%;
        height: 56px;
        background: linear-gradient(135deg, #87ceeb 0%, #4682b4 100%);
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 0.5px;
        color: white;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 8px 25px rgba(135, 206, 235, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }
    
    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.6s ease;
    }
    
    .btn-primary:hover::before {
        left: 100%;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 15px 35px rgba(135, 206, 235, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        background: linear-gradient(135deg, #5f9ea0 0%, #2f4f4f 100%);
    }
    
    .btn-primary:active {
        transform: translateY(-1px);
    }
    
    .register-section {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }
    
    .register-text {
        color: #64748b;
        font-size: 15px;
        font-weight: 500;
    }
    
    .register-link {
        color: #87ceeb;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .register-link:hover {
        color: #4682b4;
        text-decoration: underline;
    }
    
    .invalid-feedback {
        color: #ef4444;
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
        color: #f59e0b;
    }
    
    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }
        
        .card-content {
            grid-template-columns: 1fr;
            min-height: auto;
        }
        
        .welcome-section {
            padding: 2rem;
            min-height: 300px;
        }
        
        .form-section {
            padding: 2rem;
        }
        
        .welcome-title {
            font-size: 28px;
        }
        
        .form-title {
            font-size: 24px;
        }
        
        .logo-container img {
            width: 80px;
            height: 80px;
        }
        
        .remember-section {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="login-container">
    <div class="login-wrapper">
        <div class="card login-card">
            <div class="card-content">
                <div class="welcome-section">
                    <div class="logo-container">
                        <img src="{{ asset('images/nunggal.png') }}" alt="Gudang Sparepart Logo">
                        <h1 class="welcome-title">Gudang Sparepart</h1>
                        <p class="welcome-subtitle">
                            PT. MANUNGGAL PERKASA
                        </p>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-header">
                        <h2 class="form-title">Welcome Back</h2>
                        <p class="form-subtitle">Sign in to your account</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                                   name="username" value="{{ old('username') }}" required autocomplete="username" 
                                   autofocus placeholder="Enter your username">
                            <i class="fas fa-user input-icon"></i>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password" 
                                   placeholder="Enter your password">
                            <i class="fas fa-eye input-icon" id="togglePassword"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="remember-section">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a class="forgot-link" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                       
                        <button type="submit" class="btn btn-primary">
                            {{ __('Sign In') }}
                        </button>
                    </form>
                    
                    <div class="register-section">
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
// Add some interactive effects
document.addEventListener('DOMContentLoaded', function() {
    // Form validation visual feedback
    const inputs = document.querySelectorAll('.form-control');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Password visibility toggle
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');
    
    if (togglePassword && passwordField) {
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'text') {
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    }
    
    // Add subtle mouse movement effect to card
    const card = document.querySelector('.login-card');
    document.addEventListener('mousemove', function(e) {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        
        const moveX = x / rect.width * 10;
        const moveY = y / rect.height * 10;
        
        card.style.transform = `perspective(1000px) rotateY(${moveX * 0.1}deg) rotateX(${-moveY * 0.1}deg) translateZ(0)`;
    });
    
    // Reset card position when mouse leaves
    document.addEventListener('mouseleave', function() {
        card.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg) translateZ(0)';
    });
});
</script>

</body>
</html>