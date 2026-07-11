<div class="product-details">
    <div class="container">
        <div class="product-content">
            <div class="product-image">
                <img src="/uploads/products/<?= esc($product->image) ?>" alt="<?= esc($product->name) ?>">
            </div>
            <div class="product-info">
                <h1><?= esc($product->name) ?></h1>
                <p class="category"><?= esc($product->category_name) ?></p>
                <p class="price">$<?= number_format($product->price, 2) ?></p>
                <p class="description"><?= esc($product->description) ?></p>
                <div class="stock">
                    <?php if ($product->stock > 0): ?>
                        <span class="in-stock">In Stock (<?= $product->stock ?> available)</span>
                    <?php else: ?>
                        <span class="out-of-stock">Out of Stock</span>
                    <?php endif; ?>
                </div>
                <?php if ($product->stock > 0): ?>
                    <form action="/cart/add" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product->id ?>">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
