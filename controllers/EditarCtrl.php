<?php
    /**
    * 
    */
    class Editar
    {
        private $model;
        private $valido;
        
        function __construct()
        {
            //echo "Aquí debo registrar";

        }

        public function Ejecutar()
        {
            require_once('models/EditarMdl.php');
            $this->model = new EditarUsuario();
            //$this->model->Ejecutar();


            if(empty($_POST) ){
                $this->cargarEdicion();

            }
            else{
                //VALIDAR QUE NINGUN CAMPO ESTÉ VACÍO

                $nombre             = $_POST["nombre"];
                $apellidoP          = $_POST["apellidop"];
                $apellidoM          = $_POST["apellidom"];
                $sexo               = $_POST["sexo"];
                $domicilio          = $_POST["domicilio"];
                $numExt             = $_POST["numexterior"];
                $numInt             = $_POST["numerointerior"];
                $colonia            = $_POST["colonia"];
                $municipio          = $_POST["municipio"];
                $estado             = $_POST["estado"];
                $telefono           = $_POST["telefono"];
                $fechaNacimiento    = $_POST["fechanacimiento"];
                
            
                $resultado = $this->model->Editar($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento);
                var_dump($resultado);
                if( $resultado == 1){
                  header('Location: ?ctl=miPerfil&nav=principal');
                    
                }else  {
                  header('Location: ?ctl=editar&save=false');     
                } 

            }

        }

        function cargarEdicion(){
            //$header = file_get_contents('views/header.html');
            require_once('controllers/LoginCtrl.php');
            $login = new Login();
            require_once('models/EditarMdl.php');
            $this->model = new EditarUsuario();
            $header = $login->cargarHeader();
            $body   = file_get_contents('views/editarPerfil.html');
            $data   = $this->model->getData($_SESSION['idUsuario'] );
            $body = str_replace('{NOMBRE}'      , $data[2], $body);
            $body = str_replace('{APELLIDOP}'   , $data[3], $body);
            $body = str_replace('{APELLIDOM}'   , $data[4], $body);
            $body = str_replace('{DOMICILIO}'   , $data[6] , $body);
            $body = str_replace('{NUMEXT}'      , $data[7] , $body);
            $body = str_replace('{NUMINT}'      , $data[8] , $body);
            $body = str_replace('{COLONIA}'     , $data[9] , $body);
            $body = str_replace('{MUNICIPIO}'   , $data[10] , $body);
            $body = str_replace('{ESTADO}'      , $data[11] , $body);
            $body = str_replace('{FECHA}'       , $data[5], $body);
            $body = str_replace('{TELEFONO}'    , $data[12], $body);

            $footer = file_get_contents('views/footer.html');
            $view   = $header . $body . $footer;
            echo $view;
            
            

        }


    }




?>