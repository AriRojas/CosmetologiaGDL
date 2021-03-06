<?php 
    session_start();

    if(isset($_GET['ctl']))
    {
        switch ($_GET['ctl']) {
            case 'principal':
                require_once("controllers/index.php");
                $controller = new Index();
                $controller->Ejecutar();
                break;

            case 'nosotros':
                require_once ('controllers/NosotrosCtrl.php');
                $controller = new Nosotros();
                $controller->cargarNosotros();
                break;

            case 'contacto':
                require_once 'controllers/ContactoCtrl.php';
                $controller = new Contacto();
                $controller->cargarContacto();
                break;

            case 'promociones':
                require_once 'controllers/PromocionesCtrl.php';
                $controller = new Promociones();
                $controller->cargarPromociones();
                break;

            case 'tratamientos':
                require_once 'controllers/TratamientosCtrl.php';
                $controller = new Tratamiento();
                $controller->cargarTratamiento();
                break;

            case 'registro':
                require_once 'controllers/RegistroCtrl.php';
                $controller = new Registro();
                $controller -> Ejecutar();

                break;

            case 'entrar':
                require_once 'controllers/LoginCtrl.php';
                $controller = new Login();
                $controller -> Entrar();
                break;

            case 'miPerfil':
                require_once 'controllers/LoginCtrl.php';
                $controller = new Login();
                $controller->cargarPerfilUsuario();
                break;

            case 'perfilAdmin':
                require_once 'controllers/LoginCtrl.php';
                $controller = new Login();
                $controller->cargarPerfilAdmin();
                break;
            case 'editar':
                require_once 'controllers/EditarCtrl.php';
                $controller = new Editar();
                $controller->Ejecutar();
                break;   
            case 'agendarCita':
                echo "agendarCita";
                break;
            
            default:
                http_response_code(404);
                break;
        }

        
    }
    else
    {
        require_once("controllers/index.php");
        $controller = new Index();
        $controller->Ejecutar();

    }

?>
