<?php
    /**
    * 
    */
    class ConexionDb
    {
        public $conexion;
        
        function __construct()
        {
            # code...
        }

        function crearConexion()
        {
            require('config.inc');
            $conexion = mysqli($servidor, $usuario, $password, $database);

            if($conexion -> connect_errno)
            {
                echo "Oh no! Ha ocurrido un error.";
                echo "<br /> $conexion->connect_errno";
            }
        }
    }

?>