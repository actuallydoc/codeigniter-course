<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Create user<?= $this->endSection() ?>
<?= $this->section('content') ?>
<h1>Create user</h1>



<?php if(session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?= form_open("/signup/create") ?>


    <div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= old('name') ?>">
    </div>
<div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?= old('email') ?>">
</div>
    <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    </div>
<div>
    <label for="password">Confirm Password</label>
    <input type="password" name="password_confirm" id="password"">
</div>
    <button type="submit">Signup</button>
    <button><a href="<?= site_url('/') ?>">
            Cancel
        </a></button>
</form>


<?= $this->endSection() ?>
