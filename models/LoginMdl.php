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

            if ($conexion -> connect_errno) {
                # code...
                echo "Oh no! Ha ocurrido un error con la base de datos!";
                echo "<br>$conexion->connect_errno";
                return $this->ERR_DB;
            }
            else
            {
                $sql = "SELECT * FROM Usuario WHERE correoElectronico = \"$mail\"";
                echo $sql;
                $resultado = $conexion->query($sql);
                $resultado = $resultado->fetch_row();

                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    if ($mail == $resultado["correoElectronico"] && $pass == $resultado["password"]) {
                        return 1;
                    }
                    else{
                        return -1;
                    }
                }
            }

            $conexion->close();

        }
    }


?>