<div class="auth-page">
    <div class="container">
        <h1>Login</h1>
        <form action="/login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="toggle-auth">Don't have an account? <a href="/register">Register</a></p>
    </div>
</div>
