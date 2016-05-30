<?php
    /**
    * 
    */
    class Login
    {
        private $ERR_DB = -1;
        private $model;
        function __construct()
        {
            # code...
        }

        public function cargarHeader()
        {
            $header = file_get_contents('views/header.html');
            if (isset($_SESSION['usuario'])) {
                
                $navUser = '<a href="?ctl=miPerfil" class="btn btn-default"  aria-haspopup="true" aria-expanded="false">'
                              . $_SESSION['usuario'] .
                             '</a>' ;   
                $header = str_replace('{PERFIL/REGISTRO}', $navUser , $header);
                $navLog = '<a href="?ctl=entrar&logout=true " class="btn btn-default"  aria-haspopup="true" aria-expanded="false">
                            Salir 
                           </a>';
                $header = str_replace('{INGRESAR/SALIR}', $navLog, $header);
            }
            else
            {
                $navUser = ' <a href="?ctl=registro" class="btn btn-default"  aria-haspopup="true" aria-expanded="false">
                                Registrarme
                                </a>';
                $header = str_replace('{PERFIL/REGISTRO}', $navUser, $header);
                $navLog = '<a href="?ctl=entrar " class="btn btn-default"  aria-haspopup="true" aria-expanded="false">
                            Ingresar 
                           </a>';
                $header = str_replace('{INGRESAR/SALIR}', $navLog, $header);
            }
            return $header;
        }
        public function cargarLogin()
        {
            if( isset($_GET['logout']) &&  $_GET['logout']  == "true" ){
                session_unset();
                session_destroy();      
                setcookie(session_name(), '', time()-3600);
            }
            $header = $this->cargarHeader();
            $content = file_get_contents('views/entrar.html');
            $footer = file_get_contents('views/footer.html');
            $view = $header . $content . $footer;
            echo $view;
            if( isset($_GET['login']) &&  $_GET['login']  == "false"){
                //if($_GET['mail']  == "false"){
                    echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>ERROR AL ENTRAR!</strong><p>Contraseña y/o correo incorrecto(s).</p> 
                    </div>
                    ';
            }/* else {
                echo  '
                <div class="alert alert-dismissible" id="modalContent">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>ERROR AL ENVIAR EL REGISTRO!</strong><p>Por favor vuelve a intentarlo</p> 
                </div>
                ';
            }*/ 
                
            
        }
        
        public function Entrar()
        {
            require_once("models/LoginMdl.php");
            $this->model = new LoginUsuario();
            if (empty($_POST)) {
                $this->cargarLogin();
            }
            else
            {
                $correo  = $_POST["email"];
                $pass    = $_POST["pass"];
                $resultado = $this->model->Entrar($correo, $pass);
                if($resultado == 1)
                {
                    $_SESSION['usuario'] = $this->model->nombre . " " . $this->model->apellidoP;
                   header('Location: ?ctl=miPerfil&login=true');
                
                }elseif ( $resultado == -1) {
                    header('Location: ?ctl=entrar&login=false');     
                }
            }
        }


        public function cargarPerfilAdmin()
        {
            require_once('controllers/MostrarDatosCtrl.php');
            $this->model = new AdminDataGetter();

            //$header = file_get_contents('views/header.html');
            $header = $this->cargarHeader();
            $navAdmin = file_get_contents('views/navbarPerfilAdmin.html');

            if (isset($_SESSION['usuario'])) {
                $navAdmin = str_replace('{{USERNAME}}', $_SESSION['usuario'], $navAdmin);
            }

            switch ($_GET['nav']) {
                case 'principal':
                    $content = file_get_contents('views/formDatosUsuario.html');
                    break;

                case 'usuarios':
                    $content = file_get_contents('views/usuariosAdmin.html');
                    //$this->model->todoUsuario();
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
            $footer = file_get_contents('views/footer.html');
            echo $header . $navAdmin . $footer;

        }

        public function cargarPerfilUsuario()
        {
            require_once('controllers/MostrarDatosCtrl.php');
            $this->model = new UserDataGetter();

            //$header = file_get_contents('views/header.html');
            require_once('controllers/LoginCtrl.php');
            $login = new Login();

            $header = $login->cargarHeader();
            $perfilUsuario = file_get_contents('views/perfilUsuario.html');
            $footer = file_get_contents('views/footer.html');

            if (isset($_SESSION['usuario'])) {
                $perfilUsuario = str_replace('{{USERNAME}}', $_SESSION['usuario'], $perfilUsuario);
            }

            switch ($_GET['nav']) {
                case 'principal':
                    $content = file_get_contents('views/formDatosUsuario.html');
                    break;

                case 'historial':
                    $content = file_get_contents('views/tablaHistorialUsuario.html');
                    break;

                case 'citasUsuario':
                    $content = file_get_contents('views/citasAdministrador.html');
                    break;

                case 'calendarioUsuario':
                    $content = file_get_contents('views/calendarioCitas.html');
                    break;
                
                default:
                    # code...
                    break;
            }

            $perfilUsuario = str_replace('{{CONTENT}}', $content, $perfilUsuario);

            $view = $header . $perfilUsuario . $footer;
            echo $view;
        }
    }


?>