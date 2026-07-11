<div class="auth-page">
    <div class="container">
        <h1>Register</h1>
        <form action="/register" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p class="toggle-auth">Already have an account? <a href="/login">Login</a></p>
    </div>
</div>
