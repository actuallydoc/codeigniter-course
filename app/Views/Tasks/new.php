<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Create Task<?= $this->endSection() ?>
<?= $this->section('content') ?>

<?php if(session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>
<?= form_open("/tasks/create") ?>
    <?= $this->include('Tasks/form') ?>
        <button type="submit">Create</button>

<button >
    <a href="<?= site_url('/tasks')?>">Cancel</a>
</button>
</form>
<?= $this->endSection() ?>
