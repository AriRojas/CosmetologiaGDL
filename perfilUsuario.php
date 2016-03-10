    <?php include("header.php"); ?>

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
            <aside class="col-md-4">
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

        
            <div class="col-md-5">
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
        
        
    </div>

    <?php include("footer.php"); ?>