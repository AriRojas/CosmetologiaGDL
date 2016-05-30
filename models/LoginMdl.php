<?php
    /**
    * 
    */
    class LoginUsuario
    {
        private $ERR_DB = -1;
        public $nombre;
        public $apelidoP;
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
                $sql = "SELECT correoElectronico , password , nombre , apellidoPaterno FROM Usuario WHERE correoElectronico = \"$mail\"";
                $resultado = $conexion->query($sql);
                $resultado = $resultado->fetch_row();
                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    if ($mail == $resultado[0] && $pass == $resultado[1]) {
                        $this->nombre=$resultado[2];
                        $this->apellidoP=$resultado[3];
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