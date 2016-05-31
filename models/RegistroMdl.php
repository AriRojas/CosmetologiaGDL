<?php
    
    //require_once('models/ConexionDbMdl.php');
    class RegistroUsuario// extends ConexionDb
    {
        private $ERR_DB = -1;
        public $id;
        
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
            $conexion = new mysqli($servidor, $usuarioDB, $passwordDB, $database);
            //$conexion = parent::crearConexion();
            
            if ($conexion -> connect_errno) {
                # code...
                echo "Oh no! Ha ocurrido un error con la base de datos!";
                echo "<br>$conexion->connect_errno";
                return $this->ERR_DB;
            }
            else
            {
                $sql = "SELECT * FROM Usuario WHERE correoElectronico = \"$mail\"";

                $resultado = $conexion->query($sql);
                $resultado = $resultado->fetch_row();

                if ( !is_null($resultado) ) {
                    return -1;
                }
                else
                {
                    $imagenUsuario = "cosmetologia-gdl.png";

                    $extensionesPermitidas = array("jpg", "jpeg", "gif", "png" , "JPG" ,"JPEG" ,"PNG","GIF" );

                    $extension = substr( $_FILES["imgperfil"]["type"] ,6);

                    if( isset($_FILES["imgperfil"])){

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
                             $resultado = NULL;
                        }

                    }  
                    
                    

                   
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

                    $resultado = $conexion->query($sql);
                    $this->id  = $conexion ->insert_id;
                    return $resultado;
                }
                   
            }
            
            $conexion->close();
        }

    }

?>

