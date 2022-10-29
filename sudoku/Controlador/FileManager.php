<?php
    $cont = 0;
    foreach ($_POST as $key => $value) {
        echo "$key => $value  ";
        $cont++;
        if ($cont == 9) {
            echo "<br>";
            $cont = 0;
        }
    }