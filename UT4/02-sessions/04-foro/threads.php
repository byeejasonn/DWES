<?php 
    session_start();

    // autoload
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path{$file}.php");
    });

    if (isset($_GET['p'])) : 

        $page = $_GET['p'];

        $repliesForm = new \php\Config\Form();

        @$repliesForm->crearInputsReply($_POST);
        
        $repliesForm->printThreads($repliesForm, $page);
    else : 
        http_response_code(404);

    endif;

?>