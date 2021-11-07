<?= $this->extend("Layouts/default") ?>

<?= $this->section("content")?>

    <?php if(session()->has('errors')):?>
        <ul>
            <?php foreach(session('errors') as $error):?>
                <li><?=$error?></li>
            <?php endforeach;?>
        </ul>
        
    <?php endif?>
    <p><?=session("warning")?></p>
    <form action="<?=site_url("Task/update/".$data->task_id)?>" method="post">
        <input type="text" name="task" value="<?=$data->task?>"><br>
        <input type="text" name="task_description" value="<?=$data->task_description?>"><br>
        <br>
        <button type="submit">Update</button>
    </form>
<?= $this->endSection()?>