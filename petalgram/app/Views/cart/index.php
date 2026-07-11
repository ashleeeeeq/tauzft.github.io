<div class="cart">
    <div class="container">
        <h1>Shopping Cart</h1>

        <?php if (empty($cart)): ?>
            <div class="empty-cart">
                <p>Your cart is empty.</p>
                <a href="/shop" class="btn btn-primary">Continue Shopping</a>
            </div>
        <?php else: ?>
            <div class="cart-content">
                <div class="cart-items">
                    <?php foreach ($cart as $item): ?>
                        <div class="cart-item">
                            <img src="/uploads/products/<?= esc($item['image']) ?>" alt="<?= esc($item['name']) ?>">
                            <div class="cart-item-details">
                                <h3><?= esc($item['name']) ?></h3>
                                <p class="cart-item-price">$<?= number_format($item['price'], 2) ?></p>
                                <div class="cart-item-quantity">
                                    <form action="/cart/update/<?= $item['id'] ?>" method="POST" style="display:inline">
                                        <input type="hidden" name="quantity" value="<?= $item['quantity'] - 1 ?>">
                                        <button type="submit" class="btn-small">-</button>
                                    </form>
                                    <span><?= $item['quantity'] ?></span>
                                    <form action="/cart/update/<?= $item['id'] ?>" method="POST" style="display:inline">
                                        <input type="hidden" name="quantity" value="<?= $item['quantity'] + 1 ?>">
                                        <button type="submit" class="btn-small">+</button>
                                    </form>
                                </div>
                            </div>
                            <form action="/cart/remove/<?= $item['id'] ?>" method="POST">
                                <button type="submit" class="btn btn-danger btn-small">Remove</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="order-summary">
                    <h2>Order Summary</h2>
                    <div class="summary-items">
                        <?php foreach ($cart as $item): ?>
                            <div class="summary-item">
                                <span><?= esc($item['name']) ?> x <?= $item['quantity'] ?></span>
                                <span>$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="summary-total">
                        <span>Total:</span>
                        <span>$<?= number_format($total, 2) ?></span>
                    </div>
                    <a href="/checkout" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>

            <div class="cart-actions">
                <a href="/shop" class="btn">Continue Shopping</a>
                <form action="/cart/empty" method="POST" style="display:inline">
                    <button type="submit" class="btn btn-danger">Empty Cart</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>
