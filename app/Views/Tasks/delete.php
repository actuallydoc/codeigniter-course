<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Delete Task<?= $this->endSection() ?>
<?= $this->section('content') ?>

<h1>Delete task</h1>
    <p>Are you sure?</p>
        <?= form_open("/tasks/delete/".$id) ?>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="<?= site_url("/tasks/show/{$id}") ?>" class="btn btn-secondary">Cancel</a>
    </form>
<?= $this->endSection() ?>


