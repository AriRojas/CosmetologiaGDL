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

        public function agendarCitaUsuarios($idUsuario, $nombreTratamiento, $fechaHora)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            /*SE OBTIENE EL ID DEL TRATAMIENTO SOLICITADO*/
            $sql = "SELECT idTratamiento FROM Tratamiento WHERE nombreTratamiento LIKE \"%$nombreTratamiento%\"";
            $idTratamiento = $conexion->query($sql);
            $idTratamiento = $idTratamiento->fetch_row();

            /*EL ESTADO DE LA CITA SERÁ 4 -> EN ESPERA*/
            $idEstadoCita = 4;

            /*PROCEDEMOS A VERIFICAR QUE NO EXISTA OTRA CITA MISMA FECHA MISMA HORA*/
            $sql = "SELECT fechaAsignacion FROM Citas";
            $conexion->close();
        }
    }

?>