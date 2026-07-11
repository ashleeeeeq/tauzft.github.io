<div class="admin-dashboard">
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="dashboard-stats">
            <div class="stat-card">
                <h3>Products</h3>
                <p class="stat-number"><?= $totalProducts ?></p>
                <a href="/admin/products">Manage</a>
            </div>
            <div class="stat-card">
                <h3>Orders</h3>
                <p class="stat-number"><?= $totalOrders ?></p>
                <a href="/admin/orders">Manage</a>
            </div>
            <div class="stat-card">
                <h3>Users</h3>
                <p class="stat-number"><?= $totalUsers ?></p>
                <a href="/admin/customers">Manage</a>
            </div>
        </div>
        <div class="dashboard-links">
            <a href="/admin/products" class="btn btn-primary">Manage Products</a>
            <a href="/admin/orders" class="btn btn-primary">Manage Orders</a>
            <a href="/admin/customers" class="btn btn-primary">Manage Customers</a>
            <a href="/admin/categories" class="btn btn-primary">Manage Categories</a>
            <a href="/admin/reports" class="btn btn-primary">View Reports</a>
        </div>
    </div>
</div>
