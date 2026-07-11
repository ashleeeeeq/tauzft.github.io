<div class="checkout">
    <div class="container">
        <h1>Checkout</h1>
        <form action="/checkout/payment" method="POST">
            <div class="checkout-section">
                <h2>Contact Information</h2>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="phone" placeholder="Phone" required>
            </div>
            <div class="checkout-section">
                <h2>Shipping Address</h2>
                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="city" placeholder="City" required>
                <input type="text" name="zip_code" placeholder="ZIP Code" required>
            </div>
            <div class="checkout-section">
                <h2>Order Summary</h2>
                <?php foreach ($cart as $item): ?>
                    <div class="summary-item">
                        <span><?= esc($item['name']) ?> x <?= $item['quantity'] ?></span>
                        <span>$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
                    </div>
                <?php endforeach; ?>
                <div class="summary-total">
                    <span>Total:</span>
                    <span>$<?= number_format($total, 2) ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Continue to Payment</button>
        </form>
    </div>
</div>
