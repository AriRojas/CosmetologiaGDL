
    <div class="container">
    	<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Perfil Usuario
                    <small>Sutanito Perez </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Inicio</a>
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
                            <li><a href="#" id="linkEditarPerfil">Editar Pefil</a></li>
                            <li><a href="#" id="linkEditarFicha">Editar Ficha Clinica</a></li>
                            <li><a href="#" id="linkVerCitas">Ver Citas</a></li>
                            <li><a href="#"id="btnAgendarCita">Agendar Cita</a></li>
                        </ul>
                    </nav>
    
                </div>
                
            </aside>

        
            <div class="col-md-9 col-lg-8">
                <h3>Mi Perfil</h3>
                
                <form id="formDatosUsuario" class="form-horizontal activos" method="post" >
                    <?php include("formDatosUsuario.php"); ?>
                </form>

            </div>
        </div>

        <div class="container row col-md-12">
            <?php include("tablaHistorialUsuario.php"); ?>

        </div>
        
        
    </div>
    
    <script type="text/javascript" >
        $(document).ready(function(){
            /*foreach input inside a div change */
            $("#linkEditarPerfil").click(function(){
                //alert("Enable todos los input y agregar botón de guardar cambios.");
                var elemento = $("#formDatosUsuario").children();
                fnEditarPerfilUsuario(elemento);
            });

            $("#linkEditarFicha").click(function(){
                alert("Mostrar fichaClinica. Enable todos los input y agregar botón de guardar cambios.");
            });

            $("#linkVerCitas").click(function(){
                alert("Mostrar el fullCalendar");
            });
        });
    </script>