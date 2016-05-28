<?php
    /**
    * 
    */
    class Registro
    {
        private $model;
        private $valido;
        
        function __construct()
        {
            //echo "Aquí debo registrar";

        }

        public function Ejecutar()
        {
            require_once('models/RegistroMdl.php');
            $this->model = new RegistroUsuario();
            //$this->model->Ejecutar();

            if(empty($_POST) ){
                $this->cargarRegistro();

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
                $mail               = $_POST["mail"];
                $password           = $_POST["pass1"];
                
                //echo $nombre . " " . $apellidoP . " " . $apellidoM;

                $resultado = $this->model->altaUsuarios($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento, $mail, $password);

                /*if($resultado==false){
                    header('Location: ?ctl=registro&newUser=false');        
                }
                else{
                    $_SESSION['usuario']   = $nombre . $apellidoP;
                    //$_SESSION['idUsuario'] = $this->modelo->id;
                    header('Location: ?ctl=registro&newUser=true');
                }*/

            }

        }

        function cargarRegistro(){
            $header = file_get_contents('views/header.html');
            $body   = file_get_contents('views/registro.html');
            $form   = file_get_contents('views/formDatosUsuario.html');
            $footer = file_get_contents('views/footer.html');

            $body   = str_replace ( '{{FORMUSUARIO}}' ,  $form  ,  $body);
            $view   = $header . $body . $footer;
            echo $view;

        }


    }




?>