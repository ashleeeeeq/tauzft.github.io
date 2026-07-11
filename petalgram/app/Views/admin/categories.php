<div class="admin-categories">
    <div class="container">
        <h1>Manage Categories</h1>
        <form action="/admin/categories/add" method="POST" class="add-form">
            <input type="text" name="name" placeholder="Category Name" required>
            <input type="text" name="description" placeholder="Description">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= esc($category->name) ?></td>
                        <td><?= esc($category->description) ?></td>
                        <td>
                            <a href="/admin/categories/edit/<?= $category->id ?>" class="btn btn-small">Edit</a>
                            <form action="/admin/categories/delete/<?= $category->id ?>" method="POST" style="display:inline">
                                <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
