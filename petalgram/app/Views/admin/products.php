<div class="admin-products">
    <div class="container">
        <h1>Manage Products</h1>
        <a href="/admin/products/add" class="btn btn-primary">Add New Product</a>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= esc($product->name) ?></td>
                        <td>$<?= number_format($product->price, 2) ?></td>
                        <td><?= $product->stock ?></td>
                        <td><?= esc($product->category_name) ?></td>
                        <td>
                            <a href="/admin/products/edit/<?= $product->id ?>" class="btn btn-small">Edit</a>
                            <form action="/admin/products/delete/<?= $product->id ?>" method="POST" style="display:inline">
                                <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
