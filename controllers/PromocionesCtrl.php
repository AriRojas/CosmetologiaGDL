<?php
    /**
    * 
    */
    class Promociones
    {
        
        function __construct()
        {
            
        }

        function cargarPromociones()
        {
            //$header = file_get_contents('views/header.html');
            require_once('controllers/LoginCtrl.php');
            $login = new Login();

            $header = $login->cargarHeader();
            $promos = file_get_contents('views/promociones.html');
            $footer = file_get_contents('views/footer.html');

            $view = $header . $promos . $footer;
            echo $view;
        }

    }

?>