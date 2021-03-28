

<div class="content-wrapper">
    <section class="content">
        <div class="box-body">
           <?php
            $datos = new UsuariosC();
            $datos -> VerMisDatos();
           ?>

<?php
            $guardar = new UsuariosC();
            $guardar -> GuardarDatosC();
           ?>
        </div>
    </section>
</div>