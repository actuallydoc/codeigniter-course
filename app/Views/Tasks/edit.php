<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Task<?= $this->endSection() ?>
<?= $this->section('content') ?>

<h1>Edit Task</h1>


<?= form_open("/tasks/update/". $task->id) ?>
    <?= $this->include('Tasks/form') ?>

    <button type="submit">Update</button>
<a href="<?= site_url("/tasks/show/".$task->id) ?>">Cancel</a>
</button>
<?= $this->endSection() ?>
