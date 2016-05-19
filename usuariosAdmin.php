<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" method="post" action="">
                <select class="form-control">
                    <option selected value="0">Opción de Búsqueda</option>
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

    <div class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered- table-hover">
                <caption>Listado de Usuarios</caption>
                <thead>
                    <th>Editar Datos</th>
                    <th>Editar Ficha</th>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Historial Citas</th>
                </thead>

                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered- table-hover">
                <caption>Historial de citas del Usuario</caption>
                <thead>
                    <th>Nombre del tratamiento</th>
                    <th>Fecha de aplicación</th>
                    <th>Fecha siguiente sugerida</th>
                </thead>

                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>