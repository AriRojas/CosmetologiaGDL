    <?php include_once("header.php"); ?>

    <div class="container">
    	<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Perfil Usuario
                    <small>Sutanito Perez </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Inicio</a>
                    </li>
                    <li class="active">PerfilUsuario</li>
                </ol>
            </div>
        </div>
        <div class="main row">
            <aside class="col-md-3 col-lg-4">
                <figure>
                    <img class="left" src="images/cosmetologia-gdl-30px.png" alt="Imagen del usuario"/>
                    <h4 class="left">Nombre del usuario</h4>
                </figure>
                <hr class="clear">
                <div>
                    <nav>
                    	<ul class="nav">
                        <li><a href="#">Editar Pefil</a></li>
                        <li><a href="#">Editar Ficha Clinica</a></li>
                        <li><a href="#">Ver Citas</a></li>
                        <li><a href="#">Agendar Cita</a></li>
                    </ul>
                    </nav>
    
                </div>
                
            </aside>

        
            <div class="col-md-9 col-lg-8">
                <h3>Mi Perfil</h3>
                
                <form class="form-horizontal activos" action="" method="post">
                    <?php include("formDatosUsuario.php"); ?>
                </form>

            </div>
        </div>

        <div class="container row col-md-12">
            <?php include("tablaHistorialUsuario.php"); ?>

        </div>
        
        
    </div>

    <?php include_once("footer.php"); ?>