<!doctype html>
<html lang="en">
<head>
    <!-- This is the default layout which can be used for dynamic data -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->renderSection('title') ?></title>
</head>
<h1>Header</h1>
<body>
<?php if(current_user()) : ?>
    <p>You are logged in as <?= current_user()->name ?></p>
    <a href="<?= site_url('/tasks') ?>">Tasks</a>
    <a href="<?= site_url('/logout') ?>">
        Log out
    </a>
<?php else : ?>
    <a href="<?= site_url('/signup') ?>">
        Create account
    </a>

    <a href="<?= site_url('/login') ?>">
        Log in
    </a>
<?php endif ?>
<!-- Flashdata is a session that will only be available for one request and if there is any u can show the message -->
<?php if(session()->has('warning')): ?>
    <div>
        <?= session('warning') ?>
    </div>
<?php endif ?>
<?php if(session()->has('info')): ?>
    <div>
        <?= session('info') ?>
    </div>
<?php endif ?>
<?= $this->renderSection('content') ?>
</body>
</html>