<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ariadna & Sandra">

    <title>Mi Perfil(Administrador) - Cosmetología Guadalajara</title>

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

    <!--Full Calendar-->
    <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />
    <script type='text/javascript' src='fullcalendar/jquery.js'></script>
    <script type='text/javascript' src='fullcalendar/fullcalendar.js'></script>

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
            <div class="col-lg-12">
                <h2 class="page-header">Perfil Administrador</h2>
            </div>
            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li>
                    <a href="perfilAdministrador.php" data-toggle="tab">Mi Perfil</a>
                </li>
                <li class="active">
                    <a href="citasAdmin.php" data-toggle="tab">Citas</a>
                </li>
                <li>
                    <a href="buscarUsuario.php" data-toggle="tab">Buscar Usuario</a>
                </li>
                <li>
                    <a href="notificacionesAdmin.php" data-toggle="tab">Notificaciones</a>
                </li>
            </ul>

        </div>

    </div>

    <div id='calendar'></div>


    <footer>
        <?php include("footer.php"); ?>
    </footer>



    <script type="js/jquery.js"></script>
    <script type="js/fullcalendar.js"></script>
    <script type="js/bootstrap.min.js"></script>
</body>
</html>