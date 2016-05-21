<?php
    /**
    * 
    */
    class Entrar
    {
        
        function __construct()
        {
            
        }

        function cargarEntrar(){
            $header = file_get_contents('views/header.html');
            $body   = file_get_contents('views/entrar.html');
            $footer = file_get_contents('views/footer.html');

            $view = $header . $body . $footer;
            echo $view;

        }

    }

?>