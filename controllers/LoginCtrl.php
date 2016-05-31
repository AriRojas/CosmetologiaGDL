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
                    break;

                case 'calendarioUsuario':
                    $content = file_get_contents('views/agendarCitasUsuario.html');
                    break;
                
                default:
                    # code...
                    break;
            }

            $perfilUsuario = str_replace('{{CONTENT}}', $content, $perfilUsuario);

            $view = $header . $perfilUsuario . $footer;
            echo $view;
        }

        /*public function crearPrincipal($resultado)
        {
            $principal = 
                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"nombre\">Nombre(s):<span class=\"requerido\">*</span></label>".
                    "<input  class=\"form-control\" id=\"nombre\" name=\"nombre\" type=\"text\" onfocus=\"quitarErrorClass('nombre')\" value=\"$resultado['nombre']\" />".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"apellidop\">Apellido Paterno:<span class=\"requerido\">*</span></label>".
                    "<input  class=\"form-control\" id=\"apellidop\" name=\"apellidop\" type=\"text\" onfocus=\"quitarErrorClass('apellidop')\" value=\"$resultado['apellidoPaterno']/>".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"apellidom\">Apellido Materno:<span class=\"requerido\">*</span></label>".
                    "<input  class=\"form-control\" id=\"apellidom\" name=\"apellidom\" type=\"text\" onfocus=\"quitarErrorClass('apellidom')\" value=\"$resultado['apellidoMaterno'] />".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" id=\"sexo\">Selecciona tu sexo:<span class=\"requerido\">*</span></label>".
                "</div>".
                //VALIDAR CUAL ES SU GENERO
                "<div class=\"form-group\">".
                        "<select id=\"sexo\" name=\"sexo\" class=\"form-control\">".
                          "<option value=\"Masculino\">Masculino</option>".
                          "<option value=\"Femenino\">Femenino</option>".
                        "</select>".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"domicilio\">Dirección:<span class=\"requerido\">*</span></label>".
                    "<input  class=\"form-control\" id=\"domicilio\" name=\"domicilio\" type=\"text\" onfocus=\"quitarErrorClass('domicilio')\" value=\"$resultado['domicilio'] />".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"numexterior\">Número Exterior:</label>".
                    "<input  class=\"form-control\" id=\"numexterior\" name=\"numexterior\" type=\"number\" max=\"99999\" onfocus=\"quitarErrorClass('numexterior')\" value=\"$resultado['numExterior']/>".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"numerointerior\">Número Interior:</label>".
                    " <input  class=\"form-control\" id=\"numerointerior\" name=\"numerointerior\" type=\"number\" max=\"99999\" onfocus=\"quitarErrorClass('numerointerior')\" value=\"$resultado['numInterior']/>".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"colonia\">Colonia:<span class=\"requerido\">*</span></label>".
                    "<input  class=\"form-control\" id=\"colonia\" name=\"colonia\" type=\"text\" onfocus=\"quitarErrorClass('colonia')\" value=\"$resultado['colonia']/>".
                "</div>".

                "<div class=\"form-group\">".
                    "<label class=\"control-label\" for=\"municipio\">Municipio:<span class=\"requerido\">*</span></label>".
                    "<input  class=\"form-control\" id=\"municipio\" name=\"municipio\" type=\"text\" onfocus=\"quitarErrorClass('municipio')\" value=\"$resultado['municipio']/>".
                "</div>".

                <div class="form-group">
                    <label class="control-label" for="estado">Estado:<span class="requerido">*</span></label>
                    <input  class="form-control" id="estado" name="estado" type="text" onfocus="quitarErrorClass('estado')" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="telefono">Teléfono:<span class="requerido">*</span></label>
                    <input  class="form-control" id="telefono" name="telefono" type="tel" onfocus="quitarErrorClass('telefono')" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="fechanacimiento">Fecha de nacimiento:<span class="requerido">*</span></label>
                    <input id="fechanacimiento" class="form-control"  name="fechanacimiento" type="date" min="1916-01-01" step="1" onfocus="quitarErrorClass('fechanacimiento')" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="mail">E-mail:<span class="requerido">*</span></label>
                    <input  class="form-control" id="mail" name="mail" type="email" onfocus="quitarErrorClass('mail')" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="pass1">Ingresa tu contraseña:<span class="requerido">*</span></label>
                    <input  class="form-control" id="pass1" name="pass1" type="password" onfocus="quitarErrorClass('pass1')"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="imgperfil">Imagen de perfil </label>
                    <input id="imgperfil" name="imgperfil" class="input-file" type="file" accept="image/*" >
                </div>

                <p class="requerido">*Campos Requeridos</p>


            ";
        }*/
    }


?>