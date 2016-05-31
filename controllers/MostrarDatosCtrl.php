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
                        if($resultado == -1)
                        {
                            echo  '
                                <div class="alert alert-dismissible" id="modalContent">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>ERROR!</strong><p>Ningún usuario registrado con ese nombre.</p> 
                                </div>
                                ';
                        }
                        
                        break;
                    
                }
                /*($resultado);
                echo "<br/>";
                var_dump($this->resultadoBusqueda);
                */
                return $this->llenaTablaUsuariosBuscados($resultado);
            }
        }

        public function llenaTablaUsuariosBuscados($resultado)
        {
            //var_dump($resultado);
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

        public function obtenerTodosUsuarios()
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();

            $resultado = $model->obtenerTodosUsuarios();
            var_dump($resultado);
            //return $this->llenaTablaTodosUsuarios($resultado);
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

            return $model->obtenerCitasUsuario($idUsuario);
        }
    }

?>