<div class="shop">
    <div class="container">
        <h1>Our Flowers</h1>

        <form class="search-bar" action="/shop" method="GET">
            <input type="text" name="q" placeholder="Search flowers..." value="<?= esc($searchQuery ?? '') ?>">
            <button type="submit" class="btn">Search</button>
        </form>

        <div class="category-filter">
            <a href="/shop" class="<?= !$selectedCategory ? 'active' : '' ?>">All</a>
            <?php foreach ($categories as $category): ?>
                <a href="/shop?category=<?= $category->id ?>"
                   class="<?= $selectedCategory == $category->id ? 'active' : '' ?>">
                    <?= esc($category->name) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="products-grid">
            <?php if (empty($products)): ?>
                <p class="no-results">No products found.</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <a href="/product/<?= $product->id ?>">
                            <img src="/uploads/products/<?= esc($product->image) ?>" alt="<?= esc($product->name) ?>">
                        </a>
                        <div class="product-info">
                            <h3><a href="/product/<?= $product->id ?>"><?= esc($product->name) ?></a></h3>
                            <p class="product-price">$<?= number_format($product->price, 2) ?></p>
                            <form action="/cart/add" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
