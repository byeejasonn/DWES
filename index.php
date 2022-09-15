<?php 
    $mydir = '.';
    // $files = array_diff(scandir($mydir),array('.','..','index.php'));
    
    function directory($mydir){
        $files = array_diff(scandir($mydir),array('.','..','index.php','css'));
?>
    <ul>
        <?php 
            foreach($files as $file) {
                if(is_dir($mydir."/".$file)) {
        ?>
                    <li>
                        <input type="checkbox" id="checkbox-<?= 
                        str_replace(array(".","/"),array("home","-"),$mydir)."-".$file?>">

                        <label for="checkbox-<?= 
                        str_replace(array(".","/"),array("home","-"),$mydir)."-".$file?>"><b><?= $file ?></b></label>

                        <?php directory($mydir."/".$file); ?>
                    </li>
        <?php   } else {
                    echo "<li><a href=".$mydir."/".$file.">".$file."</a></li>";
                }
            }
        ?>
    </ul>

<?php } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>  
        <header>
            <h2>Jason Londoño Barreto DAW2</h2>
        </header>
        <main>
            <h3>Listado</h3>
            <div class="list">
                <?php 
                    // foreach($files as $file) {
                    //     if(is_dir($mydir."/".$file)) {
                    //         echo "<li><b>".$file."</b></li>";
                    //         directory($mydir."/".$file);
                    //     } else {
                    //         echo "<li><a href=".$mydir."/".$file.">".$file."</a></li>";
                    //     }
                    // }
                    directory($mydir);
                ?>
            </div>
        </main>
</body>
</html>