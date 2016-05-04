    <?php include_once("header.php"); ?>

    <div class="container">
        <div class="main row">
            <div class="col-lg-12">
                <h2 class="page-header">Perfil Administrador</h2>
            </div>
            <ul class="nav nav-tabs nav-justified">
                <li>
                    <a href="perfilAdministrador.php" data-toggle="tab">Mi Perfil</a>
                </li>
                <li>
                    <a href="citasAdmin.php" data-toggle="tab">Citas</a>
                </li>
                <li class="active">
                    <a href="buscarUsuario.php" data-toggle="tab">Buscar Usuario</a>
                </li>
                <li>
                    <a href="notificacionesAdmin.php" data-toggle="tab">Notificaciones</a>
                </li>
            </ul>

        </div>

        <div class="container well">
            <div class="row">
                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li>
                        <a href="informacionUsuario.php" data-toggle="tab">Informacion del Usuario</a>
                    </li>
                    <li>
                        <a href="fichaClinicaUsuario.php" data-toogle="tab">Ficha Clínica del Usuario</a>
                    </li>
                    <li class="active">
                        <a href="historialUsuario.php" data-toggle="tab">Historial de Citas del Usuario</a>
                    </li>
                    
                </ul>
            </div>

            <div class="row">
                <?php include("tablaHistorialUsuario.php"); ?>
            </div>
            <!--Row-->
        </div>
        <!--Container well-->

    </div>
    <!--Container-->

    <?php include_once("footer.php"); ?>
