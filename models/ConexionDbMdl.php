<?php
    /**
    * 
    */
    class ConexionDb
    {
        private $conexion;
        private $ERR_DB = -100;
        
        function __construct()
        {
            # code...
            #echo "ConexionDb";
        }

        /*
            Función para la creación de la conexión con la base de datos.
            Regresa la conexión.
        */

        public function crearConexion()
        {
            require('config.inc');
            $this->conexion = new mysqli($servidor, $usuario, $password, $database);

            if($this->conexion -> connect_errno)
            {
                echo "Oh no! Ha ocurrido un error.";
                echo "<br /> $this->conexion->connect_errno";

            }
            /*else
            {
                echo "Conexion Exitosa!";
            }*/

            return $this->conexion;
        }

        public function cerrarConexion()
        {
            if($this->conexion->close())
                return true;
            else
                return false;
        }

        /*Función para llamar al modelo que da de alta a los usuarios en la tabla Usuarios.*/

        public function altaUsuarios($nombre, $apellidoP, $apellidoM, $sexo, $domicilio, $numExt, $numInt, $colonia, $municipio, $estado, $telefono, $fechaNacimiento, $mail, $imagenUsuario, $password)
        {

            $resultado = consultasWhere("Usuarios", "correoElectronico", "=", $mail);
            if($resultado != NULL)
            {
                return false;
            }
            else
            {
                /*
                Validar las extensiones de las imágenes
                */
                $extensionesPermitidas = array("jpg", "jpeg", "gif", "png" , "JPG" ,"JPEG" ,"PNG","GIF" );
                $extension = substr( $_FILES["imagenUsuario"]["type"] ,6);

                if ((($_FILES["imagenUsuario"]["type"] == "image/gif")
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
                                    $rename="imgPerfilUsuario"."." . $ext ;
                                    move_uploaded_file($_FILES["imagenUsuario"]["tmp_name"],
                                                   "www/images/Usuarios/" . $rename  );
                              }
                }
                else{
                     echo "Archivo inválido";
                }

                $imagenUsuario  =  $rename ;

                $sql = "INSERT INTO USUARIOS (tipoUsuario, nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, domicilio, numExterior, numInterior, colonia, municipio, estado, telefono, correoElectronico, password, imagenUsuario)
                    VALUES(
                        2,
                        \"$nombre\",
                        \"$apellidoPaterno\",
                        \"$apellidoMaterno\",
                        \"$fechaNacimiento\",
                        \"$domicilio\",
                        \"$numExt\",
                        \"$numInt\",
                        \"$colonia\",
                        \"$municipio\",
                        \"$estado\",
                        \"$telefono\",
                        \"$correoElectronico\",
                        \"$imagenUsuario\",
                        \"$password\"
                    )";
            }

            $resultado = $this->conexion->query($sql);

            return $resultado;

        }

        /*
            Selección de todos los rows y columnas de una tabla. 
        */
        public function consultasAll($tableName)
        {
            $sql = "SELECT * FROM $tableName";

            if(!$result = $this->conexion->query($sql))
            {
                echo "Oh no! Ha ocurrido un error.";
                echo "<br /> $this->conexion->connect_errno";

                return $ERR_DB;
            }
            else
            {
                while($row = $result->fetch_assoc()){
                    echo 'Hola ' . $row['nombre'] . ' ' . $row['apellidoPaterno'] .' mucho gusto!' . '<br />';
                }
                return $result;
            }
        }

        /*
            Selección de todos los rows y columnas de una tabla, usando una cláusula WHERE,
            whereClause = columna a comparar, similarity = <'LIKE' | = > y value = valor de búsqueda.
            Sobrecarga de método. Caso 2: cuatro parámetros.
        */
        public function consultasWhere($tableName, $whereClause, $similarity, $value)
        {
            $sql = "SELECT * FROM $tableName WHERE $whereClause $similarity $value";

            if(!$result = $this->conexion->query($sql))
            {
                echo "<br /> Oh no! Ha ocurrido un error.";
                echo "<br /> $this->conexion->connect_errno";

                return $ERR_DB;
            }
            else
            {
                /*while($row = $result->fetch_assoc()){
                    echo 'Hola ' . $row['nombre'] . ' ' . $row['apellidoPaterno'] .' mucho gusto!' . '<br />';
                }*/
                return $result;
            }
        }


    }

?>