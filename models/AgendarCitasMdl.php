<?php
    /**
    * 
    */
    class AgendarCitas
    {
        
        function __construct()
        {
            # code...
        }

        public function agendarCitaUsuarios($idUsuario, $tratamiento, $fecha, $hora)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            /*SE OBTIENE EL ID DEL TRATAMIENTO SOLICITADO*/
            /*$sql = "SELECT idTratamiento FROM Tratamiento WHERE nombreTratamiento LIKE \"%$nombreTratamiento%\"";
            $idTratamiento = $conexion->query($sql);
            $idTratamiento = $idTratamiento->fetch_row();*/

            /*EL ESTADO DE LA CITA SERÁ 4 -> EN ESPERA*/
            $idEstadoCita = 4;

            /*PROCEDEMOS A VERIFICAR QUE NO EXISTA OTRA CITA MISMA FECHA MISMA HORA QUE ESTÉ ACEPTADA O EN ESPERA*/
            $sql = "SELECT idCita, fechaAsignacion, horaAsignacion FROM Citas WHERE idEstadoCita = 1 OR idEstadoCita = 4";
            $citas = $conexion->query($sql);

            //QUERY PARA INSERTAR
            $sql = "INSERT INTO Citas (idUsuario, idTratamiento, idEstadoCita, fechaAsignacion, horaAsignacion) VALUES ($idUsuario, $tratamiento, $idEstadoCita, \"$fecha\", $hora)";
            echo $sql;
            
            //SI CITAS ESTÁ VACÍO SIGNIFICA QUE NO HAY CITAS ACEPTADAS O EN ESPERA, INSERTAMOS
            if (empty($citas)) {
                $conexion->query($sql);
            }//SI HAY CITAS REGISTRADAS, VERIFICA LA FECHA Y LA HORA
            else{
                while ($row = $citas->fetch_assoc()) {
                    //Si la fecha y hora de asigación coinciden con la que deseamos insertar, regresa ERROR
                    if($row['fechaAsignacion'] == $fecha && $row['horaAsignacion'] == $hora)
                    {
                        return -1;
                    }
                }

                //SI LOGRA SALIR DEL WHILE, NO HUBO COINCIDENCIAS, POR LO TANTO INSERTA
                $conexion->query($sql);
            }

            return 1;
            $conexion->close();
        }



        public function agendarCitaAdmin($idUsuario, $nombreTratamiento, $fecha, $hora)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            /*SE OBTIENE EL ID DEL TRATAMIENTO SOLICITADO*/
            $sql = "SELECT idTratamiento FROM Tratamiento WHERE nombreTratamiento LIKE \"%$nombreTratamiento%\"";
            $idTratamiento = $conexion->query($sql);
            $idTratamiento = $idTratamiento->fetch_row();

            /*ESTADO ACEPATADA*/
            $idEstadoCita = 1;

            /*PROCEDEMOS A VERIFICAR QUE NO EXISTA OTRA CITA MISMA FECHA MISMA HORA QUE ESTÉ ACEPTADA O EN ESPERA*/
            $sql = "SELECT idCita, fechaAsignacion, horaAsignacion FROM Citas WHERE idEstadoCita = 1 OR idEstadoCita = 4";
            $citas = $conexion->query($sql);

            //QUERY PARA INSERTAR
            $sql = "INSERT INTO Citas (idUsuario, idTratamiento, idEstadoCita, fechaAsignacion, horaAsignacion) VALUES ($idUsuario, $idTratamiento[0], $idEstadoCita, \"$fecha\", $hora)";
            //echo $sql;
            
            //SI CITAS ESTÁ VACÍO SIGNIFICA QUE NO HAY CITAS ACEPTADAS O EN ESPERA, INSERTAMOS
            if (empty($citas)) {
                $conexion->query($sql);
            }//SI HAY CITAS REGISTRADAS, VERIFICA LA FECHA Y LA HORA
            else{
                while ($row = $citas->fetch_assoc()) {
                    //Si la fecha y hora de asigación coinciden con la que deseamos insertar, regresa ERROR
                    if($row['fechaAsignacion'] == $fecha && $row['horaAsignacion'] == $hora)
                    {
                        return -1;
                    }
                }

                //SI LOGRA SALIR DEL WHILE, NO HUBO COINCIDENCIAS, POR LO TANTO INSERTA
                $conexion->query($sql);
            }

            return 1;

            $conexion->close();
        }
    }

    /**
    * 
    */
    class ManageRendezVous
    {
        
        function __construct()
        {
            # code...
        }

        public function aceptarCita($idCita)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql1 = "SELECT idEstadoCita FROM Citas WHERE idCita = $idCita";
            $estadoActual = $conexion->query($sql1);
            $estadoActual = $estadoActual->fetch_row();

            //var_dump($estadoActual[0]);
            if($estadoActual[0] == 4)
            {
                $sql2 = "UPDATE Citas SET idEstadoCita = 1 WHERE idCita = $idCita";
                $conexion->query($sql2);
                $conexion->close();
                return 1;
            }
            else
            {
                $conexion->close();
                return -1;
            }

        }

        public function cancelarCita($idCita)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            $sql1 = "SELECT idEstadoCita FROM Citas WHERE idCita = $idCita";
            $estadoActual = $conexion->query($sql1);
            $estadoActual = $estadoActual->fetch_row();

            //var_dump($estadoActual[0]);
            if($estadoActual[0] == 4 || $estadoActual[0] == 1)
            {
                $sql2 = "UPDATE Citas SET idEstadoCita = 2 WHERE idCita = $idCita";
                $conexion->query($sql2);
                $conexion->close();
                return 1;
            }
            else
            {
                $conexion->close();
                return -1;
            }
        }
    }

?>