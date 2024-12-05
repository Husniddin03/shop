<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-4">
        <h2 class="text-center mb-4">Admin Panelga Kirish</h2>

        <!-- Xabarlar uchun joy -->
        @if(session('xato'))
            <div class="alert alert-danger">
                {{ session('xato') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('muvaffaqiyat') }}
            </div>
        @endif

        <!-- Login formasi -->
        <form action="{{ route('adminlogin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email manzil</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Emailni kiriting" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Parol</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Parolni kiriting" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Kirish</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS (ixtiyoriy) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
