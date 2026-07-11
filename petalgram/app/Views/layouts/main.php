<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Petalgram') ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <?php if (session()->get('user_role') === 'admin'): ?>
        <link rel="stylesheet" href="/css/admin.css">
    <?php endif; ?>
</head>
<body>
    <?= $this->render('layouts/header') ?>
    <?= $this->render('layouts/navbar') ?>

    <main>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?= $this->render($content, $data ?? []) ?>
    </main>

    <?= $this->render('layouts/footer') ?>
    <script src="/js/main.js"></script>
</body>
</html>
