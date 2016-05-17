<?php 
    //session_start();

    if(isset($_GET['ctl']))
    {
        switch ($_GET['ctl']) {
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
            
            default:
                http_response_code(404);
                break;
        }

        
    }
    else
    {
        require_once("controllers/index.php");
        $ctl = new Index();
        $ctl->Ejecutar();

    }

?>
