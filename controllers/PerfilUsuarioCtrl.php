<?php
    /**
    * 
    */
    class PerfilUsuario
    {
        
        function __construct()
        {
            # code...
        }

        public function cargarPerfilUsuario()
        {
            $header = file_get_contents('views/header.html');
            $perfilUsuario = file_get_contents('views/perfilUsuario.html');
            $footer = file_get_contents('views/footer.html');

            $view = $header . $perfilUsuario . $footer;
            echo $view;
        }
    }
?>