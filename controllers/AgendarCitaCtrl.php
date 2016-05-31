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

            $time = strtotime($fecha);
            $newformat = date('Y-m-d',$time);
            //echo $newformat;

            //echo $fecha;
            //return -1;
            return $model->agendarCitaUsuarios($idUsuario, $tratamiento, $newformat, $hora);
        }
        
    }
?>