<?php
    /**
    * 
    */
    class Nosotros
    {
        
        function __construct()
        {
            //echo "Nosotros";
        }

        function cargarNosotros()
        {
            $header = file_get_contents('views/header.html');
            $nosotros = file_get_contents('views/nosotros.html');
            $footer = file_get_contents('views/footer.html');

            $view = $header . $nosotros . $footer;
            echo $view;
        }
    }

?>