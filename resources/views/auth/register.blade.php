<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gudang Sparepart - Register</title>
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
        max-width: 800px;
        position: relative;
    }
    
    .login-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(30px);
        border: 1px solid rgba(135, 206, 235, 0.1);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(135, 206, 235, 0.08),
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
        min-height: 500px; /* Reduced height for horizontal form */
    }
    
    .welcome-section {
        background: linear-gradient(135deg, #87ceeb 0%, #4682b4 100%);
        backdrop-filter: blur(20px);
        padding: 2.5rem;
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
    
    .logo-container img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 1rem;
    }
    
    .welcome-title {
        font-size: 32px;
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
    
    .form-section {
        padding: 2.5rem;
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
        font-size: 28px;
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
    
    .login-section {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }
    
    .login-text {
        color: #64748b;
        font-size: 15px;
        font-weight: 500;
    }
    
    .login-link {
        color: #87ceeb;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .login-link:hover {
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
    
    .form-group-with-label {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .form-row .form-group {
        margin-bottom: 0;
    }
    
    .form-row .col-md-6:first-child .form-group {
        margin-bottom: 1.5rem;
    }

    /* Adjust spacing for horizontal form on mobile */
    @media (max-width: 768px) {
        .card-content {
            min-height: auto;
        }

        .form-section {
            padding: 2rem;
        }

        .welcome-section {
            padding: 2rem;
            min-height: 250px;
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
                        <h2 class="form-title">Create Account</h2>
                        <p class="form-subtitle">Join us today and get started</p>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name') }}" required autocomplete="name" 
                                           autofocus placeholder="Full Name">
                                    <i class="fas fa-user input-icon"></i>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                                           name="username" value="{{ old('username') }}" required autocomplete="username" 
                                           placeholder="Username">
                                    <i class="fas fa-at input-icon"></i>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" 
                                   placeholder="Email Address">
                            <i class="fas fa-envelope input-icon"></i>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="new-password" 
                                           placeholder="Password">
                                    <i class="fas fa-eye input-icon" id="togglePassword"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" 
                                           name="password_confirmation" required autocomplete="new-password" 
                                           placeholder="Confirm Password">
                                    <i class="fas fa-check-circle input-icon"></i>
                                </div>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-primary mt-4">
                            {{ __('Create Account') }}
                        </button>
                    </form>
                    
                    <div class="login-section">
                        <p class="login-text">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="login-link">
                                Login di sini
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
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');
        
        if (togglePassword && passwordField) {
            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                
                if (type === 'text') {
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        }
    });
</script>

</body>
</html>