<?= $this->extend("Layouts/default") ?>

<?= $this->section("content")?>

    <h2><?= session('info')?></h2>
    <h2><?=$data->task?></h2>
     <p><?= $data->task_description?></p>
     
     <a href="<?=site_url('Task/index')?>">Back</a>

     <a href="<?=site_url('Task/edit/').$data->task_id ?>">Edit</a>
<?= $this->endSection()?>