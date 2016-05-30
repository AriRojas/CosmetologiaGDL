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

                /*$contenido = "<a href=\"?ctl=registro\" class=\"btn btn-default\"  aria-haspopup=\"true\"aria-expanded=\"false\">"       .
                    "        {PERFIL/REGISTRO}"     . 
                    "</a>"                          .

                    "<a href=\"?ctl=entrar\" class=\"btn btn-default\"  aria-haspopup=\"true\" aria-expanded=\"false\">"                   .
                    "        {INGRESAR/SALIR}"      . 
                    "</a>";*/
                //UNA VEZ LOGGEADO DEBO CAMBIAR EL HREF DE LOS DOS BOTONES DEL HEADER
                //$i = strpos($header, '{BEGNOLOGGED}');
                //$f = strpos($header, '{ENDNOLOGGED}');
                //$contenido = substr($header, $i)
                //$contenido = substr($header, start)
                $header = str_replace('{PERFIL/REGISTRO}', $_SESSION['usuario'], $header);
                $header = str_replace('{INGRESAR/SALIR}', 'Salir', $header);
            }
            else
            {
                $header = str_replace('{PERFIL/REGISTRO}', 'Registrarme', $header);
                $header = str_replace('{INGRESAR/SALIR}', 'Ingresar', $header);
            }

            return $header;
        }

        public function cargarLogin()
        {
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
            }
            else
            {
                $correo  = $_POST["email"];
                $pass    = $_POST["pass"];

                //var_dump($correo);
                //var_dump($_POST);
                echo "<br/>" . $correo . "  " . $pass;

                //header("Location: ?ctl=entrar&login=false");
                $resultado = $this->model->Entrar($correo, $pass);

                if($resultado == 1)
                {
                    $_SESSION['usuario'] = $nombre . " " . $apellidoP;
                    header('Location: ?ctl=miPerfil&login=true');
                
                }elseif ( $resultado == -1) {
                    header('Location: ?ctl=entrar&login=false');     
                }
            }
        }
    }


?>