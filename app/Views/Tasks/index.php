
<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Tasks<?= $this->endSection() ?>
<?= $this->section("content") ?>
<h1>Tasks</h1>
<button>
    <a href="<?= site_url("/tasks/new") ?>">Add task</a>
</button>
<ul>
    <?php foreach($tasks as $task): ?>
        <li>
            <!-- site url is a helper that helps when we change enviroments -->
            <a href="<?= site_url("/tasks/show/". $task->id) ?>">
                <!-- esc is a helper that helps to scape html and prevent xss scripting-->
                <?= esc($task->description) ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<?= $this->endSection() ?>
