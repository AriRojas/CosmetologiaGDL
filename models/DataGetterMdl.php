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
            //var_dump($resultado);
            if(empty($resultado))
            {
                return -1;
                //echo "vacio";
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

            $sql = "SELECT idUsuario, nombre, apellidoPaterno, apellidoMaterno, correoElectronico FROM Usuario WHERE NOT(tipoUsuario = 1)";

            $resultado = $conexion->query($sql);
            //var_dump($resultado);
            /*while ($row = $resultado->fetch_assoc()) {
                echo "<br/>";
                var_dump($row);
            }*/

            $conexion->close();
            return $resultado;
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

        public function obtenerCitasUsuario()
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT C.idCita, T.nombreTratamiento, C.fechaAsignacion, C.horaAsignacion, E.nombreEstado, C.idUsuario FROM Citas AS C JOIN Tratamiento AS T ON C.idTratamiento = T.idTratamiento JOIN EstadosCitas AS E ON C.idEstadoCita = E.idEstado WHERE NOT(E.idEstado = 3)";

            $resultado = $conexion->query($sql);
        
            $conexion->close();
            return $resultado;
        }

        public function obtenerHistorialUsuario()
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql = "SELECT T.nombreTratamiento, C.fechaAsignacion, C.horaAsignacion, E.nombreEstado, C.idUsuario FROM Citas AS C JOIN Tratamiento AS T ON C.idTratamiento = T.idTratamiento JOIN EstadosCitas AS E ON C.idEstadoCita = E.idEstado WHERE E.idEstado = 1";

            $resultado = $conexion->query($sql);

            $conexion->close();
            return $resultado;
        }


        public function obtenerCitasAdmin()
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql1 = "SELECT C.idCita, T.nombreTratamiento, C.fechaAsignacion, C.horaAsignacion, E.nombreEstado, C.idUsuario FROM Citas AS C JOIN Tratamiento AS T ON C.idTratamiento = T.idTratamiento JOIN EstadosCitas AS E ON C.idEstadoCita = E.idEstado WHERE NOT (E.idEstado =3)";

            $resultado = "";
            $infoCita = $conexion->query($sql1);
            while ($row = $infoCita->fetch_assoc()) {
                /*echo "<br/>";
                var_dump($row);
*/
                $idCita = $row['idCita'];
                $tratamiento = $row['nombreTratamiento'];
                $fecha = $row['fechaAsignacion'];
                $hora = $row['horaAsignacion'];
                $estado = $row['nombreEstado'];
                $usuarioID = $row['idUsuario'];
                
                $sql2 = "SELECT U.nombre, U.apellidoPaterno, U.idUsuario FROM Usuario AS U WHERE U.idUsuario = $usuarioID";
                
                $infoUsuario = $conexion->query($sql2);

                while ($row2 = $infoUsuario->fetch_assoc()) {
                    /*echo "<br/>";
                    var_dump($row2);*/
                    $nombre = $row2['nombre'];
                    $apPaterno = $row2['apellidoPaterno'];


                    $resultado = $resultado.
                            "<tr>" .
                                "<td><input type=\"radio\" name=\"selectedRendezVous\" value=\"$idCita\"></td>".
                                "<td>$idCita</td>".
                                "<td>$nombre $apPaterno</td>".
                                "<td>$tratamiento</td>".
                                "<td>$fecha / $hora hrs.</td>".
                                "<td>$estado</td>".
                            "</tr>";
                }
            }


            $conexion->close();
            return $resultado;
        }

    }
?>