<!DOCTYPE html>
<html>
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
        <h1 class="page-header">Registro</h1>

        <form class="form-horizontal" method="post" action="index.php">
            <div class="form-group">
                <label class="control-label" for="nombre">Nombre(s):</label>
                <input class="form-control" id="nombre" name="nombre" type="text" />
            </div>

            <div class="form-group">
                <label class="control-label" for="apellidop">Apellido Paterno:</label>
                <input class="form-control" id="apellidop" name="apellidop" type="text" />
            </div>

            <div class="form-group">
                <label class="control-label" for="apellidom">Apellido Materno:</label>
                <input class="form-control" id="apellidom" name="apellidom" type="text" />
            </div>
            
            <div class="form-group">
                <label class="control-label" id="sexo">Selecciona tu sexo:</label>
            </div>

            <div class="form-group">

                <label for="f" class="radio-inline">
                    <input name="sexo" id="f" type="radio" />Femenino:
                </label>
            
                <label for="m" class="radio-inline">
                    <input name="sexo" id="m" type="radio" />Masculino:
                </label>

            </div>

            <div class="form-group">
                <label class="control-label" for="direccion">Dirección:</label>
                <input class="form-control" id="direccion" name="direccion" type="text" />
            </div>

            <div class="form-group">
                <label class="control-label" for="numexterior">Número Exterior:</label>
                <input class="form-control" id="numexterior" name="numexterior" type="number" max="99999" />
            </div>

            <div class="form-group">
                <label class="control-label" for="numerointerior">Número Interior:</label>
                <input class="form-control" id="numerointerior" name="numerointerior" type="number" max="99999" />
            </div>

            <div class="form-group">
                <label class="control-label" for="localidad">Localidad:</label>
                <input class="form-control" id="localidad" name="localidad" type="text" />
            </div>

            <div class="form-group">
                <label class="control-label" for="municipio">Municipio:</label>
                <input class="form-control" id="municipio" name="municipio" type="text" />
            </div>

            <div class="form-group">
                <label class="control-label" for="estado">Estado:</label>
                <input class="form-control" id="estado" name="estado" type="text" />
            </div>

            <div class="form-group">
                <label class="control-label" for="telefono">Teléfono:</label>
                <input class="form-control" id="telefono" name="telefono" type="tel" />
            </div>

            <div class="form-group">
                <label class="control-label" for="fechanacimiento">Fecha de nacimiento:</label>
                <input class="form-control" id="fechanacimiento" name="fechanacimiento" type="date" min="1916-01-01" value="1999-09-09" step="1"/>
            </div>

            <div class="form-group">
                <label class="control-label" for="mail">E-mail:</label>
                <input class="form-control" id="mail" name="mail" type="email" />
            </div>

            <div class="form-group">
                <label class="control-label" for="pss1">Ingresa tu contraseña:</label>
                <input class="form-control" id="pss1" name="pss1" type="password" />
            </div>

            <div class="form-group">
                <label class="control-label" for="pss2">Repite tu contraseña:</label>
                <input class="form-control" id="pss2" name="pss2" type="password" />

            </div>  

            <button type="button" class="btn btn-default">Registrarme</button>
        </form>

        <footer class="container-fluid">
            <?php include("footer.php"); ?>
        </footer>

    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</html>