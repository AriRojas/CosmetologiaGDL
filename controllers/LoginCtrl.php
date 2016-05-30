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
            $this->model = new Login();

            if (empty($_POST)) {
                $this->cargarLogin();
                echo 'holoi';
            }
            else
            {
                $correo  = $_POST["email"];
                $pass    = $_POST["pass"];
                echo 'hola';
                $resultado = $this->model->Entrar($correo, $pass);

                if($resultado == 1)
                {
                    $_SESSION['usuario'] = $nombre . " " . $apellidoP;
                    echo 'entra';
                   // header('Location: ?ctl=miPerfil&login=true');
                
                }elseif ( $resultado == -1) {
                   echo 'no entra';
                    header('Location: ?ctl=entrar&login=false');     
                }
            }
        }
    }


?>