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

        public function agendarCitaUsuarios()
        {
            require_once('models/AgendarCitasMdl.php');
            $model = new AgendarCitas();

            if (empty($_POST['agendarCita'])) {
                echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>ERROR!</strong><p>Llene los campos necesarios.</p> 
                    </div>
                    ';
                header('Location: ?ctl=miPerfil&nav=calendarioUsuario');
            }
            else
            {
                /*idTratamiento, idEstadoCita*/
                $idUsuario      = $_SESSION['idUsuario'];
                $tratamiento    = $_POST['tratamiento'];
                $fechaHora      = $_POST['fechaHora'];

                
            }
        }
        
    }
?>