
@extends('dashboard')
<style>
    h6 {
        text-align: center;
    }
    
    .avatar-container {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .avatar-preview {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #4a6cf7;
        margin: 0 auto 15px;
        display: block;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .avatar-upload {
        position: relative;
        display: inline-block;
    }
    
    .avatar-upload-btn {
        background: linear-gradient(135deg, #4a6cf7, #6c8eff);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .avatar-upload-btn:hover {
        background: linear-gradient(135deg, #3a5bd9, #5a7ee6);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 108, 247, 0.3);
    }
    
    .avatar-upload input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
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
</style>
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><i class="fas me-2"></i>Cập Nhật Thông Tin</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.postUpdateUser') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="id" type="hidden" value="{{$user->id}}">
                                
                                
                                <div class="avatar-container">
                                    <img src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : asset('images/default-avatar.png') }}" 
                                         alt="Avatar" class="avatar-preview" id="avatar-preview">
                                    <div class="avatar-upload">
                                        <button type="button" class="avatar-upload-btn">
                                            <i class="fas me-2"></i>Thay Đổi Ảnh Đại Diện
                                        </button>
                                        <input type="file" name="avatar" id="avatar-input" accept="image/*" onchange="previewAvatar(this)">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <h6><i class="fas me-2"></i>Họ và Tên</h6>
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="{{ $user->name }}"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <h6><i class="fas  me-2"></i>Tuổi</h6>
                                    <input type="text" id="tuoi" class="form-control" name="tuoi"
                                           value="{{ $user->tuoi }}"
                                           required autofocus>
                                    @if ($errors->has('tuoi'))
                                        <span class="text-danger">{{ $errors->first('tuoi') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <h6><i class="fab me-2"></i>GitHub</h6>
                                    <input type="text" id="github" class="form-control" name="github"
                                           value="{{ $user->github }}"
                                           required autofocus>
                                    @if ($errors->has('github'))
                                        <span class="text-danger">{{ $errors->first('github') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <h6><i class="fas me-2"></i>Email</h6>
                                    <input type="email" id="email_address" class="form-control"
                                           value="{{ $user->email }}"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <h6><i class="fas me-2"></i>Mật Khẩu</h6>
                                    <input type="password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        <i class="fas  me-2"></i>Cập Nhật
                                    </button>
                                    <a href="{{ route('user.list') }}" class="btn btn-outline-secondary text-center">
                                        <i class="fas fa-arrow-left me-2"></i>Quay Lại
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        function previewAvatar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
