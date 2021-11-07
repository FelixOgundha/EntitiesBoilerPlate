<?= $this->extend("Layouts/default") ?>

<?= $this->section("content")?>
    <h2>Hello World</h2>
    <ul>
        <?php foreach($data as $info){ ?>
          <li><?=$info['task']?> | <?=$info['task_description']?> | <span><a href="<?=site_url('/Task/show/')?><?=$info['task_id']?>">view</a></span></li>
        <?php } ?>
    </ul>
    <a href="<?=site_url('/Task/new/')?>">Add Task</a>
<?= $this->endSection()?>