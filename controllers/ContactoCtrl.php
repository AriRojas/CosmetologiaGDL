<?php

    class Contacto
    {
        
        function __construct()
        {
            //echo "Contacto";
        }

        function cargarContacto()
        {
            $header = file_get_contents('views/header.html');
            $contacto = file_get_contents('views/contacto.html');
            $footer = file_get_contents('views/footer.html');

            $view = $header . $contacto . $footer;
            echo $view;

        }

        function enviarCorreo()
        {
            /*Tomar evento del botón enviar*/
        }
    }
?>