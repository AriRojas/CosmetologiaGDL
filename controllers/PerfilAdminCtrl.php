<?php
    /**
    * 
    */
    class PerfilAdmin
    {
        
        function __construct()
        {
            # code...
        }

        public function cargarPerfilAdmin()
        {
            //$header = file_get_contents('views/header.html');
            require_once('controllers/LoginCtrl.php');
            $login = new Login();

            $header = $login->cargarHeader();
            $navAdmin = file_get_contents('views/navbarPerfilAdmin.html');

            switch ($_GET['nav']) {
                case 'principal':
                    $content = file_get_contents('views/formDatosUsuario.html');
                    break;

                case 'usuarios':
                    $content = file_get_contents('views/usuariosAdmin.html');
                    break;

                case 'citasAdmin':
                    $content = file_get_contents('views/citasAdministrador.html');
                    break;

                case 'calendarioAdmin':
                    $content = file_get_contents('views/calendarioCitas.html');
                    break;
                
                default:
                    # code...
                    break;
            }

            $navAdmin = str_replace ( '{{CONTENT}}' ,  $content  ,  $navAdmin);

            echo $header . $navAdmin;

        }
    }
?>