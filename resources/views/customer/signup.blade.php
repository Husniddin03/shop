<!-- resources/views/auth/signup.blade.php -->
<div class="login-container">
    <a href="{{ route('index') }}" class="logout-btn">Chiqish</a>

    <div class="login-box">
        <div class="login-left">
            <h2>Sign Up</h2>
            <form action="{{ route('register')}} " method="POST">
                @csrf
                <div class="input-group">
                    <label for="firstname">First name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
                </div>
                <div class="input-group">
                    <label for="lastname">Last name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
                </div>
                <div class="input-group">
                    <label for="phone_number">Phone number</label>
                    <input type="text" id="phone" name="phone_number" placeholder="Enter your phone number" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="login-btn">Sign up</button>
            </form>
            <p>Do you have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
        <div class="login-right">
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

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .login-box {
        display: flex;
        background-color: #0d1a2f;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
    }

    .login-left,
    .login-right {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 50%;
    }

    .login-left {
        background-color: #0d1a2f;
    }

    .login-right {
        background-color: #00a5c9;
        color: #fff;
        text-align: center;
    }

    .login-left h2,
    .login-right h2 {
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

    .login-btn {
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

    .login-btn:hover {
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
</style>
