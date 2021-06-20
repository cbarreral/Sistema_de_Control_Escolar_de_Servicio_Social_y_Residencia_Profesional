<?php
session_start();
//include "server.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema
    </title>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Tell the browser to be responsive to screen width --
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome --
    <link rel="stylesheet" href="<?php echo URL_SERVER ?>Vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons --
    <link rel="stylesheet" href="<?php echo URL_SERVER ?>Vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL_SERVER ?>Vistas/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo URL_SERVER ?>Vistas/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

  <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font --
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>



<body class="hold-transition skin-black sidebar-mini login-page">
    <!-- Site wrapper -->




    <?php

    if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {


        $url = array();

        if (isset($_GET["url"])) {

            $url = explode("/", $_GET["url"]);

            if (
                $url[0] == "inicio" ||
                $url[0] == "salir" ||
                $url[0] == "Obcervaciones" ||
                $url[0] == "mis-datos" ||
                $url[0] == "carreras" ||
                $url[0] == "Editar-Carrera" ||
                $url[0] == "usuarios" ||
                $url[0] == "estudiantes" ||
                $url[0] == "Editar-Inicio" ||
                $url[0] == "crear-materias" ||
                $url[0] == "crear-comisiones" ||
                $url[0] == "verCarpeta" ||
                $url[0] == "nota-materia" ||
                $url[0] == "Editar-Nota" ||
                $url[0] == "plan-de-estudios" ||
                $url[0] == "materias" ||
                $url[0] == "inscribir-materia" ||
                $url[0] == "evaluaciones" ||
                $url[0] == "crear-evaluaciones" ||
                $url[0] == "c-e" ||
                $url[0] == "ver-evaluaciones" ||
                $url[0] == "inscribir-evaluacion" ||
                $url[0] == "inscritos-evaluacion" ||
                $url[0] == "catalogo" ||
                $url[0] == "Carpetas" ||
                $url[0] == "inscrito" ||
                $url[0] == "detalles-usuario" ||
                $url[0] == "Editar-usuario" ||
                $url[0] == "constancia-alumno" ||
                $url[0] == "calificaciones" ||
                $url[0] == "solicitud-Constancia" ||
                $url[0] == "visitas" ||
                $url[0] == "Editar-Visitas" ||
                $url[0] == "recuperar" ||
                $url[0] == "info" ||
                $url[0] == "crearCuenta" ||
                $url[0] == "solicitudRecidencia" ||
                $url[0] == "verSolicitudes" ||
                $url[0] == "tablaSolicitudes"


            ) {
if ($url[0] != "tablaSolicitudes") {


    echo '<div class="wrapper">';
    include "modulos/cabecera.php";
            $user = UsuariosC::VerUsuariosC("matricula", $_SESSION["matricula"]);

            if ($user["rol"] == "Admin") {
                include "modulos/menu.php";
            } else if ($user["rol"] == "Alumno") {
                include "modulos/menuAlumno.php";
            } else if ($user["rol"] == "a_Academico") {
                include "modulos/menuAcademico.php";
            } else if ($user["rol"] == "a_Industrial") {
                include "modulos/menuIndustrial.php";
            } else if ($user["rol"] == "Jefe") {
                include "modulos/menuJefe.php";
            }
        }
                include "modulos/" . $url[0] . ".php";
            } else {

                include "modulos/404.php";
            }
        } else {

            include "modulos/inicio.php";
        }
        
        echo '  </div>';
    } else if (isset($_GET["url"])) {

        if ($_GET["url"] == "Ingresar") {

            include "modulos/Ingresar.php";
        } else if ($_GET["url"] == "recuperar") {
            include "modulos/recuperar.php";
        } else if ($_GET["url"] == "crearCuenta") {
            include "modulos/crearCuenta.php";
        } else {
            include "modulos/Ingresar.php";
        }
    } else {
        include "modulos/Ingresar.php";
    }

    ?>

    <!-- =============================================== -->



    <!-- =============================================== -->


    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo URL_SERVER ?>Vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo URL_SERVER ?>Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo URL_SERVER ?>Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo URL_SERVER ?>Vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_SERVER ?>Vistas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URL_SERVER ?>Vistas/dist/js/demo.js"></script>



    <script src="<?php echo URL_SERVER ?>Vistas/js/usuarios.js"></script>
    <script src="<?php echo URL_SERVER ?>Vistas/js/materias.js"></script>
    <script src="<?php echo URL_SERVER ?>Vistas/js/comisiones.js"></script>

    <!-- Manejo de Archivos excel -->
    <script src="<?php echo URL_SERVER ?>Vistas/js/xlsx.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })
    </script>

    <!-- Filtrado de tablas -->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>