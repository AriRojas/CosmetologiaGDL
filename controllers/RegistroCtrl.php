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

            //if(empty($_POST)){}
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
?>