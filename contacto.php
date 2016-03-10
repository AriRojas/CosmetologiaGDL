   <?php include("header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contacto</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Inicio </a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.2132736165827!2d-104.26579524992856!3d19.957531128791913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425b2be0f8ecd79%3A0xa137b00f92a43275!2sZacatecas+Norte+118%2C+48000+Uni%C3%B3n+de+Tula%2C+Jal.!5e0!3m2!1ses!2smx!4v1456715051370" allowfullscreen></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Detalles de Contacto</h3>
                <p>
                    Calle Zacatecas Norte #118<br>Unión de Tula, Jalisco 48000<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">T</abbr>: (316) 371-0000</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">contacto@cosmetologiagdl.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Lunes - Sábado: 9:00 AM a 5:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
       
       <div class="row">
            <div class="col-md-8">
                <h3>Contáctanos</h3>
                <form name="sentMessage" id="contactForm" novalidate method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="nombre">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombre" required data-validation-required-message="Favor de ingresar su nombre.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="telefono">Número de Teléfono:</label>
                            <input type="tel" class="form-control" id="telefono" required data-validation-required-message="Favor de ingresar su número de teléfono.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Favor de ingresar su e-mail.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="mensaje">Mensaje:</label>
                            <textarea class="form-control" id="mensaje" required data-validation-required-message="Please enter your message" maxlength="999"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-default">Enviar Mensaje</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>