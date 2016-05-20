<?php
    
    class Tratamiento
    {
        
        function __construct()
        {
            # code...
        }

        function cargarTratamiento()
        {
            if(isset($_GET['id']))
            {
                $header = file_get_contents('views/header.html');
                $footer = file_get_contents('views/footer.html');
                
                switch ($_GET['id']) {
                    case '1':
                        $tratamiento = file_get_contents('views/Tratamientos-Faciales.html');
                        break;
                    
                    case '2':
                        $tratamiento = file_get_contents('views/Tratamientos-Corporales.html');
                        break;

                    case '1-1':
                        # Limpieza Facial
                        $tratamiento = file_get_contents('views/trat-LimpiezaFacial.html');
                        
                        break;

                    case '1-2':
                        # Antiacné
                        $tratamiento = file_get_contents('views/trat-Antiacne.html');
                        break;

                    case '1-3':
                        # Control de grasa
                        $tratamiento = file_get_contents('views/trat-ControlDeGrasa.html');
                        break;

                    case '1-4':
                        # Antiarrugas
                        $tratamiento = file_get_contents('views/trat-Antiarrugas.html');
                        break;

                    case '1-5':
                        # Manchas y cicatrices
                        $tratamiento = file_get_contents('views/trat-ManchasCicatrices.html');
                        break;

                    case '1-6':
                        # Desensibilizante
                        $tratamiento = file_get_contents('views/trat-Desensibilizante.html');
                        break;

                    case '2-1':
                        # Remodelado de silueta
                        $tratamiento = file_get_contents('views/trat-RemodeladoSilueta.html');
                        break;

                    case '2-2':
                        # Anticelulitis
                        $tratamiento = file_get_contents('views/trat-Anticelulitis.html');
                        break;

                    case '2-3':
                        # Antiestrias
                        $tratamiento = file_get_contents('views/trat-Antiestrias.html');
                        break;

                    case '2-4':
                        # Reafirmante de senos
                        $tratamiento = file_get_contents('views/trat-ReafirmanteSenos.html');
                        break;

                    case '2-5':
                        # Reductivo y reafirmante
                        $tratamiento = file_get_contents('views/trat-ReductivoReafirmante.html');
                        break;

                    default:
                        # code...
                        break;
                }

                $carousel = file_get_contents('views/myCarousel.html');
                $tratamiento = str_replace('{CAROUSEL}', $carousel, $tratamiento);
                $view = $header . $tratamiento . $footer;
                
                echo $view;
            }

        }
    }



?>