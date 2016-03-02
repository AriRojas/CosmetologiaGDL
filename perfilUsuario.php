<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ariadna & Sandra">

    <title>Registro - Cosmetología Guadalajara</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <?php include("header.php"); ?>
    </header>

    <div class="container">
        <div class="main row">
            <aside class="col-md-4">
                <figure>
                    <img src="" title="Imagen del usuario">
                    <h4>Nombre del usuario</h4>
                </figure>
                
                <div class="row">
                    <aside col >
                    
                    </aside>
    
                </div>
                
            </aside>

        
            <div class="col-md-8">
                <h3>Mi Perfil</h3>
                
                <form class="formulario" action="" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input class="form-control" id="nombre" type="text" name="nombre" />
                    </div>
                    <div class="form-group">
                        <label for="mail">E-mail:</label>
                        <input class="form-control" id="mail" type="email" name="mail" />
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio:</label>
                        <input class="form-control" id="domicilio" type="text" name="domicilio" />
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input class="form-control" id="telefono" type="tel" name="telefono" />
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input class="form-control" id="edad" type="number" name="edad" min="1" max="99" />
                    </div>
                </form>

            </div>
        </div>

        <div class="container row">
            <?php include("tablaHistorialUsuario.php"); ?>

        </div>
        
        <!--
        <aside class="">
            <article>
            
            </article>  

        </aside>-->
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>