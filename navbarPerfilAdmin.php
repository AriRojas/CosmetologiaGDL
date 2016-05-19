    <?php include_once("header.php"); ?>

    <div class="container">
        <nav class="row navbar container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="?ctl=perfilAdmin">Mi Perfil</a></li>
                <li><a href="?ctl=usuarios">Usuarios</a></li>
                <li><a href="?ctl=citasAdmin">Mis Citas</a></li>
                <li><a href="?ctl=calendarioAdmin">Agendar Citas</a></li>
            </ul>
        </nav>
    </div>
    <div>
        <?php include_once("citasAdministrador.php"); ?>        
    </div>

    <script></script>

</body>
</html>