<?php
    
    class Index
    {
        
        function __construct()
        {
            //echo 'We are in index';
        }


        function cargarInicio()
        {
            //$header = file_get_contents('views/header.html');
            require_once('controllers/LoginCtrl.php');
            $login = new Login();

            $header = $login->cargarHeader();
            $carousel = file_get_contents('views/myCarousel.html');
            $vista = file_get_contents('views/principal.html');
            $footer = file_get_contents('views/footer.html');

            $vista = $header . $carousel . $vista . $footer;
            echo $vista;
        }


        public function Ejecutar()
        {
            //session_start();
            $this->cargarInicio();
        }
    }

?>