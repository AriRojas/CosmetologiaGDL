<?php 
    //session_start();

    if(isset($_GET['ctl']))
    {
        //echo "Siii";
        switch ($_GET['ctl']) {
            case 'nosotros':
                require_once ('controllers/NosotrosCtrl.php');
                $controller = new Nosotros();
                break;

            case 'contacto':
                require_once 'controllers/ContactoCtrl.php';
                $controller = new Contacto();
                break;
            
            default:
                # code...
                break;
        }

        
        //$controller = new $url;
        
    }
    else
    {
        require_once("controllers/index.php");
        $ctl = new Index();
        $ctl->Ejecutar();

    }

?>
