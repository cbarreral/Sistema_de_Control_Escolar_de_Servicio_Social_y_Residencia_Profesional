<aside class="main-sidebar"  style="background-color: #263238;">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <img src="<?php echo URL_SERVER?>/Vistas/img/logo.png" width="200px" alt="" srcset="">
            </li>
            <li>

                <a href="<?php echo URL_SERVER?>">
                    <i class="fa fa-home">
                        <samp>Inicio</samp>
                    </i>
                </a>

            </li>

            <li>

                <a href="<?php echo URL_SERVER?>catalogo">
                    <i class="fa fa-home">
                        <samp>Catalogo</samp>
                    </i>
                </a>

            </li>
            <li>

                <a href="<?php echo URL_SERVER?>inscrito">
                    <i class="fa fa-home">
                        <samp>Mi horario</samp>
                    </i>
                </a>

            </li>

            <li>

                <a href="<?php echo URL_SERVER?>Carpetas">
                    <i class="fa fa-home">
                        <samp>Carpetas</samp>
                    </i>
                </a>

            </li>

            <li>
                <?php
                echo '
                <a href="<?php echo URL_SERVER?>constancia-alumno/' . $_SESSION["matricula"] . '/' . $_SESSION["id_carrera"] . '">
                    <i class="fa fa-home">
                        <samp>Certificados</samp>
                    </i>
                </a>';
                ?>
            </li>
            <li>

                <a href="<?php echo URL_SERVER?>visitas">
                    <i class="fa fa-home">
                        <samp>Visitas a empresa</samp>
                    </i>
                </a>

            </li>

        </ul>
    </section>
</aside>