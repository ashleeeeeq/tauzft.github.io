<nav class="navbar">
    <div class="container">
        <ul class="nav-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="/cart">Cart</a></li>
            <li><a href="/order/track">Track Order</a></li>
            <?php if (session()->get('logged_in')): ?>
                <li><a href="/orders">My Orders</a></li>
                <li><a href="/messages">Messages</a></li>
                <li><a href="/profile"><?= esc(session()->get('user_name')) ?></a></li>
                <?php if (session()->get('user_role') === 'admin'): ?>
                    <li><a href="/admin">Admin</a></li>
                <?php endif; ?>
                <li><a href="/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
