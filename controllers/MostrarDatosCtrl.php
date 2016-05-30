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

        public function obtenerUsuarios()
        {
            require_once('models/DataGetterMdl.php');
            $model = new DataGetter();
            if (empty($_POST)) {
                
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
                        else
                        {
                            echo "Llena tabla con elementos en resultado";
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
                        else
                        {
                            echo "Llena tabla con elementos en resultado";
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
                        else
                        {
                            echo "Llena tabla con elementos en resultado";
                        }
                        break;
                        break;

                    case 'todos':
                        # code...
                        break;

                }
            }
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
    }

?>