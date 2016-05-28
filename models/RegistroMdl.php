<?php
    
    //require_once('models/ConexionDbMdl.php');
    class RegistroUsuario// extends ConexionDb
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
        
        public function altaUsuarios($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento, $mail, $passwordUsuario)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuario, $password, $database);
            //$conexion = parent::crearConexion();
            
            if ($conexion -> connect_errno) {
                # code...
                echo "Oh no! Ha ocurrido un error con la base de datos!";
                echo "<br>$conexion->connect_errno";
            }
            else
            {
                $sql = "SELECT * FROM Usuario WHERE correoElectronico = \"$mail\"";

                $resultado = $conexion->query($sql);
                if ($resultado != NULL) {
                    echo "Error! Usuario con e-mail: " . $mail . " ya registrado.";
                    return $this->ERR_DB;
                }
                else
                {
                    $extensionesPermitidas = array("jpg", "jpeg", "gif", "png" , "JPG" ,"JPEG" ,"PNG","GIF" );
                    var_dump($_FILES["imgperfil"]["type"]);
                    //$extension = substr( $_FILES["imgperfil"]["type"] ,6);

                    /*if ((($_FILES["imagenUsuario"]["type"] == "image/gif")
                          || ($_FILES["imagenUsuario"]["type"] == "image/jpeg")
                          || ($_FILES["imagenUsuario"]["type"] == "image/png")
                          || ($_FILES["imagenUsuario"]["type"] == "image/pjpeg"))
                          && in_array($extension, $extensionesPermitidas)){
                                  //Si no hubo un error al subir el archivo temporalmente
                                  if ($_FILES["imagenUsuario"]["error"] > 0){
                                         //echo "Return Code: " . $_FILES["imagenUsuario"]["error"] . "<br />";
                                  }
                                  else{
                                        $ext = substr( $_FILES["imagenUsuario"]["type"] ,6);
                                        //$rename="imgPerfilUsuario". $this->id . "." . $ext ;
                                        $rename="imgPerfilUsuario"."." . $mail . $ext ;
                                        move_uploaded_file($_FILES["imagenUsuario"]["tmp_name"],
                                                       "www/images/Usuarios/" . $rename  );
                                  }
                    }
                    else{
                         echo "Archivo inválido";
                    }*/
                }
                   
            }
            //$resultado = $conexion->query($sql);
            $conexion->close();
            var_dump($resultado);
            return $resultado;
        }

        public function mostrarInfoUsuarios()
        {
            //$conexion = parent::crearConexion();
            
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