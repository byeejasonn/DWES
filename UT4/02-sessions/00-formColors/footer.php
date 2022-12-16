<?php
    include('./vars.php');
    $name = empty($name)?'anonymous':$name;
    $current = isset($_GET['current'])?$_GET['current']:0;
    $urls = [
        ['name'=> 'página1', 'url' => './pagina1.php?current=0'],
        ['name'=> 'página2', 'url' => './pagina2.php?current=1'],
        ['name'=> 'config', 'url' => './config.php?current=2'],
    ];

    function pintarLinks($urls, $current) {
?>
        <?php foreach ($urls as $key => $link) : ?>
            <a href="<?= $link['url'] ?>" class="link <?= ($key == $current)?'current':'' ?>" ><?= $link['name'] ?></a>
        <?php endforeach;  ?>
<?php
    }
?>

<footer class="footer">
    <?= pintarLinks($urls, $current) ?>
    <span class="name">User: <?= $name ?></span>
</footer>