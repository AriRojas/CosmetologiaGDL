<?php
    /**
    * 
    */
    class LoginUsuario
    {
        private $ERR_DB = -1;
        
        function __construct()
        {
            # code...
        }

        public function Entrar($mail, $pass)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            var_dump($conexion);
            if ($conexion -> connect_errno) {
                # code...
                echo "Oh no! Ha ocurrido un error con la base de datos!";
                echo "<br>$conexion->connect_errno";
                return $this->ERR_DB;
            }
            else
            {
                $sql = "SELECT * FROM Usuario WHERE correoElectronico = \"$mail\"";

                $resultado = $conexion->query($sql);
                $resultado = $resultado->fetch_row();

                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    //var_dump($resultado);
                    echo "Valida que haga match";
                }
            }

            $conexion->close();

        }
    }


?>