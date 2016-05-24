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