<div class="admin-orders">
    <div class="container">
        <h1>Manage Orders</h1>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order->id ?></td>
                        <td><?= esc($order->customer_name ?? 'Guest') ?></td>
                        <td>$<?= number_format($order->total, 2) ?></td>
                        <td><span class="status-badge status-<?= $order->status ?>"><?= ucfirst($order->status) ?></span></td>
                        <td><?= date('M d, Y', strtotime($order->created_at)) ?></td>
                        <td>
                            <form action="/admin/orders/update/<?= $order->id ?>" method="POST" class="status-form">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" <?= $order->status === 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="processing" <?= $order->status === 'processing' ? 'selected' : '' ?>>Processing</option>
                                    <option value="shipped" <?= $order->status === 'shipped' ? 'selected' : '' ?>>Shipped</option>
                                    <option value="delivered" <?= $order->status === 'delivered' ? 'selected' : '' ?>>Delivered</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
