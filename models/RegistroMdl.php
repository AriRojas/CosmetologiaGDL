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
                $resultado = $resultado->fetch_row();

                if (!is_null($resultado)) {

                    echo "Error! Usuario con e-mail: " . $mail . " ya registrado.";
                    return $this->ERR_DB;
                }
                else
                {
                    $extensionesPermitidas = array("jpg", "jpeg", "gif", "png" , "JPG" ,"JPEG" ,"PNG","GIF" );

                    $extension = substr( $_FILES["imgperfil"]["type"] ,6);
                    if ((($_FILES["imgperfil"]["type"] == "image/gif")
                          || ($_FILES["imgperfil"]["type"] == "image/jpeg")
                          || ($_FILES["imgperfil"]["type"] == "image/png")
                          || ($_FILES["imgperfil"]["type"] == "image/pjpeg"))

                          && in_array($extension, $extensionesPermitidas)){
                                  //Si no hubo un error al subir el archivo temporalmente
                                  if ($_FILES["imgperfil"]["error"] > 0){
                                         //echo "Return Code: " . $_FILES["imgperfil"]["error"] . "<br />";
                                  }
                                  else{
                                        $ext = substr( $_FILES["imgperfil"]["type"] ,6);
                                        //$rename="imgPerfilUsuario". $this->id . "." . $ext ;
                                        $rename="imgPerfilUsuario"."." . $mail . "." . $ext ;
                                    
                                        move_uploaded_file($_FILES["imgperfil"]["tmp_name"],
                                                       "www/images/Usuarios/" . $rename  );
                                  }
                    }
                    else{
                         echo "Archivo inválido";
                    }

                    $imagenUsuario  =  $rename ;
                    $sql = "INSERT INTO Usuario (tipoUsuario, nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, domicilio, numExterior, numInterior, colonia, municipio, estado, telefono, correoElectronico, password, imagenUsuario)
                        VALUES(
                            2,
                            \"$nombre\",
                            \"$apellidoP\",
                            \"$apellidoM\",
                            \"$fechaNacimiento\",
                            \"$domicilio\",
                            \"$numExt\",
                            \"$numInt\",
                            \"$colonia\",
                            \"$municipio\",
                            \"$estado\",
                            \"$telefono\",
                            \"$mail\",
                            \"$passwordUsuario\",
                            \"$imagenUsuario\"
                        )";

                    //echo "simon si paso";
                    $resultado = $conexion->query($sql);
                    //var_dump($resultado = $conexion->query($sql));
                    var_dump($resultado);
                }
                   
            }
            
            $conexion->close();
            //var_dump($resultado);
            return $resultado;
        }

    }

?>