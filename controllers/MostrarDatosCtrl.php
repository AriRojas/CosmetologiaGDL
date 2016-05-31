<?php
    /**
    * 
    */
    class AdminDataGetter
    {
        
        function __construct()
        {
            # code...
        }
         public function obtenerPerfil()
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            $resultado = $model->obtenerUsuarioLoggeado($_SESSION['idUsuario']);
            return $resultado;
        }

        public function obtenerUsuariosBuscados()
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();
            if (empty($_POST['busqueda'])) {
                echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>ERROR!</strong><p>Llene los campos necesarios.</p> 
                    </div>
                    ';
                header('Location: ?ctl=perfilAdmin&nav=usuarios');
            }
            else
            {
                $criterio   = $_POST['criterio'];
                $busqueda   = $_POST['busqueda'];

                switch ($criterio) {
                    case '0':
                        echo "Elija un criterio de busqueda";
                        break;
                    
                    case 'id':
                        $resultado = $model->obtenerUsuarioById($busqueda);
                        if($resultado == -1)
                        {
                            echo  '
                                <div class="alert alert-dismissible" id="modalContent">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>ERROR!</strong><p>Ningún usuario registrado con ese ID.</p> 
                                </div>
                                ';
                        }

                        break;

                    case 'mail':
                        $resultado = $model->obtenerUsuarioByMail($busqueda);
                        if($resultado == -1)
                        {
                            echo  '
                                <div class="alert alert-dismissible" id="modalContent">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>ERROR!</strong><p>Ningún usuario registrado con ese correo electrónico.</p> 
                                </div>
                                ';
                        }
                        
                        break;

                    case 'nombre':
                        $resultado = $model->obtenerUsuarioByNombre($busqueda);
                        var_dump($resultado);
                        /*if($resultado == -1)
                        {
                            echo  '
                                <div class="alert alert-dismissible" id="modalContent">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>ERROR!</strong><p>Ningún usuario registrado con ese nombre.</p> 
                                </div>
                                ';
                        }*/
                        
                        break;
                    
                }
                /*($resultado);
                echo "<br/>";
                var_dump($this->resultadoBusqueda);
                */
                //var_dump($resultado);
                return $this->llenaTablaUsuariosBuscados($resultado);
            }
        }

        public function llenaTablaUsuariosBuscados($resultado)
        {
            //var_dump($resultado);
            if($resultado != -1){
                $repite = "";
                $repite = $repite . 
                        "<tr>" .
                            "<td><a href=\"#\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>".
                            "<td>$resultado[0]</td>".
                            "<td>$resultado[1] $resultado[2] $resultado[3]</td>".
                            "<td>$resultado[4]</td>".
                            "<td><a href=\"#\"><span class=\"glyphicon glyphicon-list-alt\"></span></a></td>".
                        "</tr>";

                return $repite;
            }
        }

        public function obtenerTodosUsuarios()
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            $resultado = $model->obtenerTodosUsuarios();
            $repite = "";
            while ($row = $resultado->fetch_assoc()) 
            {
                /*echo "<br/>";
                var_dump($row);*/
                $usuarioID = $row['idUsuario'];
                $nombre = $row['nombre'];
                $apPaterno = $row['apellidoPaterno'];
                $apMaterno = $row['apellidoMaterno'];
                $correo = $row['correoElectronico'];

                $repite = $repite . 
                    "<tr>" .
                        "<td><input type=\"radio\" name=\"selectedUser\" value=\"$usuarioID\"></td>".
                        "<td>$usuarioID</td>".
                        "<td>$nombre $apPaterno $apMaterno</td>".
                        "<td>$correo</td>".
                    "</tr>";
            }

            return $repite;
        }

        public function llenaTablaTodosUsuarios($resultado)
        {
            $repite = "";
            $repite = $repite . 
                    "<tr>" .
                        "<td><input type=\"radio\" name=\"selectedUser\" value=\"$resultado[0]\"></td>".
                        "<td>$resultado[0]</td>".
                        "<td>$resultado[1] $resultado[2] $resultado[3]</td>".
                        "<td>$resultado[4]</td>".
                    "</tr>";

            return $repite;
        }

        public function muestraCitasAdmin($idUsuario)
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            return $model->obtenerCitasAdmin();
        }
        

    }

    /**
    * 
    */
    class UserDataGetter
    {
        
        function __construct()
        {
            # code...
        }
    

        public function obtenerPerfil()
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            $resultado = $model->obtenerUsuarioLoggeado($_SESSION['idUsuario']);
            return $resultado;
        }

        public function muestraCitasUsuario($idUsuario)
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            $resultado = $model->obtenerCitasUsuario();
            $repite = "";
            //var_dump($resultado);
            while ($row = $resultado->fetch_assoc()) {
                /*echo "<br/>";
                var_dump($row);*/
                $idCita = $row['idCita'];
                $tratamiento = $row['nombreTratamiento'];
                $fecha = $row['fechaAsignacion'];
                $hora = $row['horaAsignacion'];
                $estado = $row['nombreEstado'];
                $usuarioID = $row['idUsuario'];

                if ($usuarioID == $idUsuario) {
                    $repite = $repite .
                            "<tr>" .
                                "<td>$idCita</td>".
                                "<td>$tratamiento</td>".
                                "<td>$fecha / $hora hrs.</td>".
                                "<td>$estado</td>".
                            "</tr>";

                }
            }

            return $repite;
        }

        public function muestraHistorialUsuario($idUsuario)
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            $resultado = $model->obtenerHistorialUsuario();
            $repite = "";

            while ($row = $resultado->fetch_assoc()) 
            {
                echo "<br/>";
                var_dump($row);
            }
        }
    }

?>