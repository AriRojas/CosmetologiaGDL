<?php
    /**
    * 
    */
    class AgendarCita
    {
        
        function __construct()
        {
            # code...
        }

        public function solicitarCitaUsuarios()
        {
            //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaah";
            require_once('models/AgendarCitasMdl.php');
            $model = new AgendarCitas();

            $idUsuario      = $_SESSION['idUsuario'];
            $tratamiento    = $_POST['tratamiento'];
            $fecha          = $_POST['fecha'];
            $hora           = $_POST['hora'];

            //echo $tratamiento;

            $time = strtotime($fecha);
            $newformat = date('Y-m-d',$time);
            //echo $newformat;

            //echo $idUsuario . " " . $tratamiento . " " . $fecha . " " . $hora;
            //echo $fecha;
            //return -1;
            return $model->agendarCitaUsuarios($idUsuario, $tratamiento, $newformat, $hora);
        }

        public function solicitarCitaAdmin()
        {
            require_once('models/AgendarCitasMdl.php');
            $model = new AgendarCitas();

            $idUsuario      = $_POST['selectedUser'];
            $tratamiento    = $_POST['tratamiento'];
            $fecha          = $_POST['fecha'];
            $hora           = $_POST['hora'];

            $time = strtotime($fecha);
            $newformat = date('Y-m-d',$time);

            //echo $tratamiento;
            //echo "EEEUUREEEKAAAA";
            return $model->agendarCitaAdmin($idUsuario, $tratamiento, $newformat, $hora);
        }
        
    }

    /**
    * 
    */
    class ConfiguraCitas
    {
        
        function __construct()
        {
            # code...
        }

        public function modificaEstadoCita()
        {
            require_once('models/AgendarCitasMdl.php');
            $model = new ManageRendezVous();

            $accion         = $_POST['accion'];
            $idCita         = $_POST['selectedRendezVous'];
            //$estadoActual   = 

            if ($accion == 'Aceptar') {
                return $model->aceptarCita($idCita);
            }
            elseif ($accion == 'Cancelar') {
                return $model->cancelarCita($idCita);
            }
        }

    }
?>