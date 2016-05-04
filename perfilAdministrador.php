    <?php include_once("header.php"); ?>

    <div class="container">
        <div class="main row">
            <div class="col-lg-12">
                <h2 class="page-header">Perfil Administrador</h2>
            </div>
            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active">
                    <a href="perfilAdministrador.php" data-toggle="tab">Mi Perfil</a>
                </li>
                <li>
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

        <div class="container well col-lg-6">
            <form class="form-horizontal" method="post" action="index.php">
                <?php include("formDatosUsuario.php"); ?>  

                <button type="button" class="btn btn-default">Guardar Cambios</button>
            </form>
        </div>

    </div>


    <?php include_once("footer.php"); ?>