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
    
    .register-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #ffffff 0%, #e3f2fd 30%, #bbdefb 70%, #2196f3 100%);
        position: relative;
        overflow-x: hidden;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }
    
    /* Animated background elements */
    .register-container::before {
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
    
    .container {
        position: relative;
        z-index: 1;
        padding: 2rem 1rem;
    }
    
    .register-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(33, 150, 243, 0.15);
        border-radius: 20px;
        box-shadow: 
            0 25px 50px rgba(33, 150, 243, 0.15),
            0 15px 35px rgba(33, 150, 243, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        position: relative;
        overflow: hidden;
        animation: slideInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        max-width: 500px;
        margin: 0 auto;
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
    .register-card::before {
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
    
    .register-title {
        font-size: 32px;
        font-weight: 800;
        background: linear-gradient(135deg, #1976d2, #0d47a1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -0.02em;
    }
    
    .register-subtitle {
        color: #64b5f6;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 0;
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
        margin-top: 1rem;
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
        width: 120px;
        height: 120px;
        top: 8%;
        left: 12%;
        animation-delay: 0s;
        background: rgba(33, 150, 243, 0.1);
    }
    
    .floating-circle:nth-child(2) {
        width: 180px;
        height: 180px;
        top: 55%;
        right: 8%;
        animation-delay: -6s;
        background: rgba(25, 118, 210, 0.08);
    }
    
    .floating-circle:nth-child(3) {
        width: 90px;
        height: 90px;
        bottom: 12%;
        left: 20%;
        animation-delay: -12s;
        background: rgba(66, 165, 245, 0.12);
    }
    
    .floating-circle:nth-child(4) {
        width: 140px;
        height: 140px;
        top: 25%;
        right: 28%;
        animation-delay: -8s;
        background: rgba(144, 202, 249, 0.09);
    }
    
    .floating-circle:nth-child(5) {
        width: 60px;
        height: 60px;
        top: 70%;
        left: 8%;
        animation-delay: -3s;
        background: rgba(33, 150, 243, 0.15);
    }
    
    .floating-circle:nth-child(6) {
        width: 200px;
        height: 200px;
        top: 10%;
        right: 5%;
        animation-delay: -15s;
        background: rgba(25, 118, 210, 0.06);
    } 0s;
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
    
    /* Custom Row Spacing */
    .mb-3 {
        margin-bottom: 1.5rem !important;
    }
    
    .col-form-label {
        display: none; /* Hide traditional labels as we use floating labels */
    }
    
    .row.form-row {
        position: relative;
    }
    
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }
        
        .card-body,
        .card-header {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        .register-title {
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
        
        .register-card {
            margin: 1rem;
        }
        /* Tambahan Gaya untuk Halaman Register */

.login-link-container {
    text-align: center;
    margin-top: 2rem; 
    padding-top: 1.5rem;
    position: relative;
}

.login-link-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #e2e8f0; 
    border-radius: 2px;
}

.login-text {
    color: #64748b;
    font-size: 15px;
    font-weight: 500;
} 

.login-link {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.login-link:hover {
    color: #1d4ed8;
    text-decoration: underline;
}
    }
</style>

<div class="register-container">
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card register-card">
                    <div class="card-header">
                        <div class="logo">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h1 class="register-title">Create Account</h1>
                        <p class="register-subtitle">Join us today and get started</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 form-row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                               name="name" value="{{ old('name') }}" required autocomplete="name" 
                                               autofocus placeholder="Enter your full name">
                                        <label for="name">{{ __('Full Name') }}</label>
                                        <i class="fas fa-user input-icon"></i>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Input untuk Username --}}
                            <div class="row mb-3 form-row">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                                               name="username" value="{{ old('username') }}" required autocomplete="username" 
                                               placeholder="Choose a username">
                                        <label for="username">{{ __('Username') }}</label>
                                        <i class="fas fa-at input-icon"></i>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 form-row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                               name="email" value="{{ old('email') }}" required autocomplete="email" 
                                               placeholder="Enter your email address">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <i class="fas fa-envelope input-icon"></i>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 form-row">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                               name="password" required autocomplete="new-password" 
                                               placeholder="Create a strong password">
                                        <label for="password">{{ __('Password') }}</label>
                                        <i class="fas fa-lock input-icon"></i>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 form-row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input id="password-confirm" type="password" class="form-control" 
                                               name="password_confirmation" required autocomplete="new-password" 
                                               placeholder="Confirm your password">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <i class="fas fa-check-circle input-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Account') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="login-link-container">
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>