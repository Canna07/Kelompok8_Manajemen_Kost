<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login My Kos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f6f1ec;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .card {
        border-radius: 20px;
        border: none;
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        max-width: 450px; /* kotak lebih besar */
        width: 100%;
    }
    .card-body {
        background-color: #d9b38c; /* coklat muda */
        border-radius: 20px;
        padding: 40px; /* lebih tebal */
    }
    .card-title {
        color: #4a2f1f;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 30px;
        text-align: center;
    }
    .form-control {
        border-radius: 12px;
        border: 1px solid #8b5e3c;
        padding-left: 45px;
        height: 50px;
        font-size: 16px;
    }
    .form-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #8b5e3c;
        font-size: 20px;
    }
    .btn-login {
        background-color: #6b3e26;
        color: #fff;
        border-radius: 12px;
        font-weight: 600;
        padding: 12px;
        font-size: 18px;
        margin-top: 10px;
    }
    .btn-login:hover {
        background-color: #4a2f1f;
    }
    .input-group {
        position: relative;
        margin-bottom: 25px;
    }
</style>
</head>
<body>

<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="card-title">Login My Kos</h4>

        @if($errors->has('login'))
            <div class="alert alert-danger">{{ $errors->first('login') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="input-group">
                <i class="bi bi-person-fill form-icon"></i>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
            </div>

            <div class="input-group">
                <i class="bi bi-key-fill form-icon"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
    </div>
</div>

</body>
</html>
