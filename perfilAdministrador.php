    <?php include_once("header.php"); ?>

    <div class="container">

        <aside class="row">
            <h1 class="page-header">Perfil Administrador</h1>
            <div class="col-md-4">
                <nav class="nav">
                    <ul class="nav">
                        <li><a>Mi Perfil</a></li>
                        <li><a>Usuarios</a> 
                            <ul class="nav" hidden>
                                <li><a>Agregar Usuario</a></li> 
                                <li><a>Editar Datos de Usuario</a></li>
                                <li><a>Editar Ficha Clínica</a></li>
                                <li><a>Historial del Usuario</a></li>
                            </ul>
                        </li>
                        <li><a>Mis Citas</a></li>
                        <li><a>Agendar Citas</a></li>
                        <li><a>Notificaciones</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8">
                <!--<php include_once("formDatosUsuario.php"); ?>-->
                <?php include_once("fullcalendar/demos/external-dragging.html"); ?>
            </div>
        </aside>
                
    </div>

    <?php include_once("footer.php"); ?>