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
            $this->model->Ejecutar();

            if(empty($_POST)){
                $this->cargarRegistro();

            }
            else{
                $nombre             = $_POST["nombre"];
                $apellidoP          = $_POST["apellidoP"];
                $apellidoM          = $_POST["apellidoM"];
                $sexo               = $_POST["sexo"];
                $direccion          = $_POST["direccion"];
                $numExt             = $_POST["numExt"];
                $numInt             = $_POST["numInt"];
                $localidad          = $_POST["localidad"];
                $municipio          = $_POST["municipio"];
                $estado             = $_POST["estado"];
                $telefono           = $_POST["telefono"];
                $fechaNacimiento    = $_POST["fechaNacimiento"];
                $mail               = $_POST["mail"];
                $imagenPerfil       = $_POST["imagenPerfil"];
                $password           = $_POST["password"];
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