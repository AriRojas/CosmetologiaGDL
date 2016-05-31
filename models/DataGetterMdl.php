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

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno, correoElectronico FROM Usuario WHERE idUsuario = $busqueda";

            $resultado = $conexion->query($sql);
            $resultado = $resultado->fetch_row();
                if(empty($resultado))
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

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno, correoElectronico FROM Usuario WHERE correoElectronico LIKE \"%$busqueda%\"";

            $resultado = $conexion->query($sql);
            /*while ($row = $resultado->fetch_assoc()) {
                //$this->resultadoFinal
                var_dump($row);
            }*/
            $resultado = $resultado->fetch_row();
                if(empty($resultado))
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

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno, correoElectronico FROM Usuario WHERE nombre LIKE \"%$busqueda%\" OR apellidoPaterno LIKE \"%$busqueda%\" OR apellidoMaterno LIKE \"%$busqueda%\"";

            $resultado = $conexion->query($sql);
            //$resultado = $resultado->fetch_row();
                if(empty($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    return $resultado;
                }

            $conexion->close();
        }

        public function obtenerTodosUsuarios()
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno, correoElectronico FROM Usuario";

            $resultado = $conexion->query($sql);
            if (empty($resultado)) {
                return $this->ERR_DB;
            }
            else
            {
                return $resultado;
            }
            $conexion->close();
        }

        public function obtenerUsuarioLoggeado($busqueda)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);
            
            $sql = "SELECT * FROM Usuario WHERE idUsuario = $busqueda";

            $resultado = $conexion->query($sql);
            $resultado = $resultado->fetch_row();
                if(empty($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    return $resultado;
                }

            $conexion->close();
        }

        public function obtenerCitasUsuario($idUsuario)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT (C.idCita, T.nombreTratamiento, C.fechaAsignacion, C.horaAsignacion, E.nombreEstado)".
                    "FROM Citas AS C".
                    "JOIN Tratamiento AS T".
                    "ON C.idTratamiento = T.idTratamiento".
                    "JOIN EstadosCitas AS E".
                    "ON C.idEstadoCita = E.idEstado WHERE NOT(E.idEstado = 3)";

            $resultado = $conexion->query($sql);
            var_dump($resultado);
            //$resultado = $resultado->fetch_row();

            //var_dump($resultado);
            /*$repite = "";
            
            while ($row = $resultado->fetch_assoc()) {
                $id = $row['idTratamiento'];
                $sql = "SELECT nombreTratamiento FROM Tratamiento WHERE idTratamiento = $id";
                
                $tratamiento = $conexion->query($sql);
                $tratamiento = $tratamiento->fetch_row();
                //echo "<br/>" . $tratamiento[0];
                //var_dump($tratamiento);

                $repite = $repite . 
                        "<tr>" .
                            "<td>$row['idCita']</td>".
                            "<td>$tratamiento[0]</td>".
                            "<td>$row['fechaAsignada'] $row['horaAsignada']</td>".
                            "<td>$row['idEstado']</td>".
                        "</tr>";
                //var_dump($row);

            }*/

            $conexion->close();
            return $repite;
        }
    }
?>