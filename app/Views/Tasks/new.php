<?= $this->extend("Layouts/default") ?>

<?= $this->section("content")?>

    <?php if(session()->has('errors')):?>
        <ul>
            <?php foreach(session('errors') as $error):?>
                <li><?=$error?></li>
            <?php endforeach;?>
        </ul>
        
    <?php endif?>
    <form action="<?=site_url("Task/create")?>" method="post">
        <input type="text" name="task"><br>
        <input type="text" name="task_description"><br>
        <br>
        <button type="submit">Add</button>
    </form>
<?= $this->endSection()?>