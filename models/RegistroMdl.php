<?php
    
    require('models/ConexionDbMdl.php');
    class RegistroUsuario extends ConexionDb
    {
        private $ERR_DB;

        
        function __construct()
        {
            # code...
            //echo "RegistroMdl";
        }

        public function Ejecutar()
        {

        }
        
        public function altaUsuarios($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento, $mail, $imagenPerfil, $password)
        {
            $conexion = parent::crearConexion();

            $resultado = parent::altaUsuarios($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento, $mail, $imagenPerfil, $password);

            return $resultado;
        }

        public function mostrarInfoUsuarios()
        {
            $conexion = parent::crearConexion();
            
            $result = parent::consultasAll("Usuario");
            if(!$result == $this->ERR_DB)
            {
                while($row = $result->fetch_assoc()){
                    echo 'Hola ' . $row['nombre'] . ' ' . $row['apellidoPaterno'] .' mucho gusto!' . '<br />';
                }
            }

            if(!parent::cerrarConexion())
            {
                echo "Error. Conexion no cerrada";
            }

        }
    }

?>