<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>
<?php if(session()->has('user_id')) : ?>
<?= current_user()->name ?>
<?php else : ?>
Home
<?php endif ?>
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<h1>Home index</h1>


<?= $this->endSection() ?>