<!-- resources/views/auth/signin.blade.php -->
<div class="signin-container">
    <!-- Orqaga chiqish tugmasi -->
    <a href="{{ route('index') }}" class="logout-btn">Chiqish</a>

    <div class="signin-box">
        @if (session('error'))
            <div class="error-alert" role="alert">
                {{ session('error') }}
                <button type="button" class="close-btn" aria-label="Close"
                    onclick="this.parentElement.style.display='none';">✕</button>
            </div>
        @endif


        <div class="signin-left">
            <h2>Login</h2>
            <form action="{{ route('signin') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="signin-btn">Login</button>
            </form>
            <p>Don't have an account? <a href="{{ route('signup') }}">Sign up</a></p>
        </div>
        <div class="signin-right">
            <h2>WELCOME BACK!</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Chiqish tugmasi uchun CSS */
    .logout-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #ff4b5c;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #ff2a3b;
    }


    body {
        font-family: Arial, sans-serif;
        background-color: #0a0f1f;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .signin-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .signin-box {
        display: flex;
        background-color: #0d1a2f;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
    }

    .signin-left,
    .signin-right {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 50%;
    }

    .signin-left {
        background-color: #0d1a2f;
    }

    .signin-right {
        background-color: #00a5c9;
        color: #fff;
        text-align: center;
    }

    .signin-left h2,
    .signin-right h2 {
        margin-bottom: 20px;
        color: #fff;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group label {
        color: #ccc;
        font-size: 14px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        border-radius: 5px;
        border: none;
        background-color: #1f2e47;
        color: #fff;
    }

    .signin-btn {
        width: 100%;
        padding: 10px;
        background-color: #00e0ff;
        color: #0d1a2f;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .signin-btn:hover {
        background-color: #00b0cc;
    }

    p {
        margin-top: 20px;
        color: #ccc;
        font-size: 14px;
    }

    p a {
        color: #00e0ff;
        text-decoration: none;
    }

    p a:hover {
        text-decoration: underline;
    }

    /* alert */
    /* Xatolik xabari uchun yanada zamonaviy dizayn */
    .error-alert {
        position: relative;
        background-color: #ffe5e5;
        /* Sof och qizil fon */
        color: #d9534f;
        /* Qizil matn rangi */
        border-left: 5px solid #d9534f;
        /* Chap tomonda rangli chiziq */
        padding: 16px 20px;
        border-radius: 8px;
        /* Yumaloq burchaklar */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Yengil soya effekti */
        margin-bottom: 20px;
        font-size: 14px;
        line-height: 1.4;
        display: flex;
        align-items: center;
        gap: 10px;
        /* Xabar va tugma orasidagi masofa */
    }

    /* Yopish tugmasi uchun yangi dizayn */
    .close-btn {
        background: none;
        border: none;
        color: #d9534f;
        font-size: 18px;
        cursor: pointer;
        line-height: 1;
        padding: 0;
        transition: color 0.3s ease;
        margin-left: auto;
        font-weight: bold;
    }

    .close-btn:hover {
        color: #c9302c;
        /* Tugma ustida hover effekti uchun to'qroq qizil */
    }
</style>
