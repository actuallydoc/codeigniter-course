<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Task<?= $this->endSection() ?>
<?= $this->section('content') ?>


<h1>Task</h1>
<a href="<?= site_url('/tasks')?>">Back</a>
<dl>
    <dl>ID</dl>
    <dd><?= $task->id ?></dd>

    <dl>Description</dl>
    <dd><?= esc($task->description) ?></dd>

    <dl>Created At</dl>
    <?php if ($task->created_at) : ?>
    <dd><?= $task->created_at ?></dd>
    <?php else : ?>
    <dd>Not set</dd>
    <?php endif ?>
    <dl>Updated At</dl>
    <?php if ($task->updated_at): ?>
    <dd><?= $task->updated_at?></dd>
    <?php else : ?>
    <dd>Not set</dd>
    <?php endif ?>
</dl>

<button >
    <a href="<?= site_url("/tasks/edit/". $task->id) ?>">Edit</a>
</button>
<button >
    <a href="<?= site_url("/tasks/delete/". $task->id) ?>">Delete</a>
</button>

<?= $this->endSection() ?>
