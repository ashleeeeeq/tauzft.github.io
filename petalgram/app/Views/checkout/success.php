<div class="order-success">
    <div class="container">
        <div class="success-icon">&#10003;</div>
        <h1>Order Placed Successfully!</h1>
        <p>Thank you for your order. We'll send you a confirmation email shortly.</p>
        <p>Order ID: #<?= $orderId ?></p>
        <div class="success-actions">
            <a href="/order/track?id=<?= $orderId ?>" class="btn btn-primary">Track Order</a>
            <a href="/shop" class="btn">Continue Shopping</a>
        </div>
    </div>
</div>
