    <?php include_once("header.php"); ?>
    
    <div class="container">
    	<section class="row">
    		<div class="col-lg-4"></div>
    		<div class="col-lg-4">
        <h1 class="page-header">Ingresar</h1>
        <div class="well">
            <form class="form-horizontal" method="post" action="index.php">
                <div class="form-group">
                    <label for="mail">E-mail:</label>
                    <input class="form-control" id="mail" name="mail" type="email" />
                </div>
                
                <div class="form-group">
                    <label for="pss">Ingresa tu contraseña:</label>
                    <input class="form-control" id="pss" name="pss" type="password" />
                </div>
                
                <div class="form-group">
                    <button type="button" class="btn btn-default">Entrar</button><br/>
                    <a href="perfilUsuario.php">prueba entrar como usuario</a><br/>
                    <a href="perfilAdministrador.php">prueba entrar como admon</a>
                </div>

                <div class="form-group">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><img class="fa fa-2x fa-facebook-square" src="images/face.png"/></a>
                        </li>
                        <li>
                            <a href="#"><img class="fa fa-2x fa-linkedin-square" src="images/twitter.png"/></a>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <a href="#">Olvidé mi contraseña</a>
                </div>
            </form>
        </div>
        </div>
		</section>
    </div>

    <?php include_once("footer.php"); ?>
