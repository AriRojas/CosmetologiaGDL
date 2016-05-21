<?php
    /**
    * 
    */
    class Registro
    {
        
        function __construct()
        {
           
        }

        function cargarRegistro(){
            $header = file_get_contents('views/header.html');
            $body   = file_get_contents('views/registro.html');
            $form   = file_get_contents('views/formDatosUsuario.html');
            $footer = file_get_contents('views/footer.html');

            $body   = str_replace ( '{{FORMUSUARIO}}' ,  $form  ,  $body);
            $view   = $header . $body . $footer;
            echo $view;

        }


    }




?>