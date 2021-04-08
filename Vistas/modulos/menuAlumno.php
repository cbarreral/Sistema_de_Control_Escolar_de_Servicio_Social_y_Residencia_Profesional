<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>

                <a href="http://localhost/Sistema/">
                    <i class="fa fa-home">
                        <samp>Inicio</samp>
                    </i>
                </a>

            </li>

            <li>

                <a href="http://localhost/Sistema/catalogo">
                    <i class="fa fa-home">
                        <samp>Catalogo</samp>
                    </i>
                </a>

            </li>
            <li>

                <a href="http://localhost/Sistema/inscrito">
                    <i class="fa fa-home">
                        <samp>Mi horario</samp>
                    </i>
                </a>

            </li>

            <li>

                <a href="http://localhost/Sistema/Carpetas">
                    <i class="fa fa-home">
                        <samp>Carpetas</samp>
                    </i>
                </a>

            </li>

            <li>
                <?php
                echo '
                <a href="http://localhost/Sistema/constancia-alumno/' . $_SESSION["matricula"] . '/' . $_SESSION["id_carrera"] . '">
                    <i class="fa fa-home">
                        <samp>Certificados</samp>
                    </i>
                </a>';
                ?>
            </li>
            <li>

                <a href="http://localhost/Sistema/visitas">
                    <i class="fa fa-home">
                        <samp>Visitas a empresa</samp>
                    </i>
                </a>

            </li>

        </ul>
    </section>
</aside>