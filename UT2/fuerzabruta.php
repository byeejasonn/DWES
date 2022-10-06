<?php
$passwd = '';
$pass = false;

while(!$pass) {

    for ($i=97; $i < 123; $i++) {
        for ($j=97; $j < 123; $j++) { 
            for ($k=97; $k < 123; $k++) {
                for ($l=97; $l < 123; $l++) { 
                    $passwd = chr($i).chr($j).chr($k).chr($l);
                    if(password_verify("$passwd", '$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72')){
                        $pass = true;
                        break;
                    }
                }
            }
        }   
    }
}

echo "Contraseña: $passwd";

?>