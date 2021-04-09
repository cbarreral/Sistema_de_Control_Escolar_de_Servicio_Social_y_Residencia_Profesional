<?php

class UsuariosC
{

    //Iniciar sesión

    public function IniciarSesionC()
    {

        if (isset($_POST["matricula"])) {

            if (preg_match('/^[a-zA-ZñÑ0-9]+$/', $_POST["matricula"]) && preg_match('/^[a-zA-ZñÑ0-9.]+$/', $_POST["clave"])) {

                $tablaBD = "usuarios";

                $datosC = array("matricula" => $_POST["matricula"], "clave" => $_POST["clave"]);

                $resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

                if ($resultado["matricula"] == $_POST["matricula"] && $resultado["clave"] == $_POST["clave"]) {

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["rol"] = $resultado["rol"];

                    $_SESSION["matricula"] = $resultado["matricula"];

                    $_SESSION["clave"] = $resultado["clave"];

                    $_SESSION["nombre"] = $resultado["nombre"];

                    $_SESSION["tipo"] = $resultado["tipo"];

                    $_SESSION["apellido"] = $resultado["apellido"];

                    $_SESSION["id"] = $resultado["id"]; 

                    $_SESSION["id_carrera"] = $resultado["id_carrera"];

                    $_SESSION["correo"]=$resultado["correo"];


                    echo '<script>
                
                window.location = "inicio";
                </script>';
                } else {
                    echo '<br>
                
                <div class="alert alert-danger"> Error al ingresar</div>
                ';
                }
            }
        }
    }


    //Mostrar mis datos 

    public function VerMisDatos()
    {
        $tablaBD = "usuarios";
        $id = $_SESSION["id"];
        $resultado = UsuariosM::VerMisDatos($tablaBD, $id);

        echo '
       <form  method="post">
       <div class="row">
           <div class="col-md-6 col-xs-12">
               <h2>Fecha de nacimiento</h2>
               <input type="date" class="input-lg" name="fechanac" value="' . $resultado["fechanac"] . '" id="">
               <input type="hidden" class="input-lg" name="Uid" value="' . $resultado["id"] . '" id="">
               <h2>Telefono</h2>
               <input type="text" class="input-lg" name="telefono" value="' . $resultado["telefono"] . '" id="">
               <h2>Dirección: </h2>
               <input type="text" class="input-lg" name="direccion" value="' . $resultado["direccion"] . '" id="">

           </div>

           <div class="col-md-6 col-xs-12">
               <h2>Correo electronico</h2>
               <input type="email" class="input-lg" name="correo" value="' . $resultado["correo"] . '" id="">
              <h2>Contraseña:</h2>
               <input type="text" class="input-lg" name="clave" value="' . $resultado["clave"] . '" id="">

               <br><br>
               <button type="submit" class="btn btn-success">Guardar datos</button>
           </div>
       </div>
   </form>
       ';
    }


    // Actualizar mis datos

    public function GuardarDatosC()
    {
        if (isset($_POST["Uid"])) {

            $tablaBD = "usuarios";

            $datosC = array(
                "id" => $_POST["Uid"],

                "fechanac" => $_POST["fechanac"], "telefono" => $_POST["telefono"],
                "direccion" => $_POST["direccion"], "correo" => $_POST["correo"],
                "clave" => $_POST["clave"]
            );

            $resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);
            if ($resultado == true) {
                
                echo '<script>
                
                window.location = "http://localhost/Sistema/mis-datos";
                </script>';

            }
        }
    }

    // Crear usuario

    public function CrearUsuarioC()
    {
        if (isset($_POST["apellidoU"])) {

            $tablaBD = "usuarios";

            $datosC = array(
                "apellido" => $_POST["apellidoU"],

                "periodo" => $_POST["periodoU"],"nombre" => $_POST["nombreU"], "matricula" => $_POST["matriculaU"],
                "clave" => $_POST["claveU"], "id_carrera" => $_POST["carreraU"],
                "rol" => $_POST["rolU"],"telefono" => $_POST["telefonoU"],"direccion" => $_POST["direccionU"],"correo" => $_POST["correoU"],"tipo" => $_POST["tipoU"]
            );

            $resultado = UsuariosM::CrearUsuariosM($tablaBD, $datosC);
            if ($resultado == true) {
              
                echo '<script>
                
               window.location = "http://localhost/Sistema/usuarios";
                </script>';
            }
        }
    }


    //Ver usuarios

    static public function VerUsuariosC($columna, $valor)
    {
        $tablaBD = "usuarios";
        $resultado = UsuariosM::verUsuarioM($tablaBD, $columna, $valor);
        return $resultado;
    }

    static public function VerUsuarios2C($columna, $valor)
    {
        $tablaBD = "usuarios";
        $resultado = UsuariosM::verUsuario2M($tablaBD, $columna, $valor);
        return $resultado;
    }


    //Actualizar usuarios

    public function ActualizarUsuariosC()
    {
        if (isset($_POST["Uid"])) {
            $tablaBD = "usuarios";

            $datosC = array(
                "id" => $_POST["Uid"], "apellido" => $_POST["apellidoEU"],
                "a_academico" => $_POST["a_academicoEU"],"a_industrial" => $_POST["a_industrialEU"],"periodo" => $_POST["periodoEU"],"nombre" => $_POST["nombreEU"], "matricula" => $_POST["matriculaEU"],
                "clave" => $_POST["claveEU"], "id_carrera" => $_POST["carreraEU"],
                "rol" => $_POST["rolEU"],"telefono" => $_POST["telefonoEU"],"direccion" => $_POST["direccionEU"],"correo" => $_POST["correoEU"],"tipo" => $_POST["tipoEU"]
            );

            $resultado = UsuariosM::ActualizarUsuariosM($tablaBD, $datosC);
            if ($resultado == true) {
                echo '<script>
                
                window.location = "http://localhost/Sistema/detalles-usuario/'.$_POST["carreraEU"].'/'.$_POST["matriculaEU"].'";
                </script>';
            }
        }
    }


    //Eliminar usuario

    public function EliminarUsuariosC(){

		if(isset($_GET["Uid"])){

			$tablaBD = "usuarios";

			$id = $_GET["Uid"];

			$resultado = UsuariosM::EliminarUsuariosM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "usuarios";
				</script>';

			}

		}

	}
}
