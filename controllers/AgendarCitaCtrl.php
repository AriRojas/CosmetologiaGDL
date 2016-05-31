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

            //var_dump($_POST);
            /*if (empty($_POST)) {
                echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>ERROR!</strong><p>Llene los campos necesarios.</p> 
                    </div>
                    ';
                header('Location: ?ctl=miPerfil&nav=calendarioUsuario');
            }
            else//if ($_POST['agendarCita'] == 'true')
            {*/
                //echo "eurekaa";
                /*idTratamiento, idEstadoCita*/
                $idUsuario      = $_SESSION['idUsuario'];
                $tratamiento    = $_POST['tratamiento'];
                $fecha          = $_POST['fecha'];
                $hora           = $_POST['hora'];

                $resultado = $model->agendarCitaUsuarios($idUsuario, $tratamiento, $fecha, $hora);
            //}
        }
        
    }
?>