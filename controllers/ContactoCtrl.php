<?php

    class Contacto
    {
        
        function __construct()
        {
            //echo "Contacto";
        }

        function cargarContacto()
        {
            if(isset($_GET['msj']))
            $this->enviarCorreo();


            $header = file_get_contents('views/header.html');
            $contacto = file_get_contents('views/contacto.html');
            $footer = file_get_contents('views/footer.html');

            $view = $header . $contacto . $footer;
            echo $view;

        }

        function enviarCorreo()
        {
            require("www/includes/PHPMailerAutoload.php");

            $nombre     = $_POST["nombre"];
            $telefono   = $_POST["telefono"];
            $email      = $_POST["email"];
            $mensaje    = $_POST["mensaje"];
            //Se define la dirección a la que se enviará el correo
            $to     = "contacto@cosmetologiagdl.com";             
            //Se define el asunto
            $subject = 'Contacto';             
            //Se escribe el mensaje
            $mess = 'Nombre: '.$nombre.' Telefono: '.$telefono.' MENSAJE:'.$mensaje;
             
            //Se escribe la dirección desde la que se enviará el correo
            $header = "From: $email".PHP_EOL;
            //Se define tipo de contenido y codificación
            $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
             
            //Se envia el correo
            $exito = mail($to, $subject, $mess, $header);
            
            if($exito){
                echo  '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>MENSAJE ENVIADO!</strong><p>Nos pondremos en contacto contigo a la brevedad</p> 
                    </div>
                    ';
            }else {
                echo   '
                    <div class="alert alert-dismissible" id="modalContent">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>MENSAJE ENVIADO!</strong><p>Nos pondremos en contacto contigo a la brevedad</p> 
                    </div>
                    ';
            }
        }
    }
?>