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

            

        }
    }
?>