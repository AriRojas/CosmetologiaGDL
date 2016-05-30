<?php
    /**
    * 
    */
    class DataGetter
    {
        private $ERR_DB = -1;
        
        function __construct()
        {
            # code...
        }

        public function obtenerUsuarioById($busqueda)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno FROM Usuario WHERE idUsuario = $busqueda";

            $resultado = $conexion->query($sql);
            $resultado = $resultado->fetch_row();
                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    return $resultado;
                }

            $conexion->close();
        }

        public function obtenerUsuarioByMail($busqueda)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno FROM Usuario WHERE correoElectronico LIKE \"%$busqueda%\"";

            $resultado = $conexion->query($sql);
            $resultado = $resultado->fetch_row();
                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    return $resultado;
                }

            $conexion->close();
        }


        public function obtenerUsuarioByNombre($busqueda)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno FROM Usuario WHERE nombre LIKE \"%$busqueda%\" OR apellidoPaterno LIKE \"%$busqueda%\" OR apellidoMaterno LIKE \"%$busqueda%\"";

            $resultado = $conexion->query($sql);
            $resultado = $resultado->fetch_row();
                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    return $resultado;
                }

            $conexion->close();
        }
    }
?>