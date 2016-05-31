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
                if($_SESSION['usuario'] == 'admin')
                {
                    $navUser = '<a href="?ctl=perfilAdmin&nav=principal" class="btn btn-default"  aria-haspopup="true" aria-expanded="false">'
                                  . $_SESSION['usuario'] .
                                 '</a>' ;   
                    $header = str_replace('{PERFIL/REGISTRO}', $navUser , $header);
                    $navLog = '<a href="?ctl=entrar&logout=true " class="btn btn-default"  aria-haspopup="true" aria-expanded="false">
                                Salir 
                               </a>';
                    $header = str_replace('{INGRESAR/SALIR}', $navLog, $header);
                }
                else{
                    $navUser = '<a href="?ctl=miPerfil&nav=principal" class="btn btn-default"  aria-haspopup="true" aria-expanded="false">'
                                  . $_SESSION['usuario'] .
                                 '</a>' ;   
                    $header = str_replace('{PERFIL/REGISTRO}', $navUser , $header);
                    $navLog = '<a href="?ctl=entrar&logout=true " class="btn btn-default"  aria-haspopup="true" aria-expanded="false">
                                Salir 
                               </a>';
                    $header = str_replace('{INGRESAR/SALIR}', $navLog, $header);
                }
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
                //$resultado
                if($resultado == 1)
                {
                    $_SESSION['usuario'] = $this->model->nombre . " " . $this->model->apellidoP;
                    //var_dump($resultado);
                    if($_SESSION['tipoUsuario'] == 1)
                    {
                        header('Location: ?ctl=perfilAdmin&login=true&nav=principal');
                    }
                    else
                    {
                        header('Location: ?ctl=miPerfil&login=true&nav=principal');
                    }
                
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

            

            switch ($_GET['nav']) {
                case 'principal':
                    case 'principal':
                        $data    = $this->model->obtenerPerfil();
                        $content = file_get_contents('views/perfilDatos.html');
                        $content = str_replace('{imgPerfil}', $data[15], $content);
                        $content = str_replace('{NOMBRECOMPLETO}'   , $data[2].' '.$data[3].' '.$data[4], $content);
                        $domicilio = $data[6].' '.$data[7].' '.$data[8].' Col. '. $data[9].', '.$data[10].', '.$data[11].'.';
                        $content = str_replace('{DOMICILIO}', $domicilio , $content);
                        $content = str_replace('{FECHA}', $data[5], $content);
                        $content = str_replace('{TELEFONO}', $data[12], $content);
                        $content = str_replace('{CORREO}', $data[13], $content);
                    break;

                case 'usuarios':
                    $content = file_get_contents('views/usuariosAdmin.html');
                    //$this->model->todoUsuario();
                    if (isset($_GET['busqueda']) && ($_GET['busqueda'] == 'true')) {
                        $repite = $this->model->obtenerUsuariosBuscados();

                        $content = str_replace('{REPITEUSUARIO}', $repite, $content);
                    }
                    else
                    {
                        $content = str_replace('{REPITEUSUARIO}', "", $content);
                    }
                    break;

                case 'citasAdmin':
                    $content = file_get_contents('views/citasAdministrador.html');
                    break;

                case 'calendarioAdmin':
                    $content = file_get_contents('views/calendarioCitas.html');
                    $repite = $this->model->obtenerTodosUsuarios();

                    $content = str_replace('{REPITEUSUARIO}', $repite, $content);
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

            

            switch ($_GET['nav']) {
                case 'principal':
                    $data    = $this->model->obtenerPerfil();
                    $content = file_get_contents('views/perfilDatos.html');
                    $content = str_replace('{imgPerfil}', $data[15], $content);
                    $content = str_replace('{NOMBRECOMPLETO}'   , $data[2].' '.$data[3].' '.$data[4], $content);
                    $domicilio = $data[6].' '.$data[7].' '.$data[8].' Col. '. $data[9].', '.$data[10].', '.$data[11].'.';
                    $content = str_replace('{DOMICILIO}', $domicilio , $content);
                    $content = str_replace('{FECHA}', $data[5], $content);
                    $content = str_replace('{TELEFONO}', $data[12], $content);
                    $content = str_replace('{CORREO}', $data[13], $content);
                    break;

                case 'historial':
                    $content = file_get_contents('views/tablaHistorialUsuario.html');
                    break;

                case 'citasUsuario':
                    $content = file_get_contents('views/citasUsuario.html');
                    $this->model->muestraCitasUsuario($_SESSION['usuario']);
                    break;

                case 'calendarioUsuario':
                    $content = file_get_contents('views/agendarCitasUsuario.html');
                    
                    break;
                
                default:
                    # code...
                    break;
            }

            
            

            if (isset($_GET['agendarCita']) && $_GET['agendarCita'] == 'true') 
            {
                //echo "aquiestoyyyyyy";
                require_once('controllers/AgendarCitaCtrl.php');
                $model = new AgendarCita();
                $resultado = $model->solicitarCitaUsuarios();
                //echo "EUREEEKAAAA!!!";

                if ($resultado == -1) {
                    echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>ERROR!</strong><p>Ya hay una cita registrada para esa misma fecha a la misma hora. Favor de elgir una hora distinta o de comunicarse con nosotros al teléfono de contacto.</p> 
                    </div>
                    ';
                    //header('Location: ?ctl=miPerfil&nav=calendarioUsuario&agendarCita=false');
                }
                elseif($resultado == 1)
                {
                    echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>CITA PROGRAMADA EXITOSAMENTE!</strong><p>Lo esperamos el día y la hora acordada. Si tiene alguna duda favor de consultar su perfil o ponerse en contacto con nosotros.</p> 
                    </div>
                    ';
                    //header('Location: ?ctl=miPerfil&nav=citasUsuario');
                }
            }
            $perfilUsuario = str_replace('{{CONTENT}}', $content, $perfilUsuario);

            $view = $header . $perfilUsuario . $footer;
            echo $view;
        }

    }


?>