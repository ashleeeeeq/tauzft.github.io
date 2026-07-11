<div class="profile-page">
    <div class="container">
        <h1>My Profile</h1>
        <form action="/profile/update" method="POST">
            <input type="text" name="name" value="<?= esc($user->name) ?>" placeholder="Name" required>
            <input type="email" name="email" value="<?= esc($user->email) ?>" placeholder="Email" required>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        <div class="profile-info">
            <p><strong>Role:</strong> <?= ucfirst($user->role) ?></p>
            <p><strong>Member since:</strong> <?= date('M d, Y', strtotime($user->created_at)) ?></p>
        </div>
    </div>
</div>
