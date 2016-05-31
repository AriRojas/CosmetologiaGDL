<?php
    /**
    * 
    */
    class EditarUsuario
    {
        private $ERR_DB = -1;
        function __construct()
        {
            # code...
        }
        public function getData($busqueda)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);
            
            $sql = "SELECT * FROM Usuario WHERE idUsuario = $busqueda";

            $resultado = $conexion->query($sql);
            $resultado = $resultado->fetch_row();
                if(is_null($resultado))
                {
                    return $this->ERR_DB;
                }
                else
                {
                    return $resultado;
                }

            $conexion->close();
        }

        public function Editar($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento)
        {
            require('config.inc');
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);

            if ($conexion -> connect_errno) {
                # code...
                echo "Oh no! Ha ocurrido un error con la base de datos!";
                echo "<br>$conexion->connect_errno";
                return $this->ERR_DB;
            }
            else
            {
                $extensionesPermitidas = array("jpg", "jpeg", "gif", "png" , "JPG" ,"JPEG" ,"PNG","GIF" );

                $extension = substr( $_FILES["imgperfil"]["type"] ,6);
                if( isset($_FILES["imgperfil"]) &&  $_FILES["imgperfil"]["name"] != ""){
                    if ((($_FILES["imgperfil"]["type"] == "image/gif")
                      || ($_FILES["imgperfil"]["type"] == "image/jpeg")
                      || ($_FILES["imgperfil"]["type"] == "image/png")
                      || ($_FILES["imgperfil"]["type"] == "image/pjpeg"))

                      && in_array($extension, $extensionesPermitidas)){
                              //Si no hubo un error al subir el archivo temporalmente
                              if ($_FILES["imgperfil"]["error"] > 0){
                                    $resultado = NULL;
                              }
                              else{
                                    $ext = substr( $_FILES["imgperfil"]["type"] ,6);
                                    //$rename="imgPerfilUsuario". $this->id . "." . $ext ;
                                    $rename="imgPerfilUsuario"."." . $mail . "." . $ext ;
                                
                                    move_uploaded_file($_FILES["imgperfil"]["tmp_name"],
                                                   "www/images/Usuarios/" . $rename  );
                                    $imagenUsuario  =  $rename ;
                                    $resultado = true;
                              }
                    }
                    else{
                        return NULL;
                    }
                    $sql = "UPDATE Usuario 
                    SET
                        nombre          = \"$nombre\",
                        apellidoPaterno = \"$apellidoP\",
                        apellidoMaterno = \"$apellidoM\", 
                        fechaNacimiento = \"$fechaNacimiento\",
                        domicilio       = \"$domicilio\",
                        numExterior     = \"$numExt\",
                        numInterior     = \"$numInt\",
                        colonia         = \"$colonia\", 
                        municipio       =  \"$municipio\",
                        estado          = \"$estado\",
                        telefono        = \"$telefono\",
                        imagenUsuario   = \"$imagenUsuario\"
                    WHERE   idUsuario = '".$_SESSION['idUsuario']."'";

                }  else {
                    $sql = "UPDATE Usuario 
                        SET
                            nombre          = \"$nombre\",
                            apellidoPaterno = \"$apellidoP\",
                            apellidoMaterno = \"$apellidoM\", 
                            fechaNacimiento = \"$fechaNacimiento\",
                            domicilio       = \"$domicilio\",
                            numExterior     = \"$numExt\",
                            numInterior     = \"$numInt\",
                            colonia         = \"$colonia\", 
                            municipio       =  \"$municipio\",
                            estado          = \"$estado\",
                            telefono        = \"$telefono\"
                        WHERE   idUsuario = '".$_SESSION['idUsuario']."'";
                }

                    $resultado = $conexion->query($sql);
                    return $resultado;
            }

            $conexion->close();

        }
    }


?>