
    <?php include("header.php"); ?>
    
    <div class="container">
        <div class="main row">
            <div class="col-lg-12">
                <h2 class="page-header">Perfil Administrador</h2>
            </div>
            <ul class="nav nav-tabs nav-justified">
                <li class="">
                    <a href="perfilAdministrador.php" data-toggle="tab">Mi Perfil</a>
                </li>
                <li class="">
                    <a href="citasAdmin.php" data-toggle="tab">Citas</a>
                </li>
                <li class="active">
                    <a href="buscarUsuario.php" data-toggle="tab">Buscar Usuario</a>
                </li>
                <li class="">
                    <a href="notificacionesAdmin.php" data-toggle="tab">Notificaciones</a>
                </li>
            </ul>

        </div>

        <div class="container well">

            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" method="post" action="">
                        <select class="form-control">
                            <option selected value="0">Elige una opción de Búsqueda</option>
                            <option value="id">ID de Usuario</option>
                            <option value="mail">E-mail de Usuario</option>
                            <option value="nombre">Nombre del Usuario</option>
                            <option value="todos">Todos</option>
                        </select>
                        
                        <div class="form-group">
                            <label class="control-label" for="busqueda">Buscar:</label>
                            <input class="form-control" type="search" id="busqueda" name="busqueda" />
                            <button type="button" class="btn btn-default">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--Row-->

            <div class="container row">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered- table-hover">
                        <caption>Lista de Usuarios encontrados</caption>
                        <thead>
                            <th>ID del Usuario</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombre</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Click InfoUsuario</td>
                                <td>Click InfoUsuario</td>
                                <td>Click InfoUsuario</td>
                                <td>Click InfoUsuario</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <!--Table Responsive-->
            </div>
            <!--Row-->

        </div>
        <!--Container well-->
    </div>

    <?php include("footer.php"); ?>
