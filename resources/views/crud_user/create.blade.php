@extends('dashboard')
<style>
    h6 {
        text-align: center;
        font-weight: 600;
        margin-bottom: 10px;
        color: #4a6cf7;
    }
    
    .signup-form {
        padding: 30px 0;
    }
    
    .card {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }
    
    .card-header {
        background: linear-gradient(135deg, #4a6cf7, #6c8eff);
        color: white;
        padding: 20px;
        border-bottom: none;
    }
    
    .card-header h3 {
        margin: 0;
        font-weight: 700;
        font-size: 1.5rem;
    }
    
    .card-body {
        padding: 30px;
    }
    
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e1e1e1;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    
    .form-control:focus {
        border-color: #4a6cf7;
        box-shadow: 0 0 0 0.2rem rgba(74, 108, 247, 0.25);
    }
    
    .form-group {
        margin-bottom: 20px;
        position: relative;
    }
    
    .form-group i {
        position: absolute;
        right: 15px;
        top: 40px;
        color: #aaa;
    }
    
    .btn-dark {
        background: linear-gradient(135deg, #4a6cf7, #6c8eff);
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .btn-dark:hover {
        background: linear-gradient(135deg, #3a5bd9, #5a7ee6);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 108, 247, 0.3);
    }
    
    .text-danger {
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }
    
    .form-floating {
        position: relative;
        margin-bottom: 20px;
    }
    
    .form-floating > .form-control {
        height: 60px;
        padding: 1rem 0.75rem;
    }
    
    .form-floating > label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        padding: 1rem 0.75rem;
        pointer-events: none;
        border: 1px solid transparent;
        transform-origin: 0 0;
        transition: opacity .1s ease-in-out,transform .1s ease-in-out;
    }
    
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        opacity: .65;
        transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
    }
    
    .input-group-text {
        background-color: #f8f9fa;
        border: 1px solid #e1e1e1;
        border-radius: 8px 0 0 8px;
    }
    
    .input-group .form-control {
        border-radius: 0 8px 8px 0;
    }
</style>
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><i class="fas fa-user-plus me-2"></i>Đăng Ký Tài Khoản</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.postUser') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h6><i class="fas fa-user me-2"></i>Họ và Tên</h6>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Nhập họ và tên của bạn" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                @csrf
                                <div class="form-group">
                                    <h6><i class="fas fa-user me-2"></i>Tuoi</h6>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Nhập họ và tên của bạn" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                          
                            
                                </div>
                                @csrf
                                <div class="form-group">
                                    <h6><i class="fas fa-user me-2"></i>GitHub</h6>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Nhập họ và tên của bạn" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                <div class="form-group">
                                    <h6><i class="fas fa-envelope me-2"></i>Email</h6>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" id="email_address" class="form-control" name="email" placeholder="Nhập địa chỉ email của bạn" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <h6><i class="fas fa-lock me-2"></i>Mật Khẩu</h6>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        <i class="fas fa-user-plus me-2"></i>Đăng Ký
                                    </button>
                                    <a href="{{ route('login') }}" class="btn btn-outline-secondary text-center">
                                        <i class="fas fa-arrow-left me-2"></i>Quay Lại Đăng Nhập
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
