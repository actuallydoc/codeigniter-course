<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Login<?= $this->endSection() ?>
<?= $this->section('content') ?>
<h1>Login user</h1>



<?php if(session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?= form_open("/login/create") ?>

<div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?= old('email') ?>">
</div>
<div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
</div>

<button type="submit">Log in</button>
<button><a href="<?= site_url('/') ?>">
        Cancel
    </a></button>
</form>


<?= $this->endSection() ?>
